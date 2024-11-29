<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Woreda extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'zone_id'];

    // Specify UUID as primary key
    protected $keyType = 'string';
    public $incrementing = false;

    // One Woreda belongs to one Zone
    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }

    // Boot method to automatically generate UUID for new woredas
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($woreda) {
            $woreda->id = (string) Str::uuid(); // Generate UUID when creating a new woreda
        });
    }
}
