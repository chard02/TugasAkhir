<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'researcher_id',
        'title',
        'description',
        'start_date',
        'end_date',
        'status',
    ];

    public function researcher()
    {
        return $this->belongsTo(Researcher::class);
    }

    public function collaborators()
    {
        return $this->belongsToMany(Researcher::class, 'project_collaborators')
                    ->withPivot('status')
                    ->withTimestamps();
    }
}
