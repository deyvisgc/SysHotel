<?php

namespace sisHotel\Http\Controllers;

use Illuminate\Http\Request;
use sisHotel\categoria;
use sisHotel\piso;
use DB;
use Yajra\Datatables\Datatables;

class habitacioncontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        $niveles=piso::all();
        $categorias=categoria::all();
        $habitacion=DB::select("SELECT ha.numero_habitacion,ha.idhabitacion,ha.numero_camas,ha.numero_sillas,ha.estado_habitacion,ha.precio_habitacion,ha.codigo_habitacion,ha.descripcion,cate.nomcre_Cate,ni.numero_nivel FROM habitacion as ha, categorias as cate, niveles as ni WHERE ha.categorias_idcategorias=cate.idcategorias and ha.id_niveles=ni.id_niveles");
     if ($request->ajax()){
         return Datatables::of($habitacion)->make(true);
     }
      return view('habitacion.habitacion',['niveles'=>$niveles,'cate'=>$categorias]);


    }
    public function store(Request $request){

        $habitacion=$request->habitacion;
        $cama=$request->camas;
        $sillas=$request->sillas;
        $precio=$request->precio;
        $codigo=$request->codigo;
        $tipohabitacion=$request->ti_habitacion;
        $nivel=$request->nivel;
        $descipcion=$request->descripcion;
        $estado=$request->estado;
        $habitacion=DB::insert(" call registrarHabitacion($habitacion,$cama,$sillas,'$estado',$precio,'$codigo','$tipohabitacion','$nivel','$descipcion')");

        return response()->json(array("success"=>true));
    }

    public function mostrarHabitaciones(){
        /*piso1*/
        $nivel=DB::select("SELECT * FROM niveles as ni WHERE ni.numero_nivel='piso 1'");
        $Libre=DB::select("SELECT ha.numero_habitacion,ha.precio_habitacion,categorias.nomcre_Cate,niveles.numero_nivel FROM habitacion as ha, categorias ,niveles WHERE ha.categorias_idcategorias=categorias.idcategorias and ha.id_niveles=niveles.id_niveles and ha.estado_habitacion='Libre' AND niveles.numero_nivel='piso 1'");
        $ocupado=DB::select("SELECT ha.numero_habitacion,ha.precio_habitacion,categorias.nomcre_Cate,niveles.numero_nivel FROM habitacion as ha, categorias ,niveles WHERE ha.categorias_idcategorias=categorias.idcategorias and ha.id_niveles=niveles.id_niveles and ha.estado_habitacion='Ocupado' AND niveles.numero_nivel='piso 1'");
        $Reservado1=DB::select("SELECT ha.numero_habitacion,ha.precio_habitacion,categorias.nomcre_Cate,niveles.numero_nivel FROM habitacion as ha, categorias ,niveles WHERE ha.categorias_idcategorias=categorias.idcategorias and ha.id_niveles=niveles.id_niveles and ha.estado_habitacion='Reservado' AND niveles.numero_nivel='piso 1'");
      /*fin piso 1*/
        $nivel2=DB::select("SELECT * FROM niveles as ni WHERE ni.numero_nivel='piso 2'");
        $Libre2=DB::select("SELECT ha.numero_habitacion,ha.precio_habitacion,categorias.nomcre_Cate,niveles.numero_nivel FROM habitacion as ha, categorias ,niveles WHERE ha.categorias_idcategorias=categorias.idcategorias and ha.id_niveles=niveles.id_niveles and ha.estado_habitacion='Libre' AND niveles.numero_nivel='piso 2'");
        $ocupado2=DB::select("SELECT ha.numero_habitacion,ha.precio_habitacion,categorias.nomcre_Cate,niveles.numero_nivel FROM habitacion as ha, categorias ,niveles WHERE ha.categorias_idcategorias=categorias.idcategorias and ha.id_niveles=niveles.id_niveles and ha.estado_habitacion='Ocupado' AND niveles.numero_nivel='piso 2'");
        $Reservado2=DB::select("SELECT ha.numero_habitacion,ha.precio_habitacion,categorias.nomcre_Cate,niveles.numero_nivel FROM habitacion as ha, categorias ,niveles WHERE ha.categorias_idcategorias=categorias.idcategorias and ha.id_niveles=niveles.id_niveles and ha.estado_habitacion='Reservado' AND niveles.numero_nivel='piso 2'");
        /*fin piso 1*/

        $Reservado=DB::select("SELECT * FROM habitacion WHERE estado_habitacion='Reservado'");

        return view('habitacion.listarHabitaciones',
            ['libre'=>$Libre,'ocupado'=>$ocupado, 'reserva'=>$Reservado,
                'nivel'=>$nivel,'nivel2'=>$nivel2,'reser'=>$Reservado1,'libre2'=>$Libre2,'ocupado2'=>$ocupado2,'Reserva'=>$Reservado2]);

    }
}
