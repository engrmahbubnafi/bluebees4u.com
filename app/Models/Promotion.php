<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Promotion extends Model
{
    use HasFactory, LogsActivity;
    protected $guarded = ['id'];
    protected $table = 'promotions';
    protected static $logAttributes = ['name', 'email'];
}
