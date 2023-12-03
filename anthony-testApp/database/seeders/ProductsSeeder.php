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
            'image_path' => 'assets/laptop_images/MSI Titan GT77 HX 13V/msi_Titan_GT77_HX_13V.jpg',
            'brand' => 'MSI',
        ]);

        Product::create([
            'laptop_name' => 'Alienware M16',
            'price' => 3362.99,
            'RAM' => 32,
            'processor' => '13th Gen Intel® Core™ i7-13700HX Processor',
            'GPU' => 'GeForce RTX™ 4070',
            'image_path' => 'assets/laptop_images/Alienware M16/alienware_m16.jpg', 
            'brand' => 'Alienware',
        ]);

        Product::create([
            'laptop_name' => 'Medion Erazer X20',
            'price' => 3362.99,
            'RAM' => 32,
            'processor' => '13th Intel® Core™ i9 13900HX Processor',
            'GPU' => 'GeForce RTX 4070 8GB',
            'image_path' => 'assets/laptop_images/Medion Erazer X20/medion_erazer_X20.webp',
            'brand' => 'Intel',
        ]);

        Product::create([
            'laptop_name' => 'Asus ROG Strix G16 G614',
            'price' => 3362.99,
            'RAM' => 128,
            'processor' => '13th Gen Intel® Core™ i9-13980HX Processor',
            'GPU' => 'GeForce RTX™ 4090',
            'image_path' => 'assets/laptop_images/Asus ROG Strix G16 G614/asus_ROG_Strix_G16_G614.jpg', 
            'brand' => 'Asus',
        ]);

        Product::create([
            'laptop_name' => 'Alienware M18',
            'price' => 3362.99,
            'RAM' => 32,
            'processor' => '13th Gen Intel® Core™ i7-13700HX Processor',
            'GPU' => 'GeForce RTX™ 4080',
            'image_path' => 'assets/laptop_images/Alienware M18/alienware-m18.jpg', 
            'brand' => 'Alienware',
        ]);

        Product::create([
            'laptop_name' => 'Razer Blade 14',
            'price' => 2099.99,
            'RAM' => 16,
            'processor' => 'AMD Ryzen™ 9 7940HS',
            'GPU' => 'GeForce RTX™ 4090',
            'image_path' => 'assets/laptop_images/Razer Blade 14/razer_blade_14.jpg', 
            'brand' => 'Razer'
        ]);

        Product::create([
            'laptop_name' => 'Lenovo Legion Pro 7i Gen 8',
            'price' => 1799.50,
            'RAM' => 16,
            'processor' => '13th Gen Intel® Core™ i7-13700HX Processor',
            'GPU' => 'GeForce RTX™ 4070',
            'image_path' => 'assets/laptop_images/Lenovo Legion Pro 7i Gen 8/lenovo_legion_pro.jpg', 
            'brand' => 'Lenovo'
        ]);

        Product::create([
            'laptop_name' => 'ASUS Zephyrus M16',
            'price' => 2599.99,
            'RAM' => 32,
            'processor' => '13th Gen Intel® Core™ i9-13980HX Processor',
            'GPU' => 'GeForce RTX™ 4080',
            'image_path' => 'assets/laptop_images/Asus Zephyrus M16/ASUS ZEPHYRUS.JPG', 
            'brand' => 'Asus',
        ]);

        Product::create([
            'laptop_name' => 'ACER Predator 21 X',
            'price' => 2899.99,
            'RAM' => 16,
            'processor' => '13th Gen Intel® Core™ i9-13980HX Processor',
            'GPU' => 'GeForce RTX™ 4080',
            'image_path' => 'assets/laptop_images/ACER Predator 21 X/acer_predator_21.jpg', 
            'brand' => 'Acer',
        ]);

        
        
        



        
    }
}
