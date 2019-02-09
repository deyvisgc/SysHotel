@extends('layouts.header')

@section('contenido')
    <button type="button" class="btn btn-primary" data-toggle="popover" title="Informacion" data-content="Porfavor rellene todos los campos y valide los datos que sean reales al terminar el contrato ">Informacion del Contrato</button>
    <button type="button" class="btn btn-success" data-toggle="popover" title="Informacion" data-content="Porfavor rellene todos los campos y valide los datos que sean reales al terminar el contrato ">Descargar Solicitud de contrato</button><br><br>

    <div class="col-12 grid-margin">

        <div class="card">
            <div class="card-body">
                <center><h4 class="card-title text-primary" style="font-family: 'Arial';text-decoration-color: #5a6268">REGISTRAR CONTRATO</h4></center>
              <div class="row">
                  <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                      <div class="form-group">
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fa fa-search text-success"></i></span>
                              </div>
                              <input type="text" class="form-control" placeholder="Descripcion..." style="font-family: Arial ; font-size:13px; text-align:center; color: blue; font-weight: bold;">
                          </div>
                      </div>
                  </div>

                  <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                      <div class="form-group">
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fas fa-address-card fa-lg text-success "></i></span>
                              </div>
                              <input type="text" class="form-control" placeholder="DNI..." style="font-family: Arial ; font-size:13px; text-align:center; color: blue; font-weight: bold;">
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                      <div class="form-group">
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <span class="input-group-text"><i class=" fas fa-dollar-sign text-success fa-lg"></i></span>
                              </div>
                              <input type="number" id="con_Precio" placeholder="Precio" class="form-control" style="font-family: Arial ; font-size:13px; text-align:center; color: blue; font-weight: bold;">
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                      <div class="form-group">
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fas fa-user-friends text-success fa-lg"></i></span>
                              </div>
                              <input type="number" id="n_personas" placeholder="numero de personas" class="form-control" style="font-family: Arial ; font-size:13px; text-align:center; color: blue; font-weight: bold;">
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                      <div class="form-group">
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <span class="input-group-text text-success">Efectivo</span>
                              </div>
                              <input type="number" id="con_efectivo" value="0.00" class="form-control" style="font-family: Arial ; font-size:13px; text-align:center; color: blue; font-weight: bold;">
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                      <div class="form-group">
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <span class="input-group-text text-success">Credito</span>
                              </div>
                              <input type="number" id="con_Credito" value="0.00" class="form-control" style="font-family: Arial ; font-size:13px; text-align:center; color: blue; font-weight: bold;">
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                      <div class="form-group">
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <span class="input-group-text text-danger">Deuda</span>
                              </div>
                              <input type="number" id="con_precio" readonly value="0.00" class="form-control" style="font-family: Arial ; font-size:13px; text-align:center; color: blue; font-weight: bold;">
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                      <div class="form-group">
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <span class="input-group-text text-success">Garantia</span>
                              </div>
                              <input type="" id="" value="0.00" class="form-control" style="font-family: Arial ; font-size:13px; text-align:center; color: blue; font-weight: bold;">
                          </div>
                      </div>
                  </div>

                  <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                      <div class="form-group">
                          <select id="mySelect" data-show-content="true" class="form-control">
                              <option>Select..</option>
                              <option data-content="<i class='fa fa-cutlery'></i> Cutlery"></option>
                              <option data-content="<i class='fa fa-eye'></i> Eye"></option>
                              <option data-content="<i class='fa fa-heart-o'></i> Heart"></option>
                              <option data-content="<i class='fa fa-leaf'></i> Leaf"></option>
                              <option data-content="<i class='fa fa-music'></i> Music"></option>
                              <option data-content="<i class='fa fa-star'></i> Star"></option>
                              <option data-content="<span class='badge badge-warning mt-1 ml-2 float-right'>3</span> More"></option>
                          </select>
                      </div>
                  </div>
                  <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                      <div class="form-group">
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fas fa-calendar-alt text-success fa-lg"></i></span>
                              </div>
                              <input type="date" id="fecha_inicio"  class="form-control" style="font-family: Arial ; font-size:13px; text-align:center; color: blue; font-weight: bold;">
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                      <div class="form-group">
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fas fa-calendar-alt text-success fa-lg"></i></span>
                              </div>
                              <input type="date" id="fecha_fin" class="form-control" style="font-family: Arial ; font-size:13px; text-align:center; color: blue; font-weight: bold;">
                          </div>
                      </div>
                  </div>
              </div>

        </div>
    </div>
    </div>

@endsection



@section('script')
   <script>
       var fecha_Actual= get_fhoy();
       $('#fecha_inicio').val(fecha_Actual);
       $('#fecha_fin').val(fecha_Actual);

       $('#mySelect').selectpicker();
    </script>


    @endsection
