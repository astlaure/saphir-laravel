<?php

namespace Astlaure\Saphir\Http\Controllers\Auth;

use Astlaure\Saphir\Http\Controllers\Controller;
use Astlaure\Saphir\Http\Requests\Auth\ForgotPasswordRequest;
use Astlaure\Saphir\Http\Requests\Auth\ResetPasswordRequest;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class PasswordController extends Controller {
    public function forgotPassword() {
        return view('saphir::auth.password-forgot');
    }

    public function forgotPasswordPost(ForgotPasswordRequest $request) {
        $values = $request->validated();

        $status = Password::sendResetLink($values);

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    public function resetPassword(Request $request) {
        return view('saphir::auth.password-reset', ['token' => $request->input('token')]);
    }

    public function resetPasswordPost(ResetPasswordRequest $request) {
        $values = $request->validated();

        $status = Password::reset(
            $values,
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
