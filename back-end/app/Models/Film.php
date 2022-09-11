<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    public $table = 'film';

    use HasFactory;

    protected $fillable = [
        'naziv', 'zanr', 'tajanje'
    ];

    public function rezervacije()
    {
        return $this->hasOne(Rezervacija::class);
    }

}
