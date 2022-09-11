<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gledalac extends Model
{
    public $table = 'gledalac';

    use HasFactory;

    protected $fillable = [
        'ime', 'prezime', 'email', 'telefon', 'karta_id'
    ];

    public function karte()
    {
        return $this->belongsTo(Karta::class, 'karta_id');
    }

}
