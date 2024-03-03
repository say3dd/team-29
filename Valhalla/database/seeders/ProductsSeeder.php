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
            'category'=> 'Laptop',
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
                    'category'=> 'Laptop',
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
                    'category'=> 'Laptop',
                    'price' => 3262.99,
                    'images' => 'assets/laptop_images/Asus ROG Strix G16 G614/asus_ROG_Strix_G16_G614.jpg'
                ],

            /*new product lists goes here.
            Simply open square bracket (array) and add a coma in the end of the array. */

        ]);









    }
}
