<?php

namespace Database\Seeders;

use App\Models\Rating;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;

class RatingSeeder extends Seeder{

    public function run()
    {
        Rating::create([
            'rating' => '4',
            'review'=> 'Great product',
            'product_id' => '8',
            'user_id' => 'Jacob123'
        ]);

        Rating::create([
            'rating' => '4',
            'review'=> 'High quality laptop',
            'product_id' => '9',
            'user_id' => 'thomas'
        ]);
    }

}
