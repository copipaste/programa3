<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sauna extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'monto',
        'date',
    ];          //esto sirve para poner lo que quiero resivir en el request en el controlador
}
