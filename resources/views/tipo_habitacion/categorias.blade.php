@extends('layouts.header')
@section('contenido')
    <p style="font-family: 'Arial';text-decoration-color: #5a6268">REGISTRO / LISTA DE TIPO DE HABITACIONES</p>
    <button type="button" data-toggle="modal" data-target="#mRegisTipo" class="btn btn-success btn-fw"><i class="fas fa-building	 fa-lg  text-white" ></i> Nuevo Tipo</button>
    <br><br><div class="card">

        <div class="card-body">
            <p>TIPO DE HABITACIONES</p><hr style="width:100%;">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="tb_tipo_habi" class="table table-striped">
                            <thead>
                            <tr>
                                 <th>TIPO</th>
                                <th>ESTADO</th>
                                <th>ACTUALIZAR</th>
                                <th>ELIMINAR</th>
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


    <div class="modal fade" id="mRegisTipo" tabindex="-1" role="dialog" aria-labelledby="modal-register-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">

                    <h3 class="modal-title" id="modal-register-label">Registrar Pisos</h3>
                </div>


                <div class="modal-body">

                    <form role="form"  id="frmRegis_tipo" action="" method="post" class="registration-form">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tipo Habitacion</label>
                                    <input type="text" class="form-control" id="tipo_ha" required name="tipo_habitacion"  >
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
                            <button type="button"  class="btn btn-success" id="RegisTipo">Registrar</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="mUpdate" tabindex="-1" role="dialog" aria-labelledby="modal-register-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">

                    <h3 class="modal-title" id="modal-register-label">Actualizar Tipos de Habitacion</h3>
                </div>


                <div class="modal-body">

                    <form role="form"  id="frmUpdate_tipo" action="" method="post" class="registration-form">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tipo Habitacion</label>
                                    <input type="text" class="form-control" id="habitacion" required name="tipo_habitacion"  >
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Estado</label>
                                    <input type="text" class="form-control" id="estado_tipo" required="Campo Obligatorio"
                                           name="estado" readonly>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                            <button type="button"  class="btn btn-success" id="Update">Registrar</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        var tabla;
        $(document).ready(function () {
            tabla=$('#tb_tipo_habi').dataTable({
                stateSave: true,
                responsive: true,
                processing: false,
                serverSide : true,
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'pdfHtml5',
                        title: " Lista de los Productos Faltantes",
                        text: 'Descargar en PDF',
                        className: 'btn btn-outline-warning btn-icon-text ',
                        messageTop: 'Pedidos de Productos',
                        exportOptions: {
                            columns: [ 0, 1,2, 3, 4, 5,6,7 ]
                        },
                        customize:function(doc) {
                            doc.styles.title = {
                                fontSize: '20',
                                alignment: 'center'
                            },
                                doc.styles.tableHeader = {
                                    bold:!0,
                                    fontSize:11,
                                    color:'black',
                                    fillColor:'#F0F8FF',
                                    alignment: "left"
                                }
                        }
                    },
                    {
                        extend: 'print',
                        title: " Lista de los Productos Faltantes",
                        text: 'Imprimir Reporte',
                        className: 'btn btn-outline-success btn-fw',
                        messageTop: 'Pedidos de Productos',
                        exportOptions: {
                            columns: [ 0, 1 ]
                        },
                    }
                ],
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
                ajax: '{{url('tipo_Cliente')}}',
                columns: [
                    {data: 'nomcre_Cate',name:'nomcre_Cate'},
                    {data: 'estado_Catel',name:'estado_Catel'},
                    {"mRender": function ( data, type, row ) {
                            return '<a onclick="actualisarHabi('+row.idcategorias+')" ><button type="button" class="btn btn-info"><i class="fas fa-pencil-alt fa-lg  text-white" ></button></a>';}
                    },
                    {"mRender": function ( data, type, row ) {
                            return '<a onclick="Eliminar('+row.idcategorias+')" ><button type="button" class="btn btn-danger"><i class="fas fa-trash-alt fa-lg  text-white" ></button></a>';}
                    },
                ]
            });

        })




        $('#RegisTipo').click(function (e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            e.preventDefault;
            var frm=$('#frmRegis_tipo');
            $.ajax({
                url: '{{url('tipo_Cliente')}}',
                dataType: 'json',
                type: 'post',
                data: frm.serialize(),
                success: function (response) {
                   if(response.success===true){

                       $('#mRegisTipo').modal('hide');
                       frm.trigger('reset');

                       swal({
                           position: 'center',
                           type: 'success',
                           title: 'Registro Exitoso',
                           showConfirmButton: false,
                           timer: 1500
                       });
                       tabla.api().ajax.reload();
                   }
                }
                ,
                error: function () {
                    alert("error al registrar");
                }
            })

        });
        function actualisarHabi(idcategorias) {
            if (idcategorias) {
                $('#mUpdate').modal('show');
                $.ajax({
                    url: '{{url('cargar')}}/' + idcategorias,
                    dataType: 'json',
                    type: 'get',
                    success: function (response) {
                     $('#habitacion').val(response.nomcre_Cate);
                     $('#estado_tipo').val(response.estado_Catel);


                    }



                });
                
                $('#Update').click(function (e) {
                    if (idcategorias){
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        e.preventDefault;
                        var frm=$('#frmUpdate_tipo');
                        $.ajax({
                            url: '{{url('actualizar')}}/'+idcategorias,
                            dataType: 'json',
                            type: 'post',
                            data: frm.serialize(),
                            success: function (response) {
                                if(response.success===true){

                                    $('#mUpdate').modal('hide');
                                    frm.trigger('reset');

                                    swal({
                                        position: 'center',
                                        type: 'success',
                                        title: 'Registro Exitoso',
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                    tabla.api().ajax.reload();
                                }
                            }
                            ,
                            error: function () {
                                alert("error al editar");
                            }
                        });
                    }

                });
            }
        }
    </script>
    @endsection
