<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService {

    public static function userCreate()
    {
        $user = [
            'name'=> 'Валера',
            'email'=> 'admin@admin.ru',
            'password'=> Hash::make('12345678'),
            'is_admin'=> true,
        ];

        if (User::exists() === false) {
            User::class::create($user);
        }
    }

}
