<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = bcrypt('blablabla');

        for ($i = 0; $i < 1000000; $i++) {
            $data[] = [
                'name' => fake()->name(),
                'phone' => fake()->unique()->phoneNumber(),
                'is_verified' => rand(0, 20) !== 0,
                'is_stop' => rand(0, 20) === 0,
                'is_business' => rand(0, 20) === 0,
                'password' => $password
            ];
        }

        $chunks = array_chunk($data, 1000);

        foreach ($chunks as $chunk) {
            User::insert($chunk);
        }
    }
}
