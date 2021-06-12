<?php

namespace Database\Seeders;

use DB;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'user',
                'email' => 'user@test.com',
                'password' => Hash::make('11111111'),
                'email_verified_at' => Carbon::now()->toDateString()
            ],
            [
                'name' => 'admin',
                'email' => 'admin@test.com',
                'password' => Hash::make('11111111'),
                'email_verified_at' => Carbon::now()->toDateString()
            ]
        ]);
    }
}
