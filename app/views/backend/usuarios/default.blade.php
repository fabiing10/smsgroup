@extends('backend.layout.default')



@section('content')
<div class="register-container full-height sm-p-t-30">
    <div class="container-sm-height full-height">
        <div class="row row-sm-height">
            <div class="col-sm-12 col-sm-height col-middle">
                <i class="fa fa-user" style="font-size: 85px;margin-right: 15px;width: 25px;margin: 0 auto;display: -webkit-box;"></i>
                <h3>Hola {{ $usuario->nombres }}! Solo falta un paso..</h3>
                <p>
                    <small>
                        Completa el siguiente formulario con tus datos para poder tener una comunicacion mas optima, si tienes dudas puedes consultar nuestras politicas y privacidad haciendo click  <a href="#" class="text-info">Aqui</a>
                    </small>
                </p>

                <div class="modal-body" style="padding: 0px;">
                    <p class="small-text">Es facil! Solo debes completar el siguiente formulario</p>
                    {{ Form::open(array('url' => 'usuario/actualizar', 'class' => '', 'role' => 'form')) }}
                    <input type="hidden" id="user_active" name="user_active" value="{{Crypt::encrypt($usuario->id)}}">
                    <input type="hidden" id="page" name="page" value="default">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Identificacion</label>
                                <input id="u_identificacion" name="u_identificacion" type="text" class="form-control" placeholder="Numero de Identificacion" value="{{$usuario->identificacion}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group form-group-default">
                                <label>Nombres</label>
                                <input id="u_nombres" name="u_nombres" type="text" class="form-control" placeholder="Nombres" value="{{$usuario->nombres}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group form-group-default">
                                <label>Apellidos</label>
                                <input id="u_apellidos" name="u_apellidos" type="text" class="form-control" placeholder="Apellidos" value="{{$usuario->apellidos}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group form-group-default" style="padding: 12px 12px;">
                                <label>Fecha de nacimiento</label>
                                <input id="u_fecha_nacimiento" name="u_fecha_nacimiento" type="text" class="form-control" placeholder="Digite su fecha de Nacimiento" value="{{$usuario->fecha_nacimiento}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group form-group-default">
                                <label>Genero</label>
                                <select class="full-width" data-init-plugin="select2" id="genero" name="genero">
                                    <optgroup label="Genero">
                                        <option value="Masculino">Masculino</option>
                                        <option value="Femenino">Femenino</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Email</label>
                                <input id="u_email" name="u_email" type="text" class="form-control" placeholder="example@email.com" value="{{$usuario->email}}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group form-group-default">
                                <label>Telefono</label>
                                <input id="u_telefono" name="u_telefono" type="text" class="form-control" placeholder="Telefono" value="{{$usuario->telefono}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group form-group-default">
                                <label>Celular</label>
                                <input id="u_celular" name="u_celular" type="text" class="form-control" placeholder="Celular" value="{{$usuario->celular}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Username</label>
                                <input id="u_username" name="u_username" type="text" class="form-control" placeholder="Usuario" value="{{$usuario->username}}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group form-group-default">
                                <label>Password</label>
                                <input id="u_password" name="u_password" type="password" class="form-control" placeholder="Clave">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group form-group-default">
                                <label>Re Password</label>
                                <input id="re-password" name="re-password" type="password" class="form-control" placeholder="Digite nuevamente su clave">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary  btn-cons">Actualizar Perfil</button>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@stop


@section('specific_js')
<script src="{{ asset('build/assets/js/portlets.js') }}" type="text/javascript"></script>
@stop
