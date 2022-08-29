<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gledalac extends Model
{
    use HasFactory;

    public $table = 'gledalac';

    public $timestamps = 'false';

    protected $fillable = [
        'username', 'pass', 'ime', 'prezime', 'email', 'telefon'
    ];

    public function rezervacija(){
        return $this->hasMany(Rezervacija::class);
    }
}
