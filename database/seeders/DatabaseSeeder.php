<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\str;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        /*DB::table("users")->insert([
            'nom' => "admin", 
            'postnom' => "adminPostnom",
            'prenom' => "adminPrenom",
            'email' => "admin@gmail.com",
            'telephone' => "00000123451",
            'role' => "admin",
            'status' => "1",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);*/
        DB::table("users")->insert([ 
            'nom' => "Adra",
            'postnom' => "ONG",
            'email' => "admin@gmail.com",
            'pseudo' => "admin",
            'role' => "admin",
            'status' => "active",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
    }
}
