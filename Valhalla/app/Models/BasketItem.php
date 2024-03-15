<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasketItem extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'product_id',
        'product_name',
        'product_name',
        'quantity',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
