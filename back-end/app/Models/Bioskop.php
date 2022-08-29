<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bioskop extends Model
{
    use HasFactory;

    public  $table = 'bioskop';

    public  $timestamps = false;

    protected $fillable = [
        'naziv', 'bioskop_sale'
    ];

    public function sala(){
        return $this->hasMany(Sala::class);
    }
}
