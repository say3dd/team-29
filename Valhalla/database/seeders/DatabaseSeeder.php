<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // User::create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        //     'usertype' => 'user',
        //     'password' => 'testuser123',
        // ]);

        // User::create([
        //     'name' => 'Test Admin',
        //     'email' => 'testadmin@example.com',
        //     'usertype' => 'admin',
        //     'password' => 'adminAcc123',

        // ]);


        $this->call([ProductsSeeder::class, ImagesSeeder::class]);
    }
}
