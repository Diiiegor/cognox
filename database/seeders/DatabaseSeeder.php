<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'str_name' => 'Luis',
            'str_email' => 'luis@gmail.com',
            'int_identificacion' => '101009998827',
            'str_password' => Hash::make('1899')
        ]);

        User::create([
            'str_name' => 'Carlos',
            'str_email' => 'carlos@gmail.com',
            'int_identificacion' => '1053868999',
            'str_password' => Hash::make('1899')
        ]);

        User::create([
            'str_name' => 'Luisa',
            'str_email' => 'luisa@gmail.com',
            'int_identificacion' => '99099928827',
            'str_password' => Hash::make('1899')
        ]);

        User::create([
            'str_name' => 'Laura',
            'str_email' => 'laura@gmail.com',
            'int_identificacion' => '18882736621',
            'str_password' => Hash::make('1899')
        ]);
    }
}
