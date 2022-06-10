<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Package extends Model
{
    use HasFactory, LogsActivity;

    protected $guarded = ['id'];
    protected $table = 'packages';
    protected static $logAttributes = ['name', 'email'];

    public function packageFeature()
    {
        return $this->hasMany(PackageFeature::class,'package_id');
    }
}
