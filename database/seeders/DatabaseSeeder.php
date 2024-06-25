<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $password = '12345678';
        $hashedPassword = Hash::make($password);

         \App\Models\User::factory()->create([
             'name' => 'admin',
             'email' => 'admin@admin.nl',
             'email_verified_at' => now(),
             'password' =>   $hashedPassword,
             'remember_token' => 'Jansen',
             'role_id' => 1,
         ]);


         \App\Models\Profile::factory()->create(['user_id' => 1]);
         \App\Models\Profile::factory(10)->create();
         \App\Models\Role::factory(5)->create();
         \App\Models\Product::factory(5)->create();
         \App\Models\Order::factory(5)->create();
         \App\Models\Customer::factory(5)->create();
         \App\Models\Invoice::factory(5)->create();


    }
}
