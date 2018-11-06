<?php

namespace App\Model\Mbs;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
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
