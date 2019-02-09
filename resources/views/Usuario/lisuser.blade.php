@extends('layouts.header')
@section('contenido')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Listado de Usuarios</h4>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="order-listing" class="tbuser">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Usuario</th>
                                <th>Fecha_nacimiento</th>
                                <th>Rol</th>
                                <th>Tipo Cliente</th>
                                <th>Estado</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-slide-in-right" aria-hidden="true"
         role="dialog" tabindex="-1" id="mCliente">
        <div class="modal-dialog" >
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Actualizar CLiente</h2>
                </div>
                <div class="modal-body">
                    <form id="EditCliente"   method="post"  >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nombre</label>
                                    <input type="text" class="form-control" id="us_nombre" required="Campo Obligatorio" name="nombre" >
                                    <input type="text" hidden class="form-control" id="id_persona" required="Campo Obligatorio" name="id_persona" >
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Apellido Paterno</label>
                                    <input type="text" class="form-control" id="apellido_pat" required="Campo Obligatorio" name="apellido_pater" >
                                    <p class="errorNom text-danger hidden"></p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Apellido Materno</label>
                                    <input type="text" class="form-control" id="apellido_mat" required="Campo Obligatorio" name="apellido_mater" >
                                    <p class="errorNom text-danger hidden"></p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">N°DNI</label>
                                    <input type="text" class="form-control" id="us_dni" required="Campo Obligatorio" name="dni" >
                                    <p class="errorNom text-danger hidden"></p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Telefono</label>
                                    <input type="text" class="form-control" id="us_telefono" required="Campo Obligatorio" name="telefono" >
                                    <p class="errorNom text-danger hidden"></p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Edad</label>
                                    <input type="text" class="form-control" id="us_edad" required="Campo Obligatorio" name="edad" >
                                    <p class="errorNom text-danger hidden"></p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group date">
                                    <label for="exampleInputEmail1">Fecha_nacimiento</label>

                                    <input type="text" class="form-control" id="us_date" required="Campo Obligatorio" name="Fecha_nacimiento" >
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Carne</label>
                                    <input type="number" class="form-control" id="us_carne" required="Campo Obligatorio" name="us_carne" >
                                    <p class="errorNom text-danger hidden"></p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Usuario</label>
                                    <input type="text" class="form-control" id="us_usuario" required="Campo Obligatorio"
                                           name="username"  >
                                    <p class="errorCode text-danger hidden"></p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Correo</label>
                                    <input type="email" class="form-control" id="us_correo" required="Campo Obligatorio"
                                           name="email"  >
                                    <p class="errorCanti text-danger hidden"></p>
                                </div>
                            </div>
                            <div class="row">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                <button type="button"  class="btn btn-success edit" >Actualizar</button>
                            </div>
                            </div>
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
        $(document).ready( function () {
            table=  $('.tbuser').DataTable({
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
                ajax: '{{url('listarUser')}}',
                columns: [
                    {data: 'fullname', name: 'fullname'},
                    {data: 'username', name: 'username'},
                    {data: 'Fecha_nacimiento',name:'Fecha_nacimiento'},
                    {data: 'nombre_rol',name:'nombre_rol'},
                    {data: 'nombre_cliente',name:'nombre_cliente'},
                    {data: 'estado_user',name:'estado_user'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

        } );

        function actualisar(idusuarios) {
            $('#mCliente').modal('show');

            if(idusuarios){
                $.ajax({
                    url:'{{url('Actualizar')}}/'+idusuarios,
                    type:'get',
                    dataType: 'json',
                    success:function (data) {
                   $.each(data,function (index,val) {
                       $('#us_nombre').val(val.nombre_per);
                       $('#apellido_pat').val(val.apellido_pate_per);
                       $('#apellido_mat').val(val.apellido_mater_per);
                       $('#us_dni').val(val.dni);
                       $('#us_telefono').val(val.telefono);
                       $('#us_edad').val(val.Edad);
                       $('#us_date').val(val.Fecha_nacimiento);
                       $('#us_carne').val(val.carne_estra);
                       $('#us_usuario').val(val.username);
                       $('#us_correo').val(val.email);
                       $('#id_persona').val(val.idPersona);
                   });

                   $('.edit').click(function (e) {
                       alert(idusuarios);
                       /*     $.ajaxSetup({
                             headers: {
                                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                             }
                         });
                         e.preventDefault;
                         var frm=$('#EditCliente');
                         $.ajax({

                           type:'post',
                           dataType:'json',
                           data:frm.serialize(),
                           success:function (data) {
                               if (data.success===true){
                                   frm.trigger('reset');
                                   $('#mCliente').modal('hide');
                                   swal({
                                       position: 'center',
                                       type: 'success',
                                       title: 'Actualizado Correctamente',
                                       showConfirmButton: false,
                                       timer: 1500
                                   });
                                   table.ajax.reload(null,false);
                               }else {
                                   Swal({
                                       type: 'error',
                                       title: 'Oops...',
                                       text: 'Complete los campos Porfavor!',
                                   })
                               }


                           }
                       })


                       */

                   });

                    },

                });

          /*  $('#editar').click(function (e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var frm=$('#EditCliente');
                $.ajax({

                    type:'get',
                    dataType:'json',
                    data:frm.serialize(),
                    success:function (data) {
                        alert(data);

                    }
                })

            })
            */
            }

            $('#mCliente').on('hidden.bs.modal', function () {
                $('#mCliente form')[0].reset();
            });
        }
    </script>
    @endsection
