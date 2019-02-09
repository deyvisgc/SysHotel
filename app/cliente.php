<?php

namespace sisHotel;

use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    protected $table="cliente";
    protected $primaryKey="idCliente";
    public $timestamps=false;
    protected $fillable=[
        'estado_cliente',
        'gmail',
        'persona_idpersona',

    ];

}
