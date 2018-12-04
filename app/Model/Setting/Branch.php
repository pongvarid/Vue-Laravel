<?php
// -----------------------NET---------------------------------

namespace App\Model\Setting;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table = 'branch';
    protected $fillable =
    [
        'name',
        'website',
        'fax',
        'description',
        'timezone',
        'currency',
        'remark',
        'phone',
        'mobile',
        'mailing_address',
        'mailing_street',
        'mailing_city',
        'mailing_state',
        'mailing_zipcode',
        'mailing_country',
        'status_id',
    ];

    public function users() {
        return $this->hasMany('App\User');
    }
    // public function user() {
    //     return $this->hasMany('App\Model\Setting\User');
    // }
    
}
