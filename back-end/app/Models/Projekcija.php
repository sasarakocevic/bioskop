<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projekcija extends Model
{
    use HasFactory;

    public  $table = 'projekcija';

    public  $timestamps = false;

    protected $fillable = [
        'datum', 'pocetak', 'kraj', 'film_id', 'sala_id'
    ];

    public function film(){
        return $this->belongsTo(Film::class);
    }
    public function sala(){
        return $this->belongsTo(Sala::class);
    }

    public function projekcija_sjediste(){
        return $this->hasMany(Projekcija_sjediste::class);
    }
    public function rezervacija(){
        return $this->hasMany(Rezervacija::class);
    }
}
