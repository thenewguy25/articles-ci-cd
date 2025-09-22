<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class articles extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'author',
        'status',
        'category'
    ];
    public function tags()
    {
        return $this->belongsToMany(
            Tag::class,
            'article_tag',      // Pivot table
            'article_id',       // Foreign key on the pivot table for this model
            'tag_id'            // Foreign key on the pivot table for the related model
        );
    }
}
