<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // seed products, columns are: laptop_name, price, RAM, processor, GPU, image_path, brand
        Product::create([
            'laptop_name' => 'MSI Titan GT77 HX 13V',
            'price' => 3362.99,
            'RAM' => 128,
            'processor' => '13th Gen Intel® Core™ i9-13980HX Processor',
            'GPU' => 'GeForce RTX™ 4090',
            'image_path' => 'assets\images_product\msi_Titan_GT77_HX_13V.jpg',
            'brand' => 'MSI',
        ]);

        Product::create([
            'laptop_name' => 'Alienware M16',
            'price' => 3362.99,
            'RAM' => 32,
            'processor' => '13th Gen Intel® Core™ i7-13700HX Processor',
            'GPU' => 'GeForce RTX™ 4070',
            'image_path' => 'assets/images_product/alienware_m16.png', // should be jpeg it comes up as transparent - not good
            'brand' => 'Alienware',
        ]);

        Product::create([
            'laptop_name' => 'Medion Erazer X20',
            'price' => 3362.99,
            'RAM' => 32,
            'processor' => '13th Intel® Core™ i9 13900HX Processor',
            'GPU' => 'GeForce RTX 4070 8GB',
            'image_path' => 'assets/images_product/medion_erazer_X20.webp',
            'brand' => 'Intel',
        ]);

        Product::create([
            'laptop_name' => 'Asus ROG Strix G16 G614',
            'price' => 3362.99,
            'RAM' => 128,
            'processor' => '13th Gen Intel® Core™ i9-13980HX Processor',
            'GPU' => 'GeForce RTX™ 4090',
            'image_path' => 'assets/images_product/asus_ROG_Strix_G16_G614.png', // should be jpeg, comes up as transparent
            'brand' => 'Asus',
        ]);

        Product::create([
            'laptop_name' => 'Alienware M18',
            'price' => 3362.99,
            'RAM' => 32,
            'processor' => '13th Gen Intel® Core™ i7-13700HX Processor',
            'GPU' => 'GeForce RTX™ 4080',
            'image_path' => 'assets/images_product/alienware_m18.avif', // .avif files dont work with database
            'brand' => 'Alienware',
        ]);

        Product::create([
            'laptop_name' => 'Razer Blade 14',
            'price' => 2099.99,
            'RAM' => 16,
            'processor' => 'AMD Ryzen™ 9 7940HS',
            'GPU' => 'GeForce RTX™ 4090',
            'image_path' => 'assets/images_product/razer_blade_14.jpg', 
            'brand' => 'Razer'
        ]);
        
        



        
    }
}
