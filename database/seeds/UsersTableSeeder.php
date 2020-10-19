<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'email' => 'romis@nesmelov.com',
                'password' => bcrypt('apg192'),
                'active' => 1
            ],
            [
                'email' => 'romis.nesmelov@gmail.com',
                'password' => bcrypt('apg192'),
                'active' => 1
            ]
        ];

        foreach ($data as $val) {
            \App\User::create($val);
        }
    }
}