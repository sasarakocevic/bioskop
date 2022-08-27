<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjekcijaFilma extends Model
{
    use HasFactory;

    public  $table = 'projekcija_filma';

    public  $timestamps = false;

    protected $fillable = [
        'datum', 'vrijeme_projekcije', 'karta_id'
    ];

    public function karta(){
        return $this->belongsTo(Karta::class, "karta_id");
    }
}

