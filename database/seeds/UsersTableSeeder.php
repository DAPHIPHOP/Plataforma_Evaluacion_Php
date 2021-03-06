<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$GuEZ22bDayU6ubtlCOQ9M.WA/hcaTgcVsBSnCMLgxX/I6ysnC5UXW',
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
