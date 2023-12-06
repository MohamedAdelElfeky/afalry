<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Generator $faker)
    {
        User::create([
            'username'              => $faker->name,
            'full_name'              => $faker->name,
            'email'             => 'demo@demo.com',
            'phone'             => '01010152694',
            'password'          => Hash::make('demo'),
            'email_verified_at' => now(),
            'sex'             => 'male',
        ]);

        User::create([
            'username'              => $faker->name,
            'full_name'              => $faker->name,
            'email'             => 'admin@demo.com',
            'phone'             => '01010152695',
            'password'          => Hash::make('demo'),
            'email_verified_at' => now(),
            'sex'             => 'female',
        ]);
    }
}
