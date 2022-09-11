<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rezervacija extends Model
{
    public $table = 'rezervacija';

    public $timestamps = false;

    use HasFactory;

    protected $fillable = [
        'datum', 'vrijeme', 'sala_id', 'film_id'
    ];

    public function sale()
    {
        return $this->belongsTo(Sala::class, 'sala_id');
    }

    public function filmovi()
    {
        return $this->belongsTo(Film::class, 'film_id');
    }
}
