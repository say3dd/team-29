<?php
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
                'Battery Life' => "/Battery Life:\s*([^\n,]+)/"
            ],
            'Keyboard' => [
                'Switches' => "/Switches:\s*([^\n,]+)/",
                'Colour' => "/Colour:\s*([^,\n]+)/",
                'Connectivity' => "/Connectivity:\s*([^\n,]+)/",
                'KeyBoard Type' => "/Keyboard Type:\s*([^\n,]+)/"
            ],
            'Monitor' => [
                'Colour' => "/Colour:\s*([^,\n]+)/",
                'Screen Size' => "/Screen Size:\s*([^\n,]+\"?)/",
                'Refresh rate' => "/Refresh rate:\s*([^\n,]+\"?)/",
                'Response Time' => "/Response Time:\s*([^\n,]+\"?)/"

            ],
            'Headset' => [
                'Connectivity' => "/Connectivity:\s*([^,\n]+)/",
                'Colour' => "/Colour:\s*([^,\n]+)/"
            ]
        ];
    }

    /** @Bilal Mo This function works on extracting the features of the product and displaying it for each product
     * - shown in productL page so all products have small info below them for the
     * user to see
     */
    public function extractProductFeatures(Product $product)
    {
        $category = $product->category;
        $categoryPatterns = $this->getCategoryPatterns($category)[$category];
        //placed in an array to contain the data obtained from DB to be displayed to the product paghe
        $features = [];

        foreach ($categoryPatterns as $featureName => $pattern) {
            //checks to match if the pattern and the product desc matches
            // if(is_string($pattern)) {
            preg_match($pattern, $product->product_description, $matches);
            //if the matches array isnt empty and if its correctly matches what been obtained in the array - in this case the product desc
            //then assings to features
            if (!empty($matches) && isset($matches[1])) {
                $features[$featureName] = $matches[1];
            }
            //  }else{
            //   Log::warning("Pattern for {$featureName} is not a string.");

        }
        // }
//return features and displays the result of the matching.
        return $features;
    }

}
