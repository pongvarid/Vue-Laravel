<?php

namespace App\Model\Opportunity;

use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{
    protected $table = 'opportunity';
    protected $fillable = [
        'opportunity_name',
        'users_id',
        'account_id',
        'status',
        'probability',
        'loss_reason',
        'closs_date',
        'product',
        'status_id',
    ];

    public function user() {
        return $this->belongsTo('App\User','users_id');
    }
    public function account() {
        return $this->belongsTo('App\Model\Account\Account','account_id');
    }
}
