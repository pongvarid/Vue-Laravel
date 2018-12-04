<?php
// -----------------------NET---------------------------------

namespace App\Model\Account;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'account_newevent';
    protected $fillable =
    [
        'subject',
        'description',
        'start',
        'end',
        'location',
        'status_id',
        'users_id',
        'event_type',
        'contact_id',
        'account_id',
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
