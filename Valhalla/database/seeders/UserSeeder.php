<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
        'name' => 'admin1',
        'email'=> 'admin@gmail.com',
        'password' => 'a123',
        'usertype' => 'admin'
        ]);

        User::create([
            'name' => 'user1',
            'email'=> 'user@gmail.com',
            'password' => 'user123',
            'usertype' => 'user'
        ]);
}

}