<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_name',
        'customer_id',
        'product_name',
        'product_id',
        'product_price',
        'product_qty',
        'total_price',
        'status',
    ];
}
