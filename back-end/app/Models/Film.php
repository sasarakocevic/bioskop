<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    public  $table = 'film';

    public  $timestamps = false;

    protected $fillable = [
        'naziv', 'zanr', 'trajanje', 'datum_izlaska', 'slika', 'opis'
    ];

    public function projekcija(){
        return $this->hasMany(Projekcija::class);
    }

}
