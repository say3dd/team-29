<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Image;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Image::create([
            'path' => 'assets\laptop_images\Asus ROG Strix G16 G614\ROG Strix G16 (1).png',
            'product_id' => '3'
        ]);
    }
}
