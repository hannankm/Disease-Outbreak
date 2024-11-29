<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class MalariaCase extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'age_group',
        'sex',
        'diagnosed',
        'household_stat_id'
    ];

    protected $keyType = 'string'; 
    public $incrementing = false; 

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();  
        });
    }

    public function household_stat()
    {
        return $this-> belongsTo(HouseholdStat::class);
    }

}
