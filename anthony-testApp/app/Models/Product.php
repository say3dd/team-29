<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'laptop_name',
        'processor',
        'graphics_card',
        'ram',
        'price',
        'image_path',
        'brand',
    ];}
