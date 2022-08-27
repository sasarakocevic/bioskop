<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    use HasFactory;

    public $table = "sala";

    protected $fillable = [
        'naziv',
        'sjediste_id',
    ];

    public $timestamps = false;
}
