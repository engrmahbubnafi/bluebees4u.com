<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuLocationMapping extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function parent()
    {
        return $this->belongsTo(MenuLocationMapping::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(MenuLocationMapping::class, 'parent_id')
            ->join('menus', 'menus.id', '=', 'menu_location_mappings.menu_id')
            ->where('menus.status', 1)
            ->orderBy('menu_location_mappings.sequence', 'ASC')
            ->select('menu_location_mappings.id', 'menu_location_mappings.parent_id', 'menus.name', 'menus.slug', 'menus.type', 'menus.description', 'menus.file', 'menu_location_mappings.location_id');
    }
}
