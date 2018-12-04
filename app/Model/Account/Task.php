<?php
// -----------------------NET---------------------------------

namespace App\Model\Account;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'account_newtask';
    protected $fillable =
    [
        'subject',
        'due_date',
        'status_id',
        'users_id',
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
