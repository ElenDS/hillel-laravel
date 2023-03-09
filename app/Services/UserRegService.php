<?php

namespace App\Services;

use App\Models\User;

class UserRegService
{
    public function newUser($email)
    {
        $user = new User();
        $user->email = $email;
        $user->password = str_pad(mt_rand(0, 999999), 6);
        $user->save();

        return $user;
    }

}
