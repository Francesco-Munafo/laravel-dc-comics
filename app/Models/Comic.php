<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    use HasFactory;

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'artists' => 'array',
        'writers' => 'array',
    ];

    protected $fillable = ['title', 'description', 'price', 'thumb', 'sale_date', 'series', 'type'];
}
