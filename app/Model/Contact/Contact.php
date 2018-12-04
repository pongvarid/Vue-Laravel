<?php

namespace App\Model\Contact;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contact';
    protected $fillable = [
        'salutation',
        'first_name',
        'middle_name',
        'last_name',
        'suffix',
        'birthday',
        'favorite',
        'remark',
        'users_id',
        'account_id',
        'report_to',
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
    public function account() {
        return $this->belongsTo('App\Model\Account\Account','account_id');
    }
}
