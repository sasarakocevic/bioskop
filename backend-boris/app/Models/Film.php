<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    public  $table = 'film';

    public  $timestamps = false;

    protected $fillable = [
        'naziv', 'zanr', 'trajanje'
    ];

}
