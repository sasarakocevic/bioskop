<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    public  $table = 'admin';

    public  $timestamps = false;

    protected $fillable = [
        'username', 'pass', 'ime', 'prezime', 'email', 'telefon', 'datum_kreiranja'
    ];
}
