@extends('layouts.header')

@section('contenido')
    <h1>Gestionar Contratos</h1>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Contratos</h4>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="tbcontrato" class="tbcontrato">
                            <thead>
                            <tr>
                                <th>Habitacion</th>
                                <th>Cliente</th>
                                <th>Fecha entrada</th>
                                <th>Fecha Final</th>
                                <th>garantia</th>
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
    @endsection

@section('script')
    <script>
        var table;
        $(document).ready(function () {
            $('#tbcontrato').dataTable({


            });

        })
    </script>

    @endsection
