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

        // Product::create([
        //     'laptop_name' => 'Acer Predator Helios Neo 16',
        //     'price' => 1399.00,
        //     'RAM' => 16,
        //     'processor' => '13th gen Intel® Core™ i7',
        //     'GPU' => 'GeForce RTX 4070',
        //     'image_path' => 'assets/laptop_images/ACER Predator Helios/acer_predator_helios_neo16',
        //     'brand' => 'Acer'
        // ]);

        Product::create([
            'laptop_name' => 'Lenovo Legion Slim 5',
            'price' => 1199.00,
            'RAM' => 16,
            'processor' => 'AMD Ryzen 7 7840HS',
            'GPU' => 'GeForce RTX 4060 8 GB',
            'image_path' => 'assets/laptop_images/Lenovo Legion Slim 5/lenovo_legion_slim_5',
            'brand' => 'Lenovo'
        ]);

        Product::create([
            'laptop_name' => 'ASUS TUF Gaming A15',
            'price' => 1299.00,
            'RAM' => 16,
            'processor' => 'AMD Ryzen 9 7940HS',
            'GPU' => 'GeForce RTX 4070 8 GB',
            'image_path' => 'assets/laptop_images/Asus Tuf Gaming A15/asus_tuf_gaming_a15',
            'brand' => 'Asus'
        ]);

        Product::create([
            'laptop_name' => 'Asus ROG Zephyrus Duo',
            'price' => 4799.00,
            'RAM' => 64,
            'processor' => 'AMD Ryzen 9 7945HX',
            'GPU' => 'GeForce RTX 4090 16 GB',
            'image_path' => 'assets/laptop_images/Asus ROG Zephyrus Duo/asus_rog_zephyrus_duo',
            'brand' => 'Asus'
        ]);



        
        
        



        
    }
}
