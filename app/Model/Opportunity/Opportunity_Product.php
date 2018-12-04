<?php

namespace App\Model\Opportunity;

use Illuminate\Database\Eloquent\Model;

class Opportunity_Product extends Model
{
    protected $table = 'opportunity_product';
    protected $fillable = [
        'opportunity_id',
        'product_id',
        'expected_volume',
        'frequency',
        'gross_revenue',
        'net_profit',
        'status_id',
    ];

    public function opportunity() {
        return $this->belongsTo('App\Model\Opportunity\Opportunity','opportunity_id');
    }
    public function product() {
        return $this->belongsTo('App\Model\Product','product_id');
    }
}
