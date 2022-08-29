<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Karta extends Model
{

    public  $table = 'karta';

    public  $timestamps = false;

    protected $fillable = [
        'cijena', 'sala_id', 'film_id'
    ];

    public function sala(){
        return $this->belongsTo(BioskopskaSala::class, "sala_id");
    }

    public function film(){
        return $this->belongsTo(Film::class, 'film_id');
    }
}
