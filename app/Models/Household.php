<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class Household extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'phone_number',
        'house_number',
        'spouse_name',
        'spouse_phone_number',
        'no_of_adults',
        'no_of_children',
        'location',
        'supervisor_id',
        'woreda_id'
    ];

    protected $keyType = 'string'; 
    public $incrementing = false; 

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();  
        });
    }

    public function supervisor()
    {
        return $this->belongsTo(User::class);
    }

    public function woreda()
    {
        return $this->belongsTo(Woreda::class);
    }

}
