<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseholdStat extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'no_of_active_cases',
        'no_of_death',
        'no_of_people_at_risk',
        'no_of_recovered',
        'date',
        'household_id',
        'supervisor_id',
    ];

    protected $keyType = 'string'; 
    public $incrementing = false; 

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();  
        });
    }

    public function household()
    {
        return $this->belongsTo(Household::class);
    }

    public function supervisor()
    {
        return $this->belongsTo(User::class);
    }

}
