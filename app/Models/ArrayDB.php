<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArrayDB extends Model
{
    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var string
     */
    protected $table = 'Sortings';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'inputArray',
        'outputArray',
        'date',
    ];
}
