<?php

namespace sisHotel\Http\Controllers;

use Illuminate\Http\Request;
use sisHotel\piso;
use Yajra\Datatables\Datatables;
use Validator;
use Redirect;
use DB;


use Illuminate\Support\Facades\Input;
class pisocontroller extends Controller

{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request){
        $piso=DB::select("select * from niveles order by id_niveles ASC");
        if ($request->ajax()){
            return Datatables::of($piso)->make(true);
        }
        return view('pisos.piso');
    }

    public function store(Request $request){
$numero=$request->nu_piso;
$estado=$request->input('estado');

$pisos=DB::insert(" call registrar_niveles('$numero','$estado')");

return response()->json($pisos);

    }

    public function cargarData($id){
        $piso=DB::select("select * from niveles where  id_niveles=$id");
        return response()->json($piso);

    }

    public function actualizar(Request $request,$id){
        $numero=$request->nu_piso;
        $estado=$request->input('estado');
        $pisos=DB::update("call editarnivel('$numero','$estado',$id)");
        return response()->json(array("success"=>true));


    }


}
