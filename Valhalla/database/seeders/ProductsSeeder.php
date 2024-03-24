<?php


/*

@say3dd - Seeded the database with products for the website

*/

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // seed products, columns are: laptop_name, price, RAM, processor, GPU, image_path, brand

        DB::table('products')->insert([

            [
                'brand' => 'MSI',
                'product_name' => 'MSI Titan GT77 HX 13V',
                'product_description' => 'Name: MSI Titan GT77 HX 13V, RAM: 128 GB, Processor: 13th Gen Intel Core i9-13980HX Processor, GPU: GeForce RTX 4090, Display: 17.3" UHD (3840x2160) 120Hz IPS-Level, Memory: 128GB DDR5, Storage: 2TB NVMe SSD, Colour: Blue',
                'category' => 'Laptop',
                'price' => 3362.99,
                'images' => 'assets/laptop_images/MSI Titan GT77 HX 13V/msi_Titan_GT77_HX_13V.jpg',
                'stock' => 10,
                'created_at' => now(),
            ],

            [
                'brand' => 'Intel',
                'product_name' => 'Medion Erazer X20',
                'product_description' => 'Name: Intel Medion Eraser X20, RAM: 32 GB, Processor: 13th Gen Intel Core i9-13980HX Processor,  GPU: GeForce RTX 4070 8GB, Display: 17.3" FHD (1920x1080) 144Hz IPS-Level, Memory: 32GB DDR4, Storage: 1TB NVMe SSD, Colour: Black',
                'category' => 'Laptop',
                'price' => 3262.99,
                'images' => 'assets/laptop_images/Medion Erazer X20/medion_erazer_X20.webp',
                'stock' => 14,
                'created_at' => now(),

            ],
            [
                'brand' => 'Asus',
                'product_name' => 'Asus ROG Strix G16 G614',
                'product_description' => 'Name: Asus ROG Strix G16 G614, RAM: 128 GB, Processor: 13th Gen Intel Core i9-13980HX Processor, GPU: GeForce RTX 4090, Display: 16" WQXGA (2560x1600) 165Hz IPS-Level, Memory: 128GB DDR5 , Storage: 2TB NVMe SSD, Colour: Grey',
                'category' => 'Laptop',
                'price' => 3262.99,
                'images' => 'assets/laptop_images/Asus ROG Strix G16 G614/asus_ROG_Strix_G16_G614.jpg',
                'stock' => 12,
                'created_at' => now(),
            ],
            [
                'brand' => 'Dell',
                'product_name' => 'Alienware M18',
                'product_description' => 'Name: Alienware M18, RAM: 32 GB, Processor: 13th Gen Intel Core i7-13700HX Processor, GPU: GeForce RTX 4080, Display: 18" QHD (2560x1440) 165Hz ComfortView Plus, Memory: 32GB DDR5, Storage: 2TB (2x 1TB NVMe SSD RAID 0), Colour: Silver',
                'category' => 'Laptop',
                'price' => 2729.00,
                'images' => 'assets/laptop_images/Alienware M18/alienware-m18.jpg',
                'stock' => 16,
                'created_at' => now(),
            ],
            [
                'brand' => 'Razer',
                'product_name' => 'Razer Blade 14',
                'product_description' => 'Name: Razer Blade 14, RAM: 16 GB, Processor: AMD Ryzen 9 7940HS, GPU: GeForce RTX 4090, Display: 14" QHD (2560x1440) 165Hz IPS-Level, Memory: 16GB DDR5, Storage: 1TB NVMe SSD, Colour: Black',
                'category' => 'Laptop',
                'price' => 2099.99,
                'images' => 'assets/laptop_images/Razer Blade 14/razer_blade_14.jpg',
                'stock' => 10,
                'created_at' => now(),
            ],
            [
                'brand' => 'Lenovo',
                'product_name' => 'Lenovo Legion Pro 7i Gen 8',
                'product_description' => 'Name: Lenovo Legion Pro 7i Gen 8, RAM: 16 GB, Processor: 13th Gen Intel Core i7-13700HX Processor, GPU: GeForce RTX 4070, Display:  16" WQXGA (2560x1600) 165Hz HDR 400 Dolby Vision, Memory: 16GB DDR5, Storage: 1TB NVMe SSD, Colour: Grey',
                'category' => 'Laptop',
                'price' => 1799.50,
                'images' => 'assets/laptop_images/Lenovo Legion Pro 7i Gen 8/lenovo_legion_pro.jpg',
                'stock' => 10,
                'created_at' => now(),
            ],
            [
                'brand' => 'ASUS',
                'product_name' => 'ASUS Zephyrus M16',
                'product_description' => 'Name: ASUS Zephyrus M16, RAM: 32 GB, Processor: 13th Gen Intel Core i9-13980HX Processor, GPU: GeForce RTX 4080, Display: 16" WQXGA (2560x1600) 165Hz IPS-Level Pantone Validated, Memory: 32GB DDR5, Storage: 1TB NVMe SSD, Colour: Black',
                'category' => 'Laptop',
                'price' => 2599.99,
                'images' => 'assets/laptop_images/Asus Zephyrus M16/ASUS ZEPHYRUS.JPG',
                'stock' => 22,
                'created_at' => now(),
            ],
            [
                'brand' => 'ACER',
                'product_name' => 'ACER Predator 21 X',
                'product_description' => 'Name: ACER Predator 21 X, RAM: 64 GB, Processor: 13th Gen Intel Core i9-13980HX Processor, GPU: GeForce RTX 4090, Display: 21" WFHD (2560x1080) 120Hz IPS Curved, Memory: 64GB DDR4, Storage: 2TB NVMe SSD + 2TB HDD, Colour: Black',
                'category' => 'Laptop',
                'price' => 2899.99,
                'images' => 'assets/laptop_images/ACER Predator 21 X/acer_predator_21.jpg',
                'stock' => 19,
                'created_at' => now(),
            ],
            [
                'brand' => 'Acer',
                'product_name' => 'Acer Predator Helios Neo 16',
                'product_description' => 'Name: Acer Predator Helios Neo 16, RAM: 16 GB, Processor: 13th Gen Intel Core i7, GPU: GeForce RTX 4070, Display:  16" WQXGA (2560x1600) 165Hz IPS-Level , Memory: 16GB DDR5, Storage: 1TB SSD, Colour: Black',
                'category' => 'Laptop',
                'price' => 1399.00,
                'images' => 'assets/laptop_images/ACER Predator Helios/acer_predator_helios_neo16.jpg',
                'stock' => 9,
                'created_at' => now(),
            ],

            [
                'brand' => 'Lenovo',
                'product_name' => 'Lenovo Legion Slim 5',
                'product_description' => 'Name: Lenovo Legion Slim 5, RAM: 16 GB, Processor: AMD Ryzen 7 7840HS, GPU: GeForce RTX 4060, Display: 15.6" FHD (1920x1080) 165Hz IPS-Level, Memory: 16GB DDR4, Storage: 512GB NVMe SSD, Colour: Black ',
                'category' => 'Laptop',
                'price' => 1199.00,
                'images' => 'assets/laptop_images/Lenovo Legion Slim 5/lenovo_legion_slim_5.jpg',
                'stock' => 7,
                'created_at' => now(),
            ],
            [
                'brand' => 'Asus',
                'product_name' => 'ASUS TUF Gaming A15',
                'product_description' => 'Name: ASUS TUF Gaming A15, RAM: 16 GB, Processor: AMD Ryzen 9 7940HS, GPU: GeForce RTX 4070, Display: 15.6" FHD (1920x1080) 144Hz Adaptive-Sync, Memory: 16GB DDR5, Storage: 512GB NVMe SSD, Colour: Black',
                'category' => 'Laptop',
                'price' => 1299.00,
                'images' => 'assets/laptop_images/Asus TUF Gaming A15/asus_tuf_gaming_a15.jpg',
                'stock' => 10,
                'created_at' => now(),
            ],
            [
                'brand' => 'Asus',
                'product_name' => 'Asus ROG Zephyrus Duo',
                'product_description' => 'Name: Asus ROG Zephyrus Duo, RAM: 64 GB, Processor: AMD Ryzen 9 7945HX, GPU: GeForce RTX 4090, Display: 15.6" 4K UHD (3840x2160) 120Hz main display & 14.1" (3840x1100) touch display, Memory: 64GB DDR5, Storage: 4TB (2x 2TB NVMe SSD RAID 0), Colour: Blue',
                'category' => 'Laptop',
                'price' => 4799.00,
                'images' => 'assets/laptop_images/Asus ROG Zephyrus Duo/asus_rog_zephyrus_duo.jpg',
                'stock' => 18,
                'created_at' => now(),
            ],
            [
              'brand' => 'Razer',
              'product_name' => 'Razer Blade 18',
                'product_description' =>'Name: Razer Blade 18, RAM: 64 GB, Processor: Intel Core i9-13950HX, GPU: GeForce RTX 4070, Display: 18" QHD+ 240 Hz, 16:10 (2560 x 1600), Memory: 16 GB DDR5-5600MHz, Storage: 1 TB SSD (M.2 NVMe PCIe 4.0 x4), Colour: Black',
                'category' => 'Laptop' ,
                'price' => 2699.99,
                'images' => '',
                'stock' => 5,
                'created_at' => now(),

            ],
            [
                'brand' => 'Dell',
                'product_name' => 'Dell G15 Gaming',
                'product_description' => 'Name: Dell G15 Gaming Laptop , RAM: 64 GB , Processor: Intel Core i7-10870H , GPU: GeForce RTX 3050 , Display: 15.6-inch FHD non-touchscreen , Memory: 16 GB: 2 x 8 GB, DDR5, 4800 MT/s , Storage: 512 GB, M.2, PCIe NVMe, SSD ,Colour: Grey',
                'category' => 'Laptop' ,
                 'price' => 800.00,
                'images' => '',
                'stock' => 8,
                'created_at' => now(),

            ],
            [
                'brand' => 'Dell',
                'product_name' => 'Alienware x16 R2',
                'product_description' => 'Name: Alienware x16 R2 , RAM: 32 GB , Processor: Intel Core Ultra 7 , GPU: GeForce RTX 4060 , Display: 16.0" QHD+ (2560 x 1600) 240Hz 3ms, 100% DCI-P3, ComfortView Plus , Memory: 32 GB , Storage: 1TB SSD , Colour: Silver',
                'category' => 'Laptop' ,
                 'price' => 2499.00 ,
                'images' => '',
                'stock' => 5 ,
                'created_at' => now(),

            ],
            [
                'brand' => 'MSI',
                'product_name' => 'MSI Cyborg 15',
                'product_description' => 'Name: MSI Cyborg 15 , RAM: 16 GB , Processor: Intel Core i7-12650H , GPU: GeForce RTX 4060 , Display: 15.6- inch IPS LCD , Memory: 32 GB , Storage: 512 GB SSD ,Colour: Black ',
                'category' => 'Laptop',
                 'price' => 900.99 ,
                'images' => '',
                'stock' => 10,
                'created_at' => now(),

            ],
            [
                'brand' => 'Logitech',
                'product_name' => 'Logitech MX Master 3',
                'product_description' => 'Name: Logitech MX Master 3, DPI: 4000, Connectivity: Wireless, Battery-Life: 70 days, Colour: Black',
                'category' => 'Mouse',
                'price' => 99.99,
                'images' => 'assets/mouse_images/Logitech MX Master 3/logitech_mx_master_3.jpg',
                'stock' => 10,
                'created_at' => now(),
            ],
            [
                'brand' => 'Razer',
                'product_name' => 'Razer DeathAdder V2',
                'product_description' => 'Name: Razer DeathAdder V2, DPI: 20000, Connectivity: Wired, Colour: Black',
                'category' => 'Mouse',
                'price' => 69.99,
                'images' => 'assets/mouse_images/Razer DeathAdder V2/razer_deathadder_v2.jpg',
                'stock' => 10,
                'created_at' => now(),
            ],
            [
                'brand' => 'Corsair',
                'product_name' => 'Corsair Ironclaw RGB',
                'product_description' => 'Name: Corsair Ironclaw RGB, DPI: 18000, Connectivity: Wireless, Battery-Life: 50 hours, Colour: Black',
                'category' => 'Mouse',
                'price' => 79.99,
                'images' => 'assets/mouse_images/Corsair Ironclaw RGB/corsair_ironclaw_rgb.jpg',
                'stock' => 10,
                'created_at' => now(),
            ],
            [
                'brand' => 'SteelSeries',
                'product_name' => 'SteelSeries Apex Pro',
                'product_description' => 'Name: SteelSeries Apex Pro, Switches: Red, Connectivity: Wired, Keyboard-Type: Mechanical, Colour: Black',
                'category' => 'Keyboard',
                'price' => 199.99,
                'images' => 'assets/keyboard_images/SteelSeries Apex Pro/steelseries_apex_pro.jpg',
                'stock' => 10,
                'created_at' => now(),
            ],
            [
                'brand' => 'Corsair',
                'product_name' => 'Corsair K95 RGB Platinum',
                'product_description' => 'Name: Corsair K95 RGB Platinum, Switches: Red, Connectivity: Wired, Keyboard-Type: Mechanical, Colour: Black',
                'category' => 'Keyboard',
                'price' => 169.99,
                'images' => 'assets/keyboard_images/Corsair K95 RGB Platinum/corsair_k95_rgb_platinum.jpg',
                'stock' => 10,
                'created_at' => now(),
            ],
            [
                'brand' => 'Razer',
                'product_name' => 'Razer Huntsman Elite',
                'product_description' => 'Name: Razer Huntsman Elite, Switches: Blue, Connectivity: Wireless, Keyboard-Type: Mechanical, Colour: Black',
                'category' => 'Keyboard',
                'price' => 199.99,
                'images' => 'assets/keyboard_images/Razer Huntsman Elite/razer_huntsman_elite.jpg',
                'stock' => 10,
                'created_at' => now(),
            ],
            [
                'brand' => 'Samsung',
                'product_name' => 'Samsung Odyssey G9',
                'product_description' => 'Name: Samsung Odyssey G9, Screen-Size: 49", Refresh-Rate: 240Hz, Response-Time: 1ms, Colour: Black',
                'category' => 'Monitor',
                'price' => 1399.99,
                'images' => 'assets/monitor_images/Samsung Odyssey G9/samsung_odyssey_g9.jpg',
                'stock' => 10,
                'created_at' => now(),
            ],
            [
                'brand' => 'LG',
                'product_name' => 'LG UltraGear',
                'product_description' => 'Name: LG UltraGear, Screen-Size: 27", Refresh-Rate: 144Hz, Response-Time: 1ms, Colour: Black',
                'category' => 'Monitor',
                'price' => 399.99,
                'images' => 'assets/monitor_images/LG UltraGear/lg_ultragear.jpg',
                'stock' => 10,
                'created_at' => now(),
            ],
            [
                'brand' => 'Dell',
                'product_name' => 'Dell UltraSharp UP3218K',
                'product_description' => 'Name: Dell UltraSharp UP3218K, Screen-Size: 32", Refresh-Rate: 60Hz, Response-Time: 8ms, Colour: Black',
                'category' => 'Monitor',
                'price' => 399.99,
                'images' => 'assets/monitor_images/Dell UltraSharp UP3218K/dell_ultrasharp_up3218k.jpg',
                'stock' => 10,
                'created_at' => now(),
            ],
            [
                'brand' => 'Dell',
                'product_name' => 'Dell Monitor Best Monitor',
                'product_description' => 'Name: Dell Monitor blaa blaa, Screen-Size: 32", Refresh-Rate: 650Hz, Response-Time: 0.1ms, Colour: White',
                'category' => 'Monitor',
                'price' => 399.99,
                'images' => 'assets/monitor_images/Dell UltraSharp UP3218K/dell_ultrasharp_up3218k.jpg',
                'stock' => 10,
                'created_at' => now(),
            ],
            [
                'brand' => 'Dell',
                'product_name' => 'Dell Headset2',
                'product_description' => 'Name: Dell Headset1, Connectivity: Wired, Colour: Black',
                'category' => 'Headset',
                'price' => 199.99,
                'images' => 'assets/monitor_images/Dell UltraSharp UP3218K/dell_ultrasharp_up3218k.jpg',
                'stock' => 10,
                'created_at' => now(),
            ],
            [
                'brand' => 'Razer',
                'product_name' => 'Dell Headset1',
                'product_description' => 'Name: Razer Headset2,  Connectivity: Wired, Colour: White',
                'category' => 'Headset',
                'price' => 10.99,
                'images' => 'assets/monitor_images/Dell UltraSharp UP3218K/dell_ultrasharp_up3218k.jpg',
                'stock' => 10,
                'created_at' => now(),
            ],
            [
                'brand' => 'Sony',
                'product_name' => 'Sony XM4s',
                'product_description' => 'Name: Sony Headset1, Connectivity: Wireless, Colour: Grey',
                'category' => 'Headset',
                'price' => 249.99,
                'images' => 'assets/monitor_images/Dell UltraSharp UP3218K/dell_ultrasharp_up3218k.jpg',
                'stock' => 10,
                'created_at' => now(),
            ],

        ]);

        /*new product lists goes here.
Simply open square bracket (array) and add a comma in the end of the array. */




    }
}

