@extends('layouts.header')
@section('contenido')
    <p>los colores indican el estado de las Habitaciones</p>
    <button type="button" style="margin-right: 30px" data-toggle="modal" data-target="#mRegisTipo" class="btn btn-success btn-fw"><i class="fas fa-check-double	 fa-lg  text-white" ></i> LIBRES</button>
    <button type="button"  style="margin-right: 30px" data-toggle="modal" data-target="#mRegisTipo" class="btn btn-danger btn-fw"><i class="fas fa-child	 fa-lg  text-white" ></i> OCUPADAS</button>
    <button type="button" style="margin-right: 30px" data-toggle="modal" data-target="#mRegisTipo" class="btn btn-warning btn-fw"><i class="fas fa-calendar-check	 fa-lg  text-white" ></i> RESERVADAS</button>
<br><br>

    <div class="card ">
        @foreach($nivel as $lib)
        <div class="card-header" style="background: #0a88e3">
         <i class="fas fa-bars fa-lg  text-white"></i> NIVEL: {{$lib->numero_nivel}}

        </div>
        @endforeach

        <div class="row">
            @foreach($libre as $lib)

                <div style="margin-left: 9px" class="popover-static-demo">
                    <div class="popover bs-popover-bottom bs-popover-bottom-demo popover-success">
                        <div class="arrow"></div>
                        <h3 class="popover-header">Libres</h3>
                        <div class="popover-body" style="background: #2a9055">
                            <div class="card-body " >
                                     <p class="clearfix">
                          <span class="float-left">
                      <strong><label style="color: white" >Tipo:</label></strong>
                          </span>
                          <span  style="margin-left: 5px" class="text-black">

                                  {{$lib->nomcre_Cate}}
                          </span>
                        </p>
                                <p class="clearfix">
                          <span class="float-left">
                      <strong><label style="color: white" >Precio:</label></strong>
                          </span>
                                    <span  style="margin-left: 5px" class="text-black">

                                  {{$lib->precio_habitacion}}
                          </span>
                                </p>
                                <p  class="">
                          <span class="float-left">
                      <strong><label style="color: white" >Habi:</label></strong>
                          </span>
                                    <span  style="margin-left: 5px" class="text-black">

                                N°{{$lib->numero_habitacion}}
                          </span>
                                </p>
                             <center><a href="#" class="btn btn-outline-danger">Detalle</a></center>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
                @foreach($ocupado as $ocupa)
                    <div class="popover-static-demo" style="margin-left: 9px">
                        <div class="popover bs-popover-bottom bs-popover-bottom-demo popover-danger">
                            <div class="arrow"></div>
                            <h3 class="popover-header">Ocupado</h3>
                            <div class="popover-body"  style="background: #ff808a">
                                <div class="card-body " >
                                    <p class="clearfix">
                          <span class="float-left">
                      <strong><label style="color: white" >Tipo:</label></strong>
                          </span>
                                        <span  style="margin-left: 5px" class="text-black">

                                  {{$ocupa->nomcre_Cate}}
                          </span>
                                    </p>
                                    <p class="clearfix">
                          <span class="float-left">
                      <strong><label style="color: white" >Precio:</label></strong>
                          </span>
                                        <span  style="margin-left: 5px" class="text-black">

                                  {{$ocupa->precio_habitacion}}
                          </span>
                                    </p>
                                    <p  class="">
                          <span class="float-left">
                      <strong><label style="color: white" >Habi:</label></strong>
                          </span>
                                        <span  style="margin-left: 5px" class="text-black">

                                N°{{$ocupa->numero_habitacion}}
                          </span>
                                    </p>
                                    <center><a href="#" class="btn btn-outline-danger">Contratar</a></center>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @foreach($reser as $reserva)
                    <div class="popover-static-demo" style="margin-left: 9px">
                        <div class="popover bs-popover-bottom bs-popover-bottom-demo popover-warning">
                            <div class="arrow"></div>
                            <h3 class="popover-header">Reservados</h3>
                            <div class="popover-body"  style="background: #ff9900">
                                <div class="card-body " >
                                    <p class="clearfix">
                          <span class="float-left">
                      <strong><label style="color: white" >Tipo:</label></strong>
                          </span>
                                        <span  style="margin-left: 5px" class="text-black">

                                  {{$reserva->nomcre_Cate}}
                          </span>
                                    </p>
                                    <p class="clearfix">
                          <span class="float-left">
                      <strong><label style="color: white" >Precio:</label></strong>
                          </span>
                                        <span  style="margin-left: 5px" class="text-black">

                                  {{$reserva->precio_habitacion}}
                          </span>
                                    </p>
                                    <p  class="">
                          <span class="float-left">
                      <strong><label style="color: white" >Habi:</label></strong>
                          </span>
                                        <span  style="margin-left: 5px" class="text-black">

                                N°{{$reserva->numero_habitacion}}
                          </span>
                                    </p>
                                    <center><a href="#" class="btn btn-outline-danger">Detalle</a></center>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
        </div>
    <div class="card ">
        @foreach($nivel2 as $lib)
            <div class="card-header" style="background: #0a88e3">
                <i class="fas fa-bars fa-lg  text-white"></i> NIVEL: {{$lib->numero_nivel}}

            </div>
        @endforeach
            <div class="row">
                @foreach($libre2 as $lib)

                    <div style="margin-left: 9px" class="popover-static-demo">
                        <div class="popover bs-popover-bottom bs-popover-bottom-demo popover-success">
                            <div class="arrow"></div>
                            <h3 class="popover-header">Libres</h3>
                            <div class="popover-body" style="background: #2a9055">
                                <div class="card-body " >
                                    <p class="clearfix">
                          <span class="float-left">
                      <strong><label style="color: white" >Tipo:</label></strong>
                          </span>
                                        <span  style="margin-left: 5px" class="text-black">

                                  {{$lib->nomcre_Cate}}
                          </span>
                                    </p>
                                    <p class="clearfix">
                          <span class="float-left">
                      <strong><label style="color: white" >Precio:</label></strong>
                          </span>
                                        <span  style="margin-left: 5px" class="text-black">

                                  {{$lib->precio_habitacion}}
                          </span>
                                    </p>
                                    <p  class="">
                          <span class="float-left">
                      <strong><label style="color: white" >Habi:</label></strong>
                          </span>
                                        <span  style="margin-left: 5px" class="text-black">

                                N°{{$lib->numero_habitacion}}
                          </span>
                                    </p>
                                    <center><a href="#" class="btn btn-outline-danger">Detalle</a></center>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                    @foreach($ocupado2 as $lib)

                        <div style="margin-left: 9px" class="popover-static-demo">
                            <div class="popover bs-popover-bottom bs-popover-bottom-demo popover-danger">
                                <div class="arrow"></div>
                                <h3 class="popover-header">Ocupados</h3>
                                <div class="popover-body" style="background: #ff808a">
                                    <div class="card-body " >
                                        <p class="clearfix">
                          <span class="float-left">
                      <strong><label style="color: white" >Tipo:</label></strong>
                          </span>
                                            <span  style="margin-left: 5px" class="text-black">

                                  {{$lib->nomcre_Cate}}
                          </span>
                                        </p>
                                        <p class="clearfix">
                          <span class="float-left">
                      <strong><label style="color: white" >Precio:</label></strong>
                          </span>
                                            <span  style="margin-left: 5px" class="text-black">

                                  {{$lib->precio_habitacion}}
                          </span>
                                        </p>
                                        <p  class="">
                          <span class="float-left">
                      <strong><label style="color: white" >Habi:</label></strong>
                          </span>
                                            <span  style="margin-left: 5px" class="text-black">

                                N°{{$lib->numero_habitacion}}
                          </span>
                                        </p>
                                        <center><a href="#" class="btn btn-outline-danger">Detalle</a></center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @foreach($Reserva as $lib)

                        <div style="margin-left: 9px" class="popover-static-demo">
                            <div class="popover bs-popover-bottom bs-popover-bottom-demo popover-warning">
                                <div class="arrow"></div>
                                <h3 class="popover-header">Reservados</h3>
                                <div class="popover-body" style="background: #ff9900">
                                    <div class="card-body " >
                                        <p class="clearfix">
                          <span class="float-left">
                      <strong><label style="color: white" >Tipo:</label></strong>
                          </span>
                                            <span  style="margin-left: 5px" class="text-black">

                                  {{$lib->nomcre_Cate}}
                          </span>
                                        </p>
                                        <p class="clearfix">
                          <span class="float-left">
                      <strong><label style="color: white" >Precio:</label></strong>
                          </span>
                                            <span  style="margin-left: 5px" class="text-black">

                                  {{$lib->precio_habitacion}}
                          </span>
                                        </p>
                                        <p  class="">
                          <span class="float-left">
                      <strong><label style="color: white" >Habi:</label></strong>
                          </span>
                                            <span  style="margin-left: 5px" class="text-black">

                                N°{{$lib->numero_habitacion}}
                          </span>
                                        </p>
                                        <center><a href="#" class="btn btn-outline-danger">Detalle</a></center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
    </div>

    </div>
    </div>
@endsection