<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rezervacija extends Model
{
    use HasFactory;

    public $timestamps = true;

    public $table = "rezervacija";

    protected $fillable = [
        'broj_sjedista', 'vrijeme', 'status', 'gledalac_id', 'projekcija_id'
    ];

    public function gledalac(){
        return $this->belongsTo(Gledalac::class);
    }
    public function projekcija(){
        return $this->belongsTo(Projekcija::class);
    }

    public function placanje(){
        return $this->hasMany(Placanje::class);
    }
    public function projekcija_sjediste(){
        return $this->hasMany(Projekcija_sjediste::class);
    }
}
