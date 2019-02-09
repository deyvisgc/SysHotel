<?php

namespace sisHotel\Http\Controllers;

use Illuminate\Http\Request;
use sisHotel\persona;
use sisHotel\cliente;
use Validator;
use Redirect;
use DB;
use Yajra\Datatables\Datatables;

use Illuminate\Support\Facades\Input;


class clientecontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function cliente(){
        return view('cliente.cliente');
    }

    public function listarcliente(){
        $cliente=DB::select("SELECT c.idcliente, c.estado_cliente,Concat(p.nombre,' ',p.apellido_pater,' ',p.apellido_mater) as nombre ,p.telefono,p.Edad,p.numero_referencia,p.direccion,p.tipo_documento,c.gmail,p.numero_documento FROM cliente as c , persona as p WHERE c.persona_idpersona=p.idpersona and c.estado_cliente='Activo'");
        return Datatables::of($cliente)->make(true);

    }
    public function listaedesactivado(){
        $cliente=DB::select("SELECT c.idcliente, c.estado_cliente,Concat(p.nombre,' ',p.apellido_pater,' ',p.apellido_mater) as nombre ,p.telefono,p.Edad,p.numero_referencia,p.direccion,p.tipo_documento,c.gmail,p.numero_documento FROM cliente as c , persona as p WHERE c.persona_idpersona=p.idpersona and c.estado_cliente='Desactivo'");
        return Datatables::of($cliente)->make(true);
    }
    public function cargarDatos($id){
        $cliente=DB::select("SELECT p.idpersona, c.idcliente, c.estado_cliente,p.nombre,p.apellido_pater,p.apellido_mater,p.telefono,p.numero_referencia,p.direccion,p.tipo_documento,p.numero_documento,c.gmail FROM cliente as c , persona as p WHERE c.persona_idpersona=p.idpersona  and c.idcliente=$id ");

       $data=array('cliente'=>$cliente);
        return response()->json($data);
    }

    public function regsitro(Request $request){

        $regla=[
            'nombre_cliente'=>'required',
            'Apellido_pat'=>'required',
            'Apellido_Mat'=>'required',
            'telefono'=>'required',
            'documento'=>'required',
            'n_documento'=>'required',
            'Direccion'=>'required',
            'gmail'=>'required',
            'numero_referencia'=>'required',

        ];
        $valida=Validator::make(Input::all(),$regla);
        if($valida->fails()){
            return response()->json(array('errors' => $valida->getMessageBag()->toArray()));
        } else{
            DB::beginTransaction();
            $persona=new persona();
            $persona->nombre=$request->get('nombre_cliente');
            $persona->apellido_mater=$request->get('Apellido_pat');
            $persona->apellido_pater=$request->get('Apellido_Mat');
            $persona->telefono=$request->get('telefono');
            $persona->numero_documento=$request->get('n_documento');
            $persona->tipo_documento=$request->get('documento');
            $persona->direccion=$request->get('Direccion');
            $persona->numero_referencia=$request->get('numero_referencia');
            $persona->save();

            $cliente=new cliente();
            $cliente->persona_idpersona=$persona->idPersona;
            $cliente->estado_cliente=$request->get('estado');
            $cliente->gmail=$request->request->get('gmail');
            $cliente->save();
            DB::commit();
        }
        return response()->json(array("success"=>true));


    }

    public function actualizar(Request $request,$id){
        $regla=[
            'nombre_cliente'=>'required',
            'Apellido_pat'=>'required',
            'Apellido_Mat'=>'required',
            'telefono'=>'required',
            'documento'=>'required',
            'n_documento'=>'required',
            'Direccion'=>'required',
            'gmail'=>'required',

        ];
        $valida=Validator::make(Input::all(),$regla);
        if($valida->fails()){
            return response()->json(array('errors' => $valida->getMessageBag()->toArray()));
        } else{
            DB::beginTransaction();
            $cliente=cliente::find($id);
            $persona=persona::find(Input::get('idpersona'));
            $persona->nombre=$request->get('nombre_cliente');
            $persona->apellido_mater=$request->get('Apellido_pat');
            $persona->apellido_pater=$request->get('Apellido_Mat');
            $persona->telefono=$request->get('telefono');
            $persona->numero_documento=$request->get('n_documento');
            $persona->tipo_documento=$request->get('documento');
            $persona->direccion=$request->get('Direccion');
            $persona->numero_referencia=$request->get('numero_referencia');
            $persona->update();
            $cliente->persona_idpersona=$persona->idPersona;
            $cliente->estado_cliente=$request->get('estado');
            $cliente->gmail=$request->request->get('gmail');
            $cliente->update();
            DB::commit();
        }
        return response()->json(array("success"=>true));

    }
    public function Activar($id){
        $ro=DB::table('cliente')
            ->where('idcliente', $id)
            ->update(['estado_cliente' => 'Activo']);
        return response()->json($ro);

    }
    public function Desactivar($id){
        $ro=DB::table('cliente')
            ->where('idcliente', $id)
            ->update(['estado_cliente' => 'Desactivo']);
        return response()->json($ro);

    }
}
