@extends('layouts.header')
@section('contenido')
    <div class="card">
        <div class="card-body">
            <p class="card-description">
                <div class="card-body">
                    <h2><i class="fas fa-building fa-lg  text-success" ></i> Pisos </h2>
            <p class="card-description">

            </p><br>
            <button type="button" class="btn btn-outline-primary btn-fw" data-toggle="modal" data-target="#modal-register">Agregar</button><br><br>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="tbpiso" class="table table-striped">
                            <thead>
                            <tr>
                                <th>N# PISO</th>
                                <th>ESTADO</th>
                                <th>EDITAR</th>
                                <th>CAMBIAR ESTADO</th>
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
    <div class="modal fade" id="modal-register" tabindex="-1" role="dialog" aria-labelledby="modal-register-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">

                    <h3 class="modal-title" id="modal-register-label">Registrar Pisos</h3>
                </div>


                <div class="modal-body">

                    <form role="form"  id="frmRegis" action="" method="post" class="registration-form">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">N# PISO</label>
                                    <input type="text" class="form-control" id="n_piso" required name="nu_piso"  >
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Estado</label>
                                    <input type="text" class="form-control" id="estado" required="Campo Obligatorio"
                                           name="estado"   value="Activo">
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                            <button type="button" onclick="validarcampos();" class="btn btn-success" id="regisPiso">Registrar</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

    <!--modal ediatr -->
    <div class="modal fade" id="modal-update" tabindex="-1" role="dialog" aria-labelledby="modal-register-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">

                    <h3 class="modal-title" id="modal-register-label">Editar Pisos</h3>
                </div>


                <div class="modal-body">

                    <form role="form"  id="frmupdate" action="" method="post" class="registration-form">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">N# PISO</label>
                                    <input type="text" class="form-control" id="numero_piso" required name="nu_piso"  >
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Estado</label>
                                    <input type="text" class="form-control" id="estado" required="Campo Obligatorio"
                                           name="estado"   value="Activo">
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-success" id="update">Registrar</button>
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
            table=$('#tbpiso').dataTable({
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
                ajax: '{{url('Piso')}}',
                columns: [
                    {data: 'numero_nivel', name: 'numero_nivel'},
                    {data: 'estado_nivel',name: 'estado_nivel',},

                    {"mRender": function ( data, type, row ) {
                            return '<a onclick="Editar('+row.id_niveles+')" ><button type="button" class="btn btn-outline-info"><i class="fa fa-edit fa-lg  text-white" ></button></a>';}
                    },

                    {"mRender": function ( data, type, row ) {
                            return ' <div class="dropdown">\n' +
                                '                          <button type="button" class="btn btn-dark dropdown-toggle" id="dropdownMenuIconButton7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">\n' +
                                '                            <i class="fa fa-user"></i>\n' +
                                '                          </button>\n' +
                                '                          <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton7">\n' +
                                '                            <a class="dropdown-item" <a  onclick="acitvar('+row.id_niveles+')">Activar</a>\n' +
                                '                            <a class="dropdown-item" <a onclick="asss('+row.id_niveles+')">Desactivar</a>\n' +
                                '                          </div>\n' +
                                '                        </div>\n' +
                                ' ';}
                    }
                ]
            });



        });
        function activarr(id_niveles) {
            alert(id_niveles);

        }
                $('#regisPiso').click(function (e) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    e.preventDefault;
                    var frm=$('#frmRegis');
                    $.ajax({
                        url: '{{url('Piso')}}',
                        dataType: 'json',
                        type: 'post',
                        data: frm.serialize(),
                        success: function (response) {


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
                        ,
                        error: function () {
                            alert("error al registrar");
                        }
                    })
                })
        function Editar(id_niveles) {
            if (id_niveles){
                $('#modal-update').modal('show');
                $.ajax({
                    url:'{{url('cargarPiso')}}/'+id_niveles,
                    dataType:'json',
                    type:'get',
                    success:function (response) {
                        $.each(response,function (index,val) {
                            $('#numero_piso').val(val.numero_nivel);
                        } );


                    }
            } )

                $('#update').click(function (event) {

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    event.preventDefault;
                    var frm=$('#frmupdate');
                    $.ajax({
                        url:'{{url('update')}}/'+id_niveles,
                        dataType:'json',
                        type:'post',
                        data:frm.serialize(),
                        success:function (response) {
                            if(response.success===true){

                                $('#modal-update').modal('hide');
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
                    })

                })
            
        }
        }
        $('#modal-update').on('hidden.bs.modal', function (e) {
            // do something...
            table.api().ajax.reload();

        })



        </script>
    @endsection