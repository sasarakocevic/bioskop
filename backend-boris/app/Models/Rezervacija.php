<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Rezervacija extends Model
{
    use HasFactory;

    public $table = "rezervacija";

    protected $fillable = [
        'datum', 'vrijeme', 'karta_id'
    ];

    public $timestamps = false;
    public function karta()
    {
        return $this->belongsToMany(Karta::class, 'karta_id');
    }
}
