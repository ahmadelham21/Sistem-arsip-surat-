<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        user::insert ([
            [   'name'=>'Akun Pertama',
                'username' => 'admin',
                'level'=>'admin',
                'password'=> bcrypt('admin'),
            ],
        ]);
    }
}
