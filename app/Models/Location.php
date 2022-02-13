<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{

    protected $table = 'locations';

    protected $fillable = [
        'office',
        'pincode',
        'office_type',
        'delivery_status',
        'division',
        'region',
        'circle',
        'taluk',
        'district',
        'state'
    ];

    public $timestamps = false;
}
