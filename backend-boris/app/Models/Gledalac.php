<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Gledalac extends Model
{
    use HasFactory;

    public $table = 'gledalac';

    public $timestamps = 'false';

    protected $fillable = [
        'ime', 'prezime'
    ];
}
