<?php

namespace App\Model\Contact;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'contact_newevent';
    protected $fillable = [
        'users_id',
        'subject',
        'description',
        'start',
        'end',
        'event_type',
        'location',
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
