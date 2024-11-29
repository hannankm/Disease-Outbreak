<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class Household extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;

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

    public function supervisor()
    {
        return $this->belongsTo(User::class);
    }

    public function woreda()
    {
        return $this->belongsTo(Woreda::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($woreda) {
            $woreda->id = (string) Str::uuid(); // Generate UUID when creating a new woreda
        });
    }

}
