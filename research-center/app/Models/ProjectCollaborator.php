<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectCollaborator extends Model
{
    protected $fillable = ['project_id', 'researcher_id', 'status'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function researcher()
    {
        return $this->belongsTo(Researcher::class);
    }
}
