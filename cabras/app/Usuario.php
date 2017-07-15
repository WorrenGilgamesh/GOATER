<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    public $table = "usuario";
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = ['Nombre', 'Descripcion'];

}
