<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slika extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $table = 'slika';

    protected $fillable = [
        'putanja'
   ];

    public function film()
    {
        return $this->belongsToMany(Film::class);
    }
}
