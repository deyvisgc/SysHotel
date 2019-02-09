<?php

namespace sisHotel;

use Illuminate\Database\Eloquent\Model;

class piso extends Model
{
    protected $table="niveles";
    protected $primaryKey="id_niveles";
    public $timestamps=false;
    protected $fillable=[
        'numero_nivel',
        'estado_nivel',

    ];
}
