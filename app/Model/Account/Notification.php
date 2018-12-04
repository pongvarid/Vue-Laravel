<?php

namespace App\Model\Account;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notification';
    protected $fillable =
    [
        'users_id',
        'contact_id',
        'description',
        'status_id',
    ];
    public function user() {
        return $this->belongsTo('App\User','users_id');
    }
    public function contact() {
        return $this->belongsTo('App\Model\Contact\Contact','contact_id');
    }
}
