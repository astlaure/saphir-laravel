<?php

namespace Astlaure\Saphir\Http\Controllers\Auth;

use Astlaure\Saphir\Http\Controllers\Controller;
use Astlaure\Saphir\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function login() {
        return view('saphir::auth.login');
    }

    public function loginPost(LoginRequest $request) {
        $credentials = $request->validated();

        if (Auth::attempt($credentials, $request->input('remember_me')))
        {
            $request->session()->regenerate();
            return redirect()->intended();
        }

        return back()->withErrors([
            'email' => __('auth.failed'),
        ]);
    }

    public function logoutPost(Request $request) {
        Auth::logout();

        $request->session()->regenerate();
        $request->session()->regenerateToken();

        // not working with axios $request->ajax() || $request->isXmlHttpRequest()
        if ($request->isJson()) {
            return response()->json([
                'redirect' => route('index'),
            ]);
        }

        return redirect()->route('index');
    }
}
