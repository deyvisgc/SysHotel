<?php

namespace sisHotel;

use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    protected $table="categorias";
    protected $primaryKey="idcategorias";
    public $timestamps=false;
    protected $fillable=[
        'nomcre_Cate',
        'estado_Catel',

    ];
}
