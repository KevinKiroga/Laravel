<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    
    protected $table = 'usuarios';


    // Array con los nombres de los campos
    protected $fileTable = [
        'nombre' ,
        'apellido' ,
        'correoElectronico',
        'contra'
    ];
    

}
