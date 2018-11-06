<?php

namespace App\Model\Mbs;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    protected $fillable =
    [
        'name',
        'type',
        'value',
        'other',
    ];
    protected $table = 'mbs_choice';
}
