<?php
// -----------------------NET---------------------------------

namespace App\Model\Opportunity;

use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    protected $table = 'opportunity_logacall';
    protected $fillable = [
        'users_id',
        'subject',
        'comment',
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
