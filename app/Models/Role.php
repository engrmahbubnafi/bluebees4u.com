<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $guarded = ['id'];

    protected $casts = [
        'is_editable'  => 'boolean',
        'is_deletable' => 'boolean',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permissions', 'role_id', 'permission_id');
    }

    public function scopeDeletable($query)
    {
        return $query->where('is_deletable', true);
    }

    public function scopeNotDeletable($query)
    {
        return $query->where('is_deletable', false);
    }

    public function scopeEditable($query)
    {
        return $query->where('is_editable', true);
    }

    public function scopeNotEditable($query)
    {
        return $query->where('is_editable', false);
    }

}
