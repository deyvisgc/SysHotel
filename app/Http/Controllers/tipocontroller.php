<?php

namespace sisHotel\Http\Controllers;

use Illuminate\Http\Request;
use sisHotel\categoria;
use Yajra\Datatables\Datatables;

class tipocontroller extends Controller
{
    public function index(Request $request){
        $ti_habitacion=categoria::all();
        if ($request->ajax()){
            return Datatables::of($ti_habitacion)->make(true);
        }

        return view('tipo_habitacion.categorias');
    }
    public function store(Request $request){

        $tipo=new categoria();
        $tipo->nomcre_Cate=$request->tipo_habitacion;
        $tipo->estado_Catel=$request->estado;
        $tipo->save();

        return response()->json(array("success"=>true));

    }
    public function cargarData($id){
        $tipo=categoria::all()->find($id);
        return response()->json($tipo);


    }
    public function Actualizar(Request $request,$id){
        $tipo=categoria::find($id);
        $tipo->nomcre_Cate=$request->tipo_habitacion;
        $tipo->estado_Catel=$request->estado;
        $tipo->update();

        return response()->json(array("success"=>true));
    }
}
