<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;

    public function articles()
    {
        return $this->belongsToMany(
            \App\Models\articles::class,
            'article_tag',      // Pivot table
            'tag_id',           // Foreign key on the pivot table for this model
            'article_id'        // Foreign key on the pivot table for the related model
        );
    }
}
