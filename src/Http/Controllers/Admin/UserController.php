<?php

namespace Astlaure\Saphir\Http\Controllers\Admin;

use Astlaure\Saphir\Http\Controllers\Controller;
use Astlaure\Saphir\Http\Requests\Admin\UserCreateRequest;
use Astlaure\Saphir\Http\Requests\Admin\UserUpdatePasswordRequest;
use Astlaure\Saphir\Http\Requests\Admin\UserUpdateRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private Model|String $model;

    public function __construct() {
        $this->model = config('auth.providers.users.model');
    }

    public function getUsers() {
        $users = $this->model::query()
            ->simplePaginate(8, ['id', 'name', 'email', 'role', 'enabled']);
        return response()->json($users);
    }

    public function getUserById($id) {
        $user = $this->model::query()
            ->find($id, ['id', 'name', 'email', 'role', 'enabled']);
        return response()->json($user);
    }

    /**
     * Cannot use
     * $user = $this->model::query()->create($data);
     * it is not mass assignable
     * @param UserCreateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function postUser(UserCreateRequest $request) {
        $data = $request->validated();

        $user = new $this->model();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->role = $data['role'];
        $user->enabled = $data['enabled'];
        $user->save();

        return response()->json($user, 201);
    }

    /**
     * Same here cannot use
     * $this->model::query()->find($id)->update($data);
     * @param UserUpdateRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function putUser(UserUpdateRequest $request, $id) {
        $data = $request->validated();

        $user = $this->model::query()
            ->find($id);

        $status = 404;
        if ($user != null) {
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->role = $data['role'];
            $user->enabled = $data['enabled'];
            $user->save();
            $status = 204;
        }

        return response()->json(null, $status);
    }

    public function patchUserPassword($id, UserUpdatePasswordRequest $request) {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);

        $this->model::query()
            ->find($id)
            ->update($data);
        return response()->json(null, 204);
    }

    public function deleteUser($id) {
        $this->model::query()
            ->find($id)
            ->delete();
        return response()->json(null, 204);
    }
}
