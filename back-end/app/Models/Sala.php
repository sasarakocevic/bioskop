<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $table = "sala";

    protected $fillable = [
        'naziv', 'broj_mjesta', 'bioskop_id'
    ];

    public function bioskop(){
        return $this->belongsTo(Bioskop::class);
    }

    public function projekcija(){
        return $this->hasMany(Projekcija::class);
    }
    public function sjediste(){
        return $this->hasMany(Sjediste::class);
    }
}
