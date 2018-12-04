<?php

namespace App\Model\Lead;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $table = 'lead';
    protected $fillable = [
        'lead_status',
        'salutation',
        'first_name',
        'middle_name',
        'last_name',
        'suffix',
        'title',
        'email',
        'phone',
        'mobile',
        'rating',
        'users_id',
        'website',
        'company',
        'industry',
        'employees',
        'lead_source',
        'street',
        'city',
        'state',
        'zipcode',
        'country',
        'status_id',
    ];

    public function user() {
        return $this->belongsTo('App\User','users_id');
    }
}
