<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'id' =>  (string) Str::uuid(),
            'name'    => 'admin',
            'email'    => 'admin@admin.com',
            'nohp'    => '08123123123123',
            'password'    => bcrypt('Kodegiri123!')
        ]);
    }
}
