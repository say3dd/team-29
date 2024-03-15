<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'product_id';

    protected $fillable = [

        'product_name',
        'product_description',
        'category',
        'brand',
        'price',
        'images',
        'stock'

    ];

    public function getAvailableProducts()
    {
        return Product::where('stock', '>', 0)->get();
    }
    public function ratings()
    {
        return $this->hasMany('App\Models\Rating');
    }
}
