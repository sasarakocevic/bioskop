<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karta extends Model
{
    use HasFactory;

    public  $table = 'karta';

    public  $timestamps = false;

    protected $fillable = [
        'cijena', 'nacin_placanja', 'sala_id', 'film_id'
    ];

    public function sala(){
        return $this->belongsTo(Sala::class, "sala_id");
    }

    public function film(){
        return $this->belongsTo(Film::class, 'film_id');
    }

}
