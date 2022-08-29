<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sjediste extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $table = "sjediste";

    protected $fillable = [
        'broj_sjedista', 'tip_sjedista', 'sala_id'
    ];

    public function sala(){
        return $this->belongsTo(Sala::class);
    }

    public function projekcija_sjediste(){
        return $this->hasMany(Projekcija_sjediste::class);
    }
}
