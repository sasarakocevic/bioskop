<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Placanje extends Model
{
    use HasFactory;

    public  $table = 'placanje';

    public  $timestamps = false;

    protected $fillable = [
        'iznos', 'vrijeme', 'kupon', 'nacin_placanja', 'rezervacija_id'
    ];

    public function rezervacija(){
        return $this->belongsTo(Rezervacija::class);
    }
}
