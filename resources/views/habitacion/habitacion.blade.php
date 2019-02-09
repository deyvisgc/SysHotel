@extends('layouts.header')
@section('contenido')
    <p style="font-family: 'Arial';text-decoration-color: #5a6268">REGISTRO / LISTA DE HABITACIONES</p>
    <button type="button" data-toggle="modal" data-target="#modal-habitacion" class="btn btn-success btn-fw"><i class="fa fa-bed fa-lg  text-white" ></i> Nueva Habitacion</button>
    <br><br>

        <div class="card-body">
            <p>HABITACIONES</p><hr style="width:100%;">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="tbhabitacion" class="table table-striped">
                            <thead>
                            <tr>
                                <th>HABITACION</th>
                                <th>CAMAS</th>
                                <th>SILLAS</th>
                                <th>PRECIO</th>
                                 <th>TIPO</th>
                                <th>NIVELES</th>
                                <th>DESCRIPCION</th>
                                <th>EDITAR</th>
                                <th>Eliminar</th>
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



    <div class="modal fade" id="modal-habitacion" tabindex="-1" role="dialog" aria-labelledby="modal-register-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">

                    <h3 class="modal-title" id="modal-register-label">Registrar nueva Habitacion</h3>
                </div>


                <div class="modal-body">

                    <form role="form" id="RegisHabi" action="" method="post" class="registration-form">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Habitacion</label>
                                    <input type="text" class="form-control" id="n_habitacion" required="Campo Obligatorio" name="habitacion" placeholder="N# Habitacion" >
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Camas</label>
                                    <input type="number" class="form-control" id="n_camas" required="Campo Obligatorio"
                                           name="camas"   placeholder="N# Camas">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Sillas</label>
                                    <input type="number" class="form-control" id="n_sillas" required="Campo Obligatorio"
                                           name="sillas"  placeholder="N# Sillas" >
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Codigo</label>
                                    <input type = "text"  class="form-control telef" id="codigo" required="Campo Obligatorio"  name="codigo"  placeholder="Codigo">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">tipo Habitacion</label>
                                    <select name="ti_habitacion" class="form-control" >
                                        @foreach($niveles as $nivel)
                                            <option  value="{{$nivel->id_niveles}}">{{$nivel->numero_nivel}}</option>
                                            @endforeach


                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nivel</label>
                                    <select name="nivel" class="form-control" >
                                        @foreach($cate as $cat)
                                            <option  value="{{$cat->idcategorias}}">{{$cat->nomcre_Cate}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Estado</label>
                                    <input type = "text" readonly  value="Libre" class="form-control" id="estado"  required="Campo Obligatorio"  name="estado">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Precio</label>
                                    <input type = "number"    class="form-control" id="precio"  required="Campo Obligatorio"  name="precio">
                                </div>
                            </div>
                        </div>
                        <center>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Descripcion</label>
                                <textarea class="form-control" rows="5" id="n_descripcion"  required="Campo Obligatorio"  name="descripcion"  placeholder="example:la habiracion esta..."></textarea>
                            </div>
                        </div>
                        </center>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                            <button type="button"  class="btn btn-success" id="regisHabi">Registrar</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    @endsection

@section('script')
    <script>
        var tabla;
        $(document).ready(function () {
            tabla=$('#tbhabitacion').dataTable({
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
                            columns: [ 0, 1,2, 3, 4, 5,6,7,8 ]
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
                ajax: '{{url('habitacion')}}',
                columns: [
                    {data: 'numero_habitacion', name: 'numero_habitacion'},
                    {data: 'numero_camas', name: 'numero_camas'},
                    {data: 'numero_sillas',name: 'numero_sillas',},
                    {data: 'precio_habitacion',name: 'precio_habitacion',},
                    {data: 'nomcre_Cate',name:'nomcre_Cate'},
                    {data: 'numero_nivel',name:'numero_nivel'},
                    {data: 'descripcion',name:'descripcion'},
                    {"mRender": function ( data, type, row ) {
                            return '<a onclick="actualisarHabi('+row.idhabitacion+')" ><button type="button" class="btn btn-info"><i class="fas fa-pencil-alt fa-lg  text-white" ></button></a>';}
                    },
                    {"mRender": function ( data, type, row ) {
                            return '<a onclick="Eliminar('+row.idhabitacion+')" ><button type="button" class="btn btn-danger"><i class="fas fa-trash-alt fa-lg  text-white" ></button></a>';}
                    },
                ]
            });

        })

     var frm=$('#RegisHabi');
    $('#regisHabi').click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        $.ajax({
            url:'{{url('habitacion')}}',
            type:'post',
            data:frm.serialize(),
            dataType:'json',
            success:function (response) {
                if(response.success==true){
                    $('#modal-habitacion').modal('hide');
                    frm.trigger('reset');

                    swal({
                        position: 'center',
                        type: 'success',
                        title: 'Registro Exitoso',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    tabla.api().ajax.reload();
                }else{
                    return false;
                }
            },
            error:function () {
                alert('error al registrar habitacion');

            }
        });

    });
    </script>
    @endsection