<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class articles extends Model
{
    protected $fillable = [
        'title',
        'content',
        'author',
        'status',
        'category'
    ];
}
