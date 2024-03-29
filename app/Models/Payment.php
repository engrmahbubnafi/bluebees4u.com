<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Payment extends Model
{
    use HasFactory, LogsActivity, SoftDeletes;

    protected $guarded = ['id'];
    protected $table = 'payments';
    protected static $logAttributes = ['name', 'email'];

    public function SubscriberAddons()
    {
        return $this->hasMany(SubscriberAddon::class);
    }

    public function ThirdParties()
    {
        return $this->hasMany(ThirdParty::class);
    }

    /**
     * Scope a query to only exclude specific Columns.
     *
     * @author Manojkiran.A <manojkiran10031998@gmail.com>
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeExclude($query, ...$columns)
    {
        if ($columns !== []) {
            if (count($columns) !== count($columns, COUNT_RECURSIVE)) {
                $columns = iterator_to_array(new \RecursiveIteratorIterator(new \RecursiveArrayIterator($columns)));
            }

            return $query->select(array_diff($this->getTableColumns(), $columns));
        }
        return $query;
    }

/**
 * Shows All the columns of the Corresponding Table of Model
 *
 * @author Manojkiran.A <manojkiran10031998@gmail.com>
 * If You need to get all the Columns of the Model Table.
 * Useful while including the columns in search
 * @return array
 **/
    public function getTableColumns()
    {
        return \Illuminate\Support\Facades\Cache::rememberForever('MigrMod:' . filemtime(database_path('migrations')), function () {
            return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
        });
    }
}
