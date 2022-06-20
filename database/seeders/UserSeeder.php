<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
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
        // User::factory()->create();
        DB::table('users')->insert([
            'email'=> 'test@mail.com',
            'password' => md5('12345678'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
