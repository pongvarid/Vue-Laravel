<?php
// -----------------------NET---------------------------------

namespace App\Model\Account;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'account';
    protected $fillable =
    [
        'salutation',
        'name',
        'website',
        'phone',
        'fax',
        'mobile',
        'description',
        'employee',
        'billing_address',
        'billing_street',
        'billing_city',
        'billing_state',
        'billing_zipcode',
        'billing_country',
        'shipping_address',
        'shipping_street',
        'shipping_city',
        'shipping_state',
        'shipping_zipcode',
        'shipping_country',
        'status_id',
        'users_id',
    ];
    public function user() {
        return $this->belongsTo('App\User','users_id');
    }
}
