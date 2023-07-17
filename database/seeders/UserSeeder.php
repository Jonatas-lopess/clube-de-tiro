<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
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
        User::create([
            'name' => 'ClubedeTiro76',
            'email' => 'monteiro@clubedetiro76.com.br',
            'role' => 'admin',
            'email_verified_at' => now(),
            'password' => bcrypt('@Clubedetiro76'),
            'remember_token' => Str::random(10),
        ]);
    }
}
