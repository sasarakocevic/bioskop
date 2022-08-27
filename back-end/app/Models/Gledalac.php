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
        'ime', 'prezime', 'datum_rodjenja'
    ];

    public function rezervacija()
    {
        return $this->belongsToMany(Rezervacija::class);
    }
}
