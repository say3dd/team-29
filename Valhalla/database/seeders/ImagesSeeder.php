<?php
//@noramknarf (Francis Moran) - everything in this file

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
            'path' => 'assets\laptop_images\Asus ROG Strix G16 G614\asus_ROG_Strix_G16_G614.jpg',
            'product_id' => '3'
        ]);

        Image::create([
            'path' => 'assets\laptop_images\Asus ROG Strix G16 G614\ROG Strix G16 (1).png',
            'product_id' => '3'
        ]);

        
    }
}
