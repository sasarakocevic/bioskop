<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    public  $table = 'film';

    public  $timestamps = false;

    protected $fillable = [
        'naziv', 'zanr', 'trajanje', 'ocjena', 'slika_id', 'opis'
    ];

    public function slika()
    {
        return $this->belongsTo(Slika::class, 'slika_id');
    }
}
