<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $table = 'agent';
    protected $fillable = [
        'users_id',
        'salutation',
        'company_name',
        'first_name',
        'middle_name',
        'last_name',
        'suffix',
        'birthday',
        'favorite',
        'remark',
        'position',
        'department',
        'email',
        'phone',
        'mobile',
        'fax',
        'mailing_address',
        'mailing_street',
        'mailing_city',
        'mailing_state',
        'mailing_zipcode',
        'mailing_country',
        'status_id',
    ];

    public function user() {
        return $this->belongsTo('App\User','users_id');
    }
}
