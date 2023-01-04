<?php

namespace Astlaure\Saphir\Http\Controllers\Auth;

use Astlaure\Saphir\Http\Controllers\Controller;
use Astlaure\Saphir\Http\Requests\Auth\RegistrationRequest;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller {
    public function registration() {
        return view('saphir::auth.registration');
    }

    public function registrationPost(RegistrationRequest $request) {
        $values = $request->validated();
        $values['password'] = Hash::make($values['password']);

        $user = config('auth.providers.users.model');
        $user::create($values);

        return redirect()->route('index');
    }
}
