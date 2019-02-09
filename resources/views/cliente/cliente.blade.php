@extends('layouts.header')
@section('contenido')
    <style>
        nav > .nav.nav-tabs{
            border: none;
            color:#fff;
            background:#272e38;
            border-radius:0;
        }
        nav > div a.nav-item.nav-link,
        nav > div a.nav-item.nav-link.active
        {
            border: none;
            padding: 18px 25px;
            color:#fff;
            background:#272e38;
            border-radius:0;
        }
        nav > div a.nav-item.nav-link.active:after
        {
            content: "";
            position: relative;
            bottom: -60px;
            left: -10%;
            border: 15px solid transparent;
            border-top-color: #e74c3c ;
        }
        .tab-content{
            background: #fdfdfd;
            line-height: 25px;
            border: 1px solid #ddd;
            border-top:5px solid #e74c3c;
            border-bottom:5px solid #e74c3c;
            padding:30px 25px;
        }
        nav > div a.nav-item.nav-link:hover,
        nav > div a.nav-item.nav-link:focus
        {
            border: none;
            background: #e74c3c;
            color:#fff;
            border-radius:0;
            transition:background 0.20s linear;
        }
    </style>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="container">
                <div class="row">
                    <div class="col-xs-4 ">
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Activos</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Inactivos</a>
                            </div>
                        </nav>
                        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="col-lg-12 grid-margin stretch-card">
                                    <div class="card">

                                        <p class="card-description">
                                            <div class="card-body">
                                                <h2><i class="fa fa-user fa-lg  text-success" ></i> Clientes Activo</h2>
                                        <p class="card-description">

                                        </p><br>
                                        <button type="button" class="btn btn-outline-primary btn-fw" data-toggle="modal" data-target="#modal-register">Agregar</button><br><br>
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="tb_cliente" >
                                                <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Telefono</th>
                                                    <th>documento</th>
                                                    <th>N°documento</th>
                                                    <th>Correo</th>
                                                    <th>Estado</th>
                                                    <th>EDITAR</th>
                                                    <th>Cambiar estado</th>
                                                </tr>
                                                </thead>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="col-lg-12 grid-margin stretch-card">
                                <div class="card">
                                    <p class="card-description">
                                        <div class="card-body">
                                            <h2><i class="fa fa-user fa-lg  text-danger" ></i> Clientes Inactivo</h2>
                                    <p class="card-description">

                                    </p><br>
                                    <button type="button" class="btn btn-outline-primary btn-fw" data-toggle="modal" data-target="#modal-register">Agregar</button><br><br>
                                    <div class="table-responsive">
                                            <table class="table table-striped" id="tb_clientes1" >
                                                <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Telefono</th>
                                                    <th>documento</th>
                                                    <th>N°documento</th>
                                                    <th>Correo</th>
                                                    <th>Estado</th>
                                                    <th>EDITAR</th>
                                                    <th>Cambiar estado</th>
                                                </tr>
                                                </thead>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>





    <!-- modal registrar cliente -->
    <!-- MODAL -->
    <div class="modal fade" id="modal-register" tabindex="-1" role="dialog" aria-labelledby="modal-register-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">

                    <h3 class="modal-title" id="modal-register-label">Registrar Cliente</h3>
                </div>


                <div class="modal-body">

                    <form role="form"  id="Registrarcliente" action="" method="post" class="registration-form">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" required="Campo Obligatorio" name="nombre_cliente" placeholder="nombre" >
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Apellido Paterno</label>
                                    <input type="text" class="form-control" id="apellido_pa" required="Campo Obligatorio"
                                           name="Apellido_pat"   placeholder="Apellido Paterno">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Apellido Materno</label>
                                    <input type="text" class="form-control" id="apellido_ma" required="Campo Obligatorio"
                                           name="Apellido_Mat"  placeholder="Apellido Materno" >
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Telefono</label>
                                    <input type = "text" maxlength="9" onkeypress="return controltag(event)" class="form-control telef" id="telefono" required="Campo Obligatorio"  name="telefono"  placeholder="Telefono">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">tipo Documento</label>
                                    <select name="documento" class="form-control" >
                                        <option value="dni">DNI</option>
                                        <option value="carne">carne extranjeria</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">N° Documento</label>
                                    <input type = "text" maxlength="8" onkeypress="return controltag(event)" class="form-control" id="n_documento"  required="Campo Obligatorio"  name="n_documento"  placeholder="********">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Direccion</label>
                                    <input type="text" class="form-control" id="direccion" required="Campo Obligatorio" name="Direccion"  placeholder="direccion">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Correo</label>
                                    <input type="email" class="form-control" id="gmail" required="Campo Obligatorio" name="gmail"  placeholder="correo">
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">N# Referencia</label>
                                    <input type="number" class="form-control" id="n_referencia" required="Campo Obligatorio" name="numero_referencia"  placeholder="*********">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Estado</label>
                                    <input type="text" readonly  value="Activo" class="form-control" id="estado"  name="estado">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                            <button type="button"  class="btn btn-success" id="regisCliente">Registrar</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

    <!-- MODAL actualizar cliente -->
    <div class="modal fade" id="modal-update" tabindex="-1" role="dialog" aria-labelledby="modal-register-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">

                    <h3 class="modal-title" id="modal-register-label">Actuaizar Cliente</h3>
                </div>


                <div class="modal-body">

                    <form role="form"  id="frmActualizar" action="" method="post" class="registration-form">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nombre</label>
                                    <input type="text" class="form-control" id="nombre_cliente" required="Campo Obligatorio" name="nombre_cliente"  >
                                    <input type="text" hidden class="form-control" id="idpersona" required="Campo Obligatorio" name="idpersona" >

                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Apellido Paterno</label>
                                    <input type="text" class="form-control" id="apellido_paterno" required="Campo Obligatorio"
                                           name="Apellido_pat"   >
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Apellido Materno</label>
                                    <input type="text" class="form-control" id="apellido_materno" required="Campo Obligatorio"
                                           name="Apellido_Mat"   >
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Telefono</label>
                                    <input type = "text" maxlength="9" onkeypress="return controltag(event)" class="form-control telef" id="telef" required="Campo Obligatorio"  name="telefono" >
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">tipo Documento</label>
                                    <input type="text" class="form-control" id="tipo_documento" required="Campo Obligatorio" name="documento" >

                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">N° Documento</label>
                                    <input type = "text" maxlength="8" onkeypress="return controltag(event)" class="form-control" id="numero_docu"  required="Campo Obligatorio"  name="n_documento"  >
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Direccion</label>
                                    <input type="text" class="form-control" id="direc_cliente" required="Campo Obligatorio" name="Direccion" >
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Correo</label>
                                    <input type="email" class="form-control" id="gmail_cliente" required="Campo Obligatorio" name="gmail"  >
                                </div>
                            </div>
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                            <button type="button"  class="btn btn-success" id="actualizar">Registrar</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>




@endsection
@section('script')
    <script>
        var table;
        var tabla1;
        $(document).ready(function () {
        table=$('#tb_cliente').dataTable({
            stateSave: true,
            responsive: true,
            processing: false,
            serverSide : true,
            language: {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Ningún dato disponible en esta tabla",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                },
            },
            ajax: '{{url('listarcliente')}}',
            columns: [
                {data: 'nombre', name: 'nombre'},
                {data: 'telefono', name: 'telefono'},
                {data: 'tipo_documento',name: 'tipo_documento',},
                {data: 'numero_documento',name: 'numero_documento',},
                {data: 'gmail',name:'gmail'},
                {data: 'estado_cliente',name:'estado_cliente'},
                {"mRender": function ( data, type, row ) {
                        return '<a onclick="actualisar('+row.idcliente+')" ><button type="button" class="btn btn-outline-info"><i class="fa fa-edit fa-lg  text-white" ></button></a>';}
                },
                {"mRender": function ( data, type, row ) {
                        return ' <div class="dropdown">\n' +
                            '                          <button type="button" class="btn btn-dark dropdown-toggle" id="dropdownMenuIconButton7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">\n' +
                            '                            <i class="fa fa-user"></i>\n' +
                            '                          </button>\n' +
                            '                          <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton7">\n' +
                            '                            <a class="dropdown-item" <a onclick="Activar('+row.idcliente+')">Activar</a>\n' +
                            '                            <a class="dropdown-item" <a onclick="Desactivar('+row.idcliente+')">Desactivar</a>\n' +
                            '                          </div>\n' +
                            '                        </div>\n' +
                            ' ';}
                },
            ]
        });



        });
        tabla1=$('#tb_clientes1').dataTable({
            stateSave: true,
            responsive: true,
            processing: false,
            serverSide : true,
            language: {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Ningún dato disponible en esta tabla",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                },
            },
            ajax: '{{url('listaedesactivado')}}',
            columns: [
                {data: 'nombre', name: 'nombre'},
                {data: 'telefono', name: 'telefono'},
                {data: 'tipo_documento',name: 'tipo_documento',},
                {data: 'numero_documento',name: 'numero_documento',},
                {data: 'gmail',name:'gmail'},
                {data: 'estado_cliente',name:'estado_cliente'},
                {"mRender": function ( data, type, row ) {
                        return '<a onclick="actualisar('+row.idcliente+')" ><button type="button" class="btn btn-outline-info"><i class="fa fa-edit fa-lg  text-white" ></button></a>';}
                },
                {"mRender": function ( data, type, row ) {
                        return ' <div class="dropdown">\n' +
                            '                          <button type="button" class="btn btn-dark dropdown-toggle" id="dropdownMenuIconButton7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">\n' +
                            '                            <i class="fa fa-user"></i>\n' +
                            '                          </button>\n' +
                            '                          <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton7">\n' +
                            '                            <a class="dropdown-item" <a onclick="Activar('+row.idcliente+')">Activar</a>\n' +
                            '                            <a class="dropdown-item" <a onclick="Desactivar('+row.idcliente+')">Desactivar</a>\n' +
                            '                          </div>\n' +
                            '                        </div>\n' +
                            ' ';}
                },
            ]
        });

        $('#regisCliente').click(function (e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            e.preventDefault;
            var frm=$('#Registrarcliente');
            $.ajax({
                url:'{{url('registrar')}}',
                dataType:'json',
                type:'post',
                data:frm.serialize(),
                success:function (response) {
                    if(response.success===true){

                        $('#modal-register').modal('hide');
                        frm.trigger('reset');

                        swal({
                            position: 'center',
                            type: 'success',
                            title: 'Registro Exitoso',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        table.api().ajax.reload();



                    }
                }
                ,
                error: function(){
                    alert("error al registrar");
                }
            })
        });
        function actualisar(idcliente) {
            if (idcliente){
                $('#modal-update').modal('show');
               $.ajax({
                   url:'{{url('cargarCliente')}}/'+idcliente,
                   dataType:'json',
                   type:'get',
                   success:function (response) {
                  $.each(response.cliente,function (index,val) {
                      $('#nombre_cliente').val(val.nombre);
                      $('#apellido_paterno').val(val.apellido_pater);
                      $('#apellido_materno').val(val.apellido_mater);
                      $('#telef').val(val.telefono);
                      $('#tipo_documento').val(val.tipo_documento);
                      $('#numero_docu').val(val.numero_documento);
                      $('#direc_cliente').val(val.direccion);
                      $('#gmail_cliente').val(val.gmail);
                      $('#idpersona').val(val.idpersona);

                      $('#actualizar').click(function (event) {

                          $.ajaxSetup({
                              headers: {
                                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                              }
                          });
                          event.preventDefault;
                          var frm=$('#frmActualizar');
                          $.ajax({
                              url:'{{url('update')}}/'+idcliente,
                              dataType:'json',
                              type:'post',
                              data:frm.serialize(),
                              success:function (response) {
                           alert(response);


                              }
                          })

                      })

                  })

                   },
                   error:function () {
                       alert('error');

                   }
               });

            }

        }
        function Activar(idcliente) {
            if (idcliente){
                $.ajax({
                    url:'{{url('Activar')}}/'+idcliente,
                    dataType:'json',
                    type:'get',
                    success:function (resposne) {
                        swal({
                            position: 'center',
                            type: 'success',
                            title: 'Exito al cambiar estado',
                            showConfirmButton: false,
                            timer: 1500
                        });

                        table.api().ajax.reload();
                        tabla1.api().ajax.reload();
                    }
                })
            }
        }

        function Desactivar(idcliente) {
            if (idcliente){
                $.ajax({
                    url:'{{url('Desactivar')}}/'+idcliente,
                    dataType:'json',
                    type:'get',
                    success:function (resposne) {
                        swal({
                            position: 'center',
                            type: 'success',
                            title: 'Exito al cambiar estado',
                            showConfirmButton: false,
                            timer: 1500
                        });

                        tabla1.api().ajax.reload();
                        table.api().ajax.reload();
                    }
                })
            }
        }

        $('#deletVen').on('hidden.bs.modal', function (e) {
            // do something...
            location.reload();
        })

    </script>

    @endsection




