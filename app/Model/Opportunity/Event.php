<?php

namespace App\Model\Opportunity;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'opportunity_newevent';
    protected $fillable = [
        'users_id',
        'subject',
        'description',
        'start',
        'end',
        'event_type',
        'location',
        'contact_id',
        'opportunity_id',
        'status_id',
    ];
    public function user() {
        return $this->belongsTo('App\User','users_id');
    }
    public function contact() {
        return $this->belongsTo('App\Model\Contact\Contact','contact_id');
    }
    public function opportunity() {
        return $this->belongsTo('App\Model\Opportunity\Opportunity','opportunity_id');
    }
}
