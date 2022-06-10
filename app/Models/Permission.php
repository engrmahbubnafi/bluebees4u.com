<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = array('id');

    public function parent() {
        return $this->belongsTo(Permission::class, 'parent_id');
    }

    //each category might have multiple children
    public function children() {
        return $this->hasMany(Permission::class, 'parent_id');
    }
}
