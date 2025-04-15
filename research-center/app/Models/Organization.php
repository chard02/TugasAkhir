<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{

    protected $table = 'organization_structures';

    protected $fillable = [
        'name',
        'position_title',
        'parent_id',
        'photo',
        'description',
        'order',
    ];

    public function parent()
    {
        return $this->belongsTo(OrganizationStructure::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Organization::class, 'parent_id');
    }
    public function childrenRecursive()
    {
        return $this->hasMany(Organization::class, 'parent_id')->with('childrenRecursive');
    }
}