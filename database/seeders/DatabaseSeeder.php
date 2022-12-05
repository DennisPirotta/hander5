<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Customer;
use App\Models\Transaction;
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
         User::factory()->create([
             'username' => 'Dennis',
             'password' => Hash::make('pellio2014'),
         ]);
         User::factory(3)->create();
         Customer::factory(100)->create();
         Transaction::factory(200)->create();
    }
}
