<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\User;

class UserRegService
{
    public function newUser($email): User
    {
        $user = new User();
        $user->email = $email;
        $user->password = str_pad((string)mt_rand(0, 999999), 6);
        $user->save();

        return $user;
    }

}
