<?php

namespace sisHotel;

use Illuminate\Database\Eloquent\Model;

class persona extends Model
{
    protected $table="persona";
    protected $primaryKey="idpersona";
    public $timestamps=false;
    protected $fillable=[
        'nombre_per',
        'apellido_pate_per',
        'apellido_mater_per',
        'tipo_documento',
        'numero_documento',
        'telefono',
        'Fecha_nacimiento',
        'numero_referencia',
        'direccion',


    ];
}
