<?php

namespace App\Model\Table;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable =
    [
        'name',
        'value',
        'other',
        'permission',
        'description'
    ];
    protected $table = 'mbs_setting';
}
