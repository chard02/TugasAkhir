<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Researcher extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'institution',
        'academic_position',
        'expertise',
        'orcid_id',
        'scopus_id',
        'garuda_id',
        'googlescholar_id',
        'bio',
        'phone',
        'photo',
        'is_approved', 
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function scopeFindByOrcid($query, $orcidId)
    {
        return $query->where('orcid_id', $orcidId)->first();
    }
}
