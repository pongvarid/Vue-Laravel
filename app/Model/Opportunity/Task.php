<?php

namespace App\Model\Opportunity;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'opportunity_newtask';
    protected $fillable = [
        'users_id',
        'subject',
        'due_date',
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
