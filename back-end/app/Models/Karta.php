<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karta extends Model
{
    public $table = 'karta';

    use HasFactory;

    protected $fillable = [
        'rezervacija_id'
    ];

    public function rezervacije()
    {
        return $this->belongsTo(Karta::class, 'rezervacija_id');
    }

    public function gledalac()
    {
        return $this->hasOne(Gledalac::class);
    }
}
