<?php

namespace App\Model\Contact;

use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    protected $table = 'contact_logacall';
    protected $fillable = [
        'users_id',
        'subject',
        'comment',
        'contact_id',
        'account_id',
        'status_id',
    ];
    public function user() {
        return $this->belongsTo('App\User','users_id');
    }
    public function contact() {
        return $this->belongsTo('App\Model\Contact\Contact','contact_id');
    }
    public function account() {
        return $this->belongsTo('App\Model\Account\Account','account_id');
    }
}
