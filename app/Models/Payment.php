<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Payment extends Model
{
    use HasFactory, LogsActivity;

    protected $guarded = ['id'];
    protected $table = 'payments';
    protected static $logAttributes = ['name', 'email'];

    public function SubscriberAddons(){
        return $this->hasMany(SubscriberAddon::class);
    }
}
