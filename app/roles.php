<?php

namespace sisHotel;

use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    protected $table="rol";
    protected $primaryKey="idrol";
    public $timestamps=false;
    protected $fillable=[
        'estado_rol',
        'nombre_rol',

    ];
}
