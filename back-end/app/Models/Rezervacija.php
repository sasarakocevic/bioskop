<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rezervacija extends Model
{
    use HasFactory;

    public $table = "rezervacija";

    protected $fillable = [
        'broj_karata', 'nacin_placanja', 'projekcija_id'
    ];

    public $timestamps = false;

    public function projekcijaFilma(){
        return $this->belongsTo(ProjekcijaFilma::class,'projekcija_id');
    }

    public function gledalac()
    {
        return $this->belongsToMany(Gledalac::class, 'gledalac_rezervacija');
    }
}
