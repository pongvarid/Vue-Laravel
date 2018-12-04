<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $fillable = [
        'product_name',
        'product_code',
        'product_type',
        'product_description',
        'status_id',
    ];

}
