<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    protected $fillable = [
        'researcher_id', 'title', 'abstract', 'journal', 'doi',
        'publication_date', 'source', 'external_id', 'authors', 'raw_data'
    ];

    protected $casts = [
        'authors' => 'array',
        'raw_data' => 'array',
    ];

    public function researcher()
    {
        return $this->belongsTo(Researcher::class);
    }
}
