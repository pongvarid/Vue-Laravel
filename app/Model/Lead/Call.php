<?php

namespace App\Model\Lead;

use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    protected $table = 'lead_logacall';
    protected $fillable = [
        'users_id',
        'subject',
        'comment',
        'lead_id',
        'account_id',
        'status_id',
    ];
    public function user() {
        return $this->belongsTo('App\User','users_id');
    }
    public function lead() {
        return $this->belongsTo('App\Model\Lead\Lead','lead_id');
    }
    public function account() {
        return $this->belongsTo('App\Model\Account\Account','account_id');
    }//
}
