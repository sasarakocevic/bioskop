<?php


namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BioskopskaSala extends Model
{
    use HasFactory;

    public $table = "sala";

    protected $fillable = [
        'naziv', 'broj_mjesta',
    ];

    public $timestamps = false;

}
