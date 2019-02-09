@extends('layouts.header')
@section('contenido')

    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
              <center><h4 class="card-title">REGISTRAR USUARIOS</h4></center>
                <form id="RegisUser" enctype="multipart/form-data" action="{{url('Regis')}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <p class="card-description">
                        Registro perfil
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nombre</label>
                                <div class="col-sm-9">
                                    <input id="nombre" name="nombre" type="text" class="form-control" placeholder="nombre" />
                                    <p class="errorNom text-danger hidden"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Apellido Paterno</label>
                                <div class="col-sm-9">
                                    <input type="text" name="apellido_pater" class="form-control" placeholder="Apellido Paterno" />
                                    <p class="errorapellido_pater text-danger hidden"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Apellido Materno</label>
                                <div class="col-sm-9">
                                    <input type="text" name="apellido_mater" class="form-control" placeholder="Apellido Materno" />
                                    <p class="errorapellido_mater text-danger hidden"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Telefono</label>
                                <div class="col-sm-9">
                                    <input type="text" name="telefono" class="form-control" placeholder="Telefono" />
                                    <p class="errortelefono text-danger hidden"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">N°DNI</label>
                                <div class="col-sm-9">
                                    <input type="text" name="dni" class="form-control" placeholder="DNI" />
                                    <p class="errordni text-danger hidden"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">N°CARNE</label>
                                <div class="col-sm-9">
                                    <input type="text"  name="carne" class="form-control" placeholder="carne de estranjeria" />
                                    <p class="erroredad text-danger hidden"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Fecha Nacimiento</label>
                                <div class="col-sm-9">
                                    <input class="form-control"  name="Fecha_nacimiento" type="date" placeholder="Fecha Nacimiento" />
                                    <p class="errordate text-danger hidden"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Edad</label>
                                <div class="col-sm-9">
                                    <input type="text"  name="edad" class="form-control" placeholder="Edad" />
                                    <p class="erroredad text-danger hidden"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="card-description">
                        Registro de Usuarios
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Usuario</label>
                                <div class="col-sm-9">
                                    <input type="text" name="username" class="form-control" placeholder="Usuarios" />
                                    <p class="erroruser text-danger hidden"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Correo</label>
                                <div class="col-sm-9">
                                    <input type="text" name="email" class="form-control" placeholder="correo" />
                                    <p class="errorcorreo text-danger hidden"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" name="password" class="form-control" placeholder="*******" />
                                    <p class="errorpass text-danger hidden"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Imagen</label>
                                <div class="col-sm-9">
                                    <input type="file" name="imagen" class="form-control" />
                                    <p class="errorimagen text-danger hidden"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Rol</label>
                                <div class="col-sm-9">
                                    <select name="rol" class="form-control">
                                        @foreach($rol as $ro)
                                            <option value="{{$ro->idrol }}" >{{$ro->nombre_rol}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Estado</label>
                                <div class="col-sm-9">
                                    <select readonly="readonly" name="estado" class="form-control">
                                        <option value="Activo">Activo</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">

                                <button style="margin-left: 450px;" type="button" id="registrar" class="btn btn-outline-success btn-fw">Registrar</button>


                            </div>
                        </div>
                    </div>




                </form>
            </div>
        </div>
    </div>
    @endsection
@section('script')
    <script>


        $('#registrar').click(function (e) {
            e.preventDefault();
            var formData = new FormData(document.getElementById("RegisUser"));
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:'{{url('Regis')}}',
                dataType:'json',
                type:'post',
                data:formData,
                cache: false,
                contentType: false,
                processData: false,
                success:function (response) {
                    $('.errorNom').addClass('hidden');
                    $('.errorapellido_pater').addClass('hidden');
                    $('.errorapellido_mater').addClass('hidden');
                    $('.errortelefono').addClass('hidden');
                    $('.errordni').addClass('hidden');
                    $('.erroredad').addClass('hidden');
                    $('.errordate').addClass('hidden');
                    $('.erroruser').addClass('hidden');
                    $('.errorcorreo').addClass('hidden');
                    $('.errorpass').addClass('hidden');
                    $('.errorimagen').addClass('hidden');
                    if(response.errors) {
                        if (response.errors.nombre) {
                            $('.errorNom').removeClass('hidden');
                            $('.errorNom').text(response.errors.nombre);
                        }
                        if (response.errors.apellido_pater) {
                            $('.errorapellido_pater').removeClass('hidden');
                            $('.errorapellido_pater').text(response.errors.apellido_pater);
                        }
                        if (response.errors.apellido_mater) {
                            $('.errorapellido_mater').removeClass('hidden');
                            $('.errorapellido_mater').text(response.errors.apellido_mater);
                        }
                        if (response.errors.telefono) {
                            $('.errortelefono').removeClass('hidden');
                            $('.errortelefono').text(response.errors.telefono);
                        }
                        if (response.errors.dni) {
                            $('.errordni').removeClass('hidden');
                            $('.errordni').text(response.errors.dni);
                        }
                        if (response.errors.edad) {
                            $('.erroredad').removeClass('hidden');
                            $('.erroredad').text(response.errors.edad);
                        }
                        if (response.errors.Fecha_nacimiento) {
                            $('.errordate').removeClass('hidden');
                            $('.errordate').text(response.errors.Fecha_nacimiento);
                        }
                        if (response.errors.username) {
                            $('.erroruser').removeClass('hidden');
                            $('.erroruser').text(response.errors.username);
                        }
                        if (response.errors.email) {
                            $('.errorcorreo').removeClass('hidden');
                            $('.errorcorreo').text(response.errors.email);
                        }
                        if (response.errors.password) {
                            $('.errorpass').removeClass('hidden');
                            $('.errorpass').text(response.errors.password);
                        }
                        if (response.errors.imagen) {
                            $('.errorimagen').removeClass('hidden');
                            $('.errorimagen').text(response.errors.imagen);
                        }
                    }
                    if(response.success===true){
                        swal({
                            position: 'center',
                            type: 'success',
                            title: 'Registro Exitoso',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        setTimeout(function(){location.href="getUser", 10000} );


                    }
                },
                error: function(){
                    alert("error in ajax form submission");
                }
            });
        });
    </script>
    @endsection
