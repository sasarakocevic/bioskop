<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projekcija_sjediste extends Model
{
    use HasFactory;

    public  $table = 'projekcija_sjediste';

    public  $timestamps = false;

    protected $fillable = [
        'status', 'cijena', 'sjediste_id', 'projekcija_id', 'rezervacija_id'
    ];

    public function sjediste(){
        return $this->belongsTo(Sjediste::class);
    }
    public function projekcija(){
        return $this->belongsTo(Projekcija::class);
    }
    public function rezervacija(){
        return $this->belongsTo(Rezervacija::class);
    }
}
