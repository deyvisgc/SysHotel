<?php

namespace sisHotel\Http\Controllers;

use Illuminate\Http\Request;

use sisHotel\roles;
use sisHotel\User;
use sisHotel\persona;
use Validator;
use Redirect;
use DB;
use Yajra\Datatables\Datatables;

use Illuminate\Support\Facades\Input;

class usuariocontroler extends Controller
{

    public function getRegistro()
    {
        $cliente = DB::SELECT("SELECT * FROM cliente");
        $rol = roles::all();
        return view('Usuario.createuse', ['clien' => $cliente, 'rol' => $rol]);
    }

    public function registro(Request $request)
    {
        $regla = [
            'nombre' => 'required',
            'apellido_pater' => 'required',
            'apellido_mater' => 'required',
            'telefono' => 'required',
            'edad' => 'required',
            'Fecha_nacimiento' => 'required',
            'username' => 'required |unique:usuarios',
            'imagen' => 'mimes:jpeg,bmp,PNG ',
            'email' => 'required |unique:usuarios',
            'password' => 'required | max:50',
            'rol' => 'required | max:50',
            'estado' => 'required | max:50',

        ];


        $validate = Validator::make(Input::all(), $regla);
        if ($validate->fails()) {
            return response()->json(array('errors' => $validate->getMessageBag()->toArray()));


        } else {
            DB::beginTransaction();
            $persona = new persona();
            $persona->nombre = $request->get('nombre');
            $persona->apellido_pater = $request->get('apellido_pater');
            $persona->apellido_mater = $request->get('apellido_mater');
            $persona->telefono = $request->get('telefono');
            $persona->dni = $request->get('dni');
            $persona->edad = $request->get('edad');
            $persona->Fecha_nacimiento = $request->get('Fecha_nacimiento');
            $persona->carne_estra = $request->get('carne');
            $persona->save();

            $user = new User();
            $user->Persona_idPersona = $persona->idPersona;
            $user->username = $request->get('username');
            $user->email = $request->get('email');
            if ($user->imagen = !null) {
                if (Input::hasFile('imagen')) {
                    $file = Input::file('imagen');
                    $file->move(public_path() . '/Imagenes/Usuario/', $file->getClientOriginalName());
                    $user->imagen = $file->getClientOriginalName();
                } else {
                    $user->imagen = 'default-avatar.png';
                }

            }
            $user->password = bcrypt($request->get('password'));
            $user->rol_idrol = $request->get('rol');
            $user->estado_user = $request->get('estado');
            $user->save();
            DB::commit();
        }

        return response()->json(array("success" => true));
    }
    public function getUser(){
        return view('Usuario.lisuser');
    }
    public function listarUser(Request $request){
  $user=DB::SELECT("SELECT u.idusuarios,u.username,u.email,u.estado_user, concat(persona.nombre_per,' ',persona.apellido_pate_per,' ',persona.apellido_mater_per) as fullname,persona.dni,persona.telefono,persona.Fecha_nacimiento,rol.nombre_rol,tipo_ciente.nombre_cliente 
FROM usuarios u , persona ,rol,cliente,tipo_ciente WHERE u.Persona_idPersona=persona.idPersona and u.rol_idrol=rol.idrol 
and persona.Cliente_idCliente=cliente.idCliente and cliente.id_tipo_cliente=tipo_ciente.idtipo_ciente and rol.idrol<>1");

        if ($request->ajax()){
            return Datatables::of($user)
                ->addColumn('action', function ($id){
                    return '<div class="dropdown">
                          <button type="button" class="btn btn-dark dropdown-toggle" id="dropdownMenuIconButton7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user"></i>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton7">
                            <a class="dropdown-item" onclick="actualisar('.$id->idusuarios.')">Actualizar</a>
                            <a class="dropdown-item" onclick="Eliminar('.$id->idusuarios.')" href="#">Eliminar</a>
                            <a class="dropdown-item" onclick="Activar('.$id->idusuarios.')"  href="#">Activar</a>
                            <a class="dropdown-item" onclick="Desactivar('.$id->idusuarios.')"  href="#">Desactivar</a>
                          </div>
                        </div>';})->rawColumns(['action'])->make(true);
        }
    }
    public function Actualizar($id){

        $user=DB::SELECT("SELECT u.idusuarios,u.username,u.email,u.estado_user,persona.idPersona, persona.nombre_per,persona.apellido_pate_per,persona.apellido_mater_per,persona.Edad,persona.carne_estra,ifnull(persona.dni,0) as dni,persona.telefono,persona.Fecha_nacimiento,rol.nombre_rol,tipo_ciente.nombre_cliente FROM usuarios u , persona ,rol,cliente,tipo_ciente WHERE u.Persona_idPersona=persona.idPersona and u.rol_idrol=rol.idrol and persona.Cliente_idCliente=cliente.idCliente and cliente.id_tipo_cliente=tipo_ciente.idtipo_ciente and U.idusuarios=$id");
        return response()->json($user);
    }
    public function UpdateClien(Request $request,$id){

        $regla = [
            'nombre' => 'required',
            'apellido_pater' => 'required',
            'apellido_mater' => 'required',
            'telefono' => 'required',
            'edad' => 'required',
            'Fecha_nacimiento' => 'required',
            'username' => 'required',
            'email' => 'required ',

        ];

        $validate = Validator::make(Input::all(), $regla);
        if ($validate->fails()) {
            return response()->json(array('errors' => $validate->getMessageBag()->toArray()));


        }else{
            DB::beginTransaction();
            $user=User::find($id);
            $persona=persona::find(Input::get('id_persona'));
            $persona->nombre = $request->get('nombre');
            $persona->apellido_mater = $request->get('apellido_pater');
            $persona->apellido_pater = $request->get('apellido_mater');
            $persona->telefono = $request->get('telefono');
            $persona->dni = $request->get('dni');
            $persona->edad = $request->get('edad');
            $persona->Fecha_nacimiento = $request->get('Fecha_nacimiento');
            $persona->carne_estra = $request->get('us_carne');
            $persona->update();
            $user->Persona_idPersona = $persona->idPersona;
            $user->username = $request->get('username');
            $user->email = $request->get('email');
            $user->update();
            DB::commit();
        }
        return response()->json(array("success"=>true));


    }
}
