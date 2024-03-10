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
                'product_description' => 'Name: MSI Titan GT77 HX 13V
                                     RAM: 128 GB
                                     Processor: 13th Gen Intel® Core™ i9-13980HX Processor,
                                     GPU: GeForce RTX™ 4090,',
                'category' => 'Laptop',
                'price' => 3362.99,
                'images' => 'assets/laptop_images/MSI Titan GT77 HX 13V/msi_Titan_GT77_HX_13V.jpg'

            ],
            [
                'brand' => 'Intel',
                'product_name' => 'Medion Erazer X20',
                'product_description' => 'Name: Intel Medion Eraser X20
                                    RAM: 32 GB
                                    Processor: 13th Gen Intel® Core™ i9-13980HX Processor,
                                    GPU: GeForce RTX™ 4070 8GB,',
                'category' => 'Laptop',
                'price' => 3262.99,
                'images' => 'assets/laptop_images/Medion Erazer X20/medion_erazer_X20.webp'
            ],
            [
                'brand' => 'Asus',
                'product_name' => 'ROG Strix G16 G614',
                'product_description' => 'Name: Asus ROG Strix G16 G614
                                    RAM: 128 GB
                                    Processor: 13th Gen Intel® Core™ i9-13980HX Processor,
                                    GPU: GeForce RTX™ 4090,',
                'category' => 'Laptop',
                'price' => 3262.99,
                'images' => 'assets/laptop_images/Asus ROG Strix G16 G614/asus_ROG_Strix_G16_G614.jpg'
            ],
            [
                'brand' => 'Alienware',
                'product_name' => 'Alienware M18',
                'product_description' => 'Name: Alienware M18
                                    RAM: 32 GB
                                    Processor: 13th Gen Intel® Core™ i7-13700HX Processor,
                                    GPU: GeForce RTX™ 4080,',
                'category' => 'Laptop',
                'price' => 2729.00,
                'images' => 'assets/laptop_images/Alienware M18/alienware-m18.jpg'
            ],
            [
                'brand' => 'Razer',
                'product_name' => 'Razer Blade 14',
                'product_description' => 'Name: Razer Blade 14
                                    RAM: 16 GB
                                    Processor: AMD Ryzen™ 9 7940HS,
                                    GPU: GeForce RTX™ 4090,',
                'category' => 'Laptop',
                'price' => 2099.99,
                'images' => 'assets/laptop_images/Razer Blade 14/razer_blade_14.jpg'
            ],
            [
                'brand' => 'Lenovo',
                'product_name' => 'Lenovo Legion Pro 7i Gen 8',
                'product_description' => 'Name: Lenovo Legion Pro 7i Gen 8
                                            RAM: 16 GB
                                            Processor: 13th Gen Intel® Core™ i7-13700HX Processor,
                                            GPU: GeForce RTX 4070',
                'category' => 'Laptop',
                'price' => 1799.50,
                'images' => 'assets/laptop_images/Lenovo Legion Pro 7i Gen 8/lenovo_legion_pro.jpg'
            ],
            [
                'brand' => 'ASUS',
                'product_name' => 'ASUS Zephyrus M16',
                'product_description' => 'Name: ASUS Zephyrus M16
                                        RAM: 32 GB
                                        Processor: 13th Gen Intel® Core™ i9-13980HX Processor,
                                        GPU: GeForce RTX 4080',
                'category' => 'Laptop',
                'price' => 2599.99,
                'images' => 'assets/laptop_images/Asus Zephyrus M16/ASUS ZEPHYRUS.JPG'
            ],
            [
                    'brand' => 'ACER',
                    'product_name' => 'ACER Predator 21 X',
                    'product_description' => 'Name: ACER Predator 21 X
                                        RAM: 64 GB
                                        Processor: 13th Gen Intel® Core™ i9-13980HX Processor,
                                        GPU: GeForce RTX 4090',
                    'images' => 'assets/laptop_images/ACER Predator 21 X/acer_predator_21.jpg',
                    'category' => 'Laptop',
                    'price' => 2899.99,
            ],
            [
                'brand' => 'MSI',
                'product_name' => 'MSI Titan GT77 HX 13V',
                'product_description' => 'Name: MSI Titan GT77 HX 13V
                                     RAM: 128 GB
                                     Processor: 13th Gen Intel® Core™ i9-13980HX Processor,
                                     GPU: GeForce RTX™ 4090,',
                'category' => 'Laptop',
                'price' => 3362.99,
                'images' => 'assets/laptop_images/MSI Titan GT77 HX 13V/msi_Titan_GT77_HX_13V.jpg'
            ],
            [
                'brand' => 'Intel',
                'product_name' => 'Medion Erazer X20',
                'product_description' => 'Name: Intel Medion Eraser X20
                                    RAM: 32 GB
                                    Processor: 13th Gen Intel® Core™ i9-13980HX Processor,
                                    GPU: GeForce RTX™ 4070 8GB,',
                'category' => 'Laptop',
                'price' => 3262.99,
                'images' => 'assets/laptop_images/Medion Erazer X20/medion_erazer_X20.webp'
            ],
            [
                'brand' => 'Asus',
                'product_name' => 'ROG Strix G16 G614',
                'product_description' => 'Name: Asus ROG Strix G16 G614
                                    RAM: 128 GB
                                    Processor: 13th Gen Intel® Core™ i9-13980HX Processor,
                                    GPU: GeForce RTX™ 4090,',
                'category' => 'Laptop',
                'price' => 3262.99,
                'images' => 'assets/laptop_images/Asus ROG Strix G16 G614/asus_ROG_Strix_G16_G614.jpg'
            ],
            [
                'brand' => 'Alienware',
                'product_name' => 'Alienware M18',
                'product_description' => 'Name: Alienware M18
                                    RAM: 32 GB
                                    Processor: 13th Gen Intel® Core™ i7-13700HX Processor,
                                    GPU: GeForce RTX™ 4080,',
                'category' => 'Laptop',
                'price' => 2729.00,
                'images' => 'assets/laptop_images/Alienware M18/alienware-m18.jpg'
            ],
            [
                'brand' => 'Razer',
                'product_name' => 'Razer Blade 14',
                'product_description' => 'Name: Razer Blade 14
                                    RAM: 16 GB
                                    Processor: AMD Ryzen™ 9 7940HS,
                                    GPU: GeForce RTX™ 4090,',
                'category' => 'Laptop',
                'price' => 2099.99,
                'images' => 'assets/laptop_images/Razer Blade 14/razer_blade_14.jpg'
            ],
            [
                'brand' => 'Lenovo',
                'product_name' => 'Lenovo Legion Pro 7i Gen 8',
                'product_description' => 'Name: Lenovo Legion Pro 7i Gen 8
                                            RAM: 16 GB
                                            Processor: 13th Gen Intel® Core™ i7-13700HX Processor,
                                            GPU: GeForce RTX 4070',
                'category' => 'Laptop',
                'price' => 1799.50,
                'images' => 'assets/laptop_images/Lenovo Legion Pro 7i Gen 8/lenovo_legion_pro.jpg'
            ],
            [
                'brand' => 'ASUS',
                'product_name' => 'ASUS Zephyrus M16',
                'product_description' => 'Name: ASUS Zephyrus M16
                                        RAM: 32 GB
                                        Processor: 13th Gen Intel® Core™ i9-13980HX Processor,
                                        GPU: GeForce RTX 4080',
                'category' => 'Laptop',
                'price' => 2599.99,
                'images' => 'assets/laptop_images/Asus Zephyrus M16/ASUS ZEPHYRUS.JPG'

            ],
            [
                'brand' => 'Acer',
                'product_name' => 'Acer Predator Helios Neo 16',
                'product_description' => 'Name: Acer Predator Helios Neo 16
                                    RAM: 16 GB
                                    Processor: 13th Gen Intel® Core™ i7,
                                    GPU: GeForce RTX 4070',
                'category' => 'Laptop',
                'price' => 1399.00,
                'images' => 'assets/laptop_images/ACER Predator Helios/acer_predator_helios_neo16.jpg'
            ],

            [
                'brand' => 'Lenovo',
                'product_name' => 'Lenovo Legion Slim 5',
                'product_description' => 'Name: Lenovo Legion Slim 5
                                            RAM: 16 GB
                                            Processor: AMD Ryzen 7 7840HS
                                            GPU: GeForce RTX 4060',
                'category' => 'Laptop',
                'price' => 1199.00,
                'images' => 'assets/laptop_images/Lenovo Legion Slim 5/lenovo_legion_slim_5.jpg'
            ],
            [
                'brand' => 'Asus',
                'product_name' => 'ASUS TUF Gaming A15',
                'product_description' => 'Name: ASUS TUF Gaming A15
                                        RAM: 16 GB
                                        Processor: AMD Ryzen 9 7940HS
                                        GPU: GeForce RTX 4070',
                'category' => 'Laptop',
                'price' => 1299.00,
                'images' => 'assets/laptop_images/Asus Tuf Gaming A15/asus_tuf_gaming_a15.jpg'
            ],
            [
                'brand' => 'Asus',
                'product_name' => 'Asus ROG Zephyrus Duo',
                'product_description' => 'Name: Asus ROG Zephyrus Duo
                                    RAM: 64 GB
                                    Processor: AMD Ryzen 9 7945HX
                                    GPU: GeForce RTX 4090',
                'category' => 'Laptop',
                'price' => 4799.00,
                'images' => 'assets/laptop_images/Asus ROG Zephyrus Duo/asus_rog_zephyrus_duo.jpg'
            ],
            [
            'brand' => 'Logitech',
            'product_name' => 'Logitech MX Master 3',
            'product_description' => 'Name: Logitech MX Master 3
            DPI: 4000
            Connectivity: Wireless
            Battery Life: 70 days',
            'category' => 'Mouse',
            'price' => 99.99,
            'images' => 'assets/laptop_images/Asus ROG Zephyrus Duo/asus_rog_zephyrus_duo.jpg'
        ],
             [
             'brand' => 'Razer',
        'product_name' => 'Razer DeathAdder V2',
        'product_description' => 'Name: Razer DeathAdder V2
                            DPI: 20000
                            Connectivity: Wired',
            'category' => 'Mouse',
         'price' => 69.99,
        'images' => 'assets/laptop_images/Asus ROG Zephyrus Duo/asus_rog_zephyrus_duo.jpg'
             ],
            [
                'brand' => 'Corsair',
                'product_name' => 'Corsair Ironclaw RGB',
                'product_description' => 'Name: Corsair Ironclaw RGB
                DPI: 18000
                Connectivity: Wireless, Bluetooth
                Battery Life: 50 hours',
                'category' => 'Mouse',
                'price' => 79.99,
                'images' => 'assets/laptop_images/Asus ROG Zephyrus Duo/asus_rog_zephyrus_duo.jpg'
            ],
            [
                'brand' => 'SteelSeries',
                'product_name' => 'SteelSeries Apex Pro',
                'product_description' => 'Name: SteelSeries Apex Pro
                            Switches: Red
                            Connectivity: Wired
                            Keyboard type : Mechanical',
                'category' => 'Keyboard',
                'price' => 199.99,
                'images' => 'assets/laptop_images/Asus ROG Zephyrus Duo/asus_rog_zephyrus_duo.jpg'
            ],
            [
            'brand' => 'Corsair',
            'product_name' => 'Corsair K95 RGB Platinum',
            'product_description' => 'Name: Corsair K95 RGB Platinum
            Switches: Red
            Connectivity: Wired
            Keyboard type : Mechanical',
            'category' => 'Keyboard',
            'price' => 169.99,
            'images' => 'assets/laptop_images/Asus ROG Zephyrus Duo/asus_rog_zephyrus_duo.jpg'
        ],
            [
                'brand' => 'Razer',
                'product_name' => 'Razer Huntsman Elite',
                'product_description' => 'Name: Razer Huntsman Elite
                            Switches: Blue
                            Connectivity: Wired
                            Keyboard type : Mechanical',
                'category' => 'Keyboard',
                'price' => 199.99,
                'images' => 'assets/laptop_images/Asus ROG Zephyrus Duo/asus_rog_zephyrus_duo.jpg'
                ],
            [
                'brand' => 'Samsung',
                'product_name' => 'Samsung Odyssey G9',
                'product_description' => 'Name: Samsung Odyssey G9
                Screen Size: 24"
                Refresh rate: 144Hz
                Response Time : 1ms',
                'category' => 'Monitor',
                'price' => 1399.99,
                'images' => 'assets/laptop_images/Asus ROG Zephyrus Duo/asus_rog_zephyrus_duo.jpg'
            ],
            [    'brand' => 'LG',
                'product_name' => 'LG UltraGear',
                'product_description' => 'Name: LG UltraGear
                            Screen Size: 27"
                            Refresh rate: 144Hz
                             Response Time : 5ms',
                'category' => 'Monitor',
                'price' => 399.99,
                'images' => 'assets/laptop_images/Asus ROG Zephyrus Duo/asus_rog_zephyrus_duo.jpg'
                ],
            [
                'brand' => 'Dell',
                'product_name' => 'Dell UltraSharp UP3218K',
                'product_description' => 'Name: Dell UltraSharp UP3218K
                Screen Size: 24"
                Refresh rate: 144Hz
                Response Time : 1ms',
                'category' => 'Monitor',
                'price' => 399.99,
                'images' => 'assets/laptop_images/Asus ROG Zephyrus Duo/asus_rog_zephyrus_duo.jpg'
                ]

        ]);

        /*new product lists goes here.
Simply open square bracket (array) and add a comma in the end of the array. */




    }
}

