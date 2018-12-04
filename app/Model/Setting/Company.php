<?php
// -----------------------NET---------------------------------

namespace App\Model\Setting;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'company';
    protected $fillable =
    [
        'name',
        'img_company',
        'company_id',
        'business_type',
        'establish',
        'status_id',
    ];
}
