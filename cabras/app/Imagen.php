<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    public $table = "usuario";
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = ['usuarioId', 'fotoPerfil','fotoPerfilMimeType'];
}
