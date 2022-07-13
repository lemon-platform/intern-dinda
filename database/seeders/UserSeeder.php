<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        \App\Models\User::factory()->create([
            'name' => 'Dinda',
            'email' => 'dinda@adinda.com',
            'role' => 'admin',
        ]);

        \App\Models\User::factory(100)->create();
    }
}
