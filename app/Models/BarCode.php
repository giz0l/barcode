<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarCode extends Model
{
    protected $fillable = [
        'name',
        'value',
        'path'
    ];
}
