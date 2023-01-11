<?php

namespace App\Actions\Fortify;

use App\Models\User;

class LogoutUser
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function logout(User $user)
    {
        optional($user->token())->revoke();
        return $user->update([
            'access_token' => null,
        ]);
    }
}
