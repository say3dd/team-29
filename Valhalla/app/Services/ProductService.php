<?php
// Created by @KraeBM (Bilal Mohamed) - this file is used as a intermediary sharing of functions that both
// the homecontroller and product Controller use - preventing duplication of code for usage
namespace App\Services;

use App\Models\Product;


class ProductService{

    public function getCategoryPatterns($category)
    {
        // Define the specific patterns used in the database and forms regular expressions to obtain them correctly.
        return [
            'Laptop' => [
                'Colour' => "/Colour:\s*([^,\n]+)/",
                'GPU' => "/GPU: ([^,\n]+)/",
                'Processor' => "/Processor:\s*([^,\n]+)/",
                'RAM' => "/RAM: (\d+\s*GB)/i"
            ],
            'Mouse' => [
                'Colour' => "/Colour:\s*([^,\n]+)/",
                'DPI' => "/DPI:\s*(\d+)/",
                'Connectivity' => "/Connectivity:\s*([^\n,]+)/",
                'Battery-Life' => "/Battery-Life:\s*([^\n,]+)/"
            ],
            'Keyboard' => [
                'Switches' => "/Switches:\s*([^\n,]+)/",
                'Colour' => "/Colour:\s*([^,\n]+)/",
                'Connectivity' => "/Connectivity:\s*([^\n,]+)/",
                'KeyBoard-Type' => "/Keyboard-Type:\s*([^\n,]+)/"
            ],
            'Monitor' => [
                'Colour' => "/Colour:\s*([^,\n]+)/",
                'Screen-Size' => "/Screen-Size:\s*([^\n,]+\"?)/",
                'Refresh-Rate' => "/Refresh-Rate:\s*([^\n,]+\"?)/",
                'Response-Time' => "/Response-Time:\s*([^\n,]+\"?)/"

            ],
            'Headset' => [
                'Connectivity' => "/Connectivity:\s*([^,\n]+)/",
                'Colour' => "/Colour:\s*([^,\n]+)/"
            ]
        ];
    }

    /** @KraeBM (Bilal Mohamed) This function works on extracting the features of the product and displaying it for each product
     * - shown in productL page so all products have small info below them for the
     * user to see
     */
    public function extractProductFeatures(Product $product)
    {
        $category = $product->category;
        $categoryPatterns = $this->getCategoryPatterns($category)[$category];
        //placed in an array to contain the data obtained from DB to be displayed to the product page
        $features = [];
        foreach ($categoryPatterns as $featureName => $pattern) {
            //checks to match if the pattern and the product desc matches
            preg_match($pattern, $product->product_description, $matches);
            //if the matches array isnt empty and if its correctly matches what been obtained in the array - in this case the product desc
            //then assigns to features
            if (!empty($matches) && isset($matches[1])) {
                $features[$featureName] = $matches[1];
            }

        }
//return features and displays the result of the matching.
        return $features;
    }

}
