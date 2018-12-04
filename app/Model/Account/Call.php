<?php
// -----------------------NET---------------------------------

namespace App\Model\Account;

use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    protected $table = 'account_logacall';
    protected $fillable =
    [
        'subject',
        'comment',
        'status_id',
        'account_id',
        'contact_id',
        'users_id',
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
