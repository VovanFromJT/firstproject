<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArrayDB extends Model
{
    public $timestamps = false;

    protected $table = 'Sortings';

    protected $fillable = [
        'name',
        'inputArray',
        'outputArray',
        'date',
    ];
}
