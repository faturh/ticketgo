<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    // mass assignment
    protected $fillable = [
        'name',
        'slug', // unique karakter untuk mengidentifikasikan untuk developer nanti url seo nya bagus ga angka asal
        'icon',
    ];

    public function setNameAttribute($value){
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }


    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }
}

