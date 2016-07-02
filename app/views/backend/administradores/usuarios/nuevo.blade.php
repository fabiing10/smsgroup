<!-- MODAL STICK UP  -->
<div class="modal fade stick-up" id="modal-nuevo-usuario" tabindex="-1" role="dialog" aria-labelledby="nuevoUsuario" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header clearfix ">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                </button>
                <h4 class="p-b-5"><span class="semi-bold">Nuevo</span> Usuario</h4>
            </div>
            <div class="modal-body">
                <p class="small-text">Es facil! Solo debes completar el siguiente formulario</p>
                {{ Form::open(array('url' => 'admin-conjuntos/conjunto/usuarios/crear', 'class' => '', 'role' => 'form')) }}
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group form-group-default">
                            <label>Identificacion</label>
                            <input id="identificacion" name="identificacion" type="text" class="form-control" placeholder="Numero de Identificacion">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group form-group-default">
                            <label>Nombres</label>
                            <input id="nombres" name="nombres" type="text" class="form-control" placeholder="Nombres">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group form-group-default">
                            <label>Apellidos</label>
                            <input id="apellidos" name="apellidos" type="text" class="form-control" placeholder="Apellidos">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group form-group-default" style="padding: 12px 12px;">
                            <label>Fecha de nacimiento</label>
                            <input id="fecha_nacimiento" name="fecha_nacimiento" type="text" class="form-control" placeholder="Digite su fecha de Nacimiento">
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
                            <input id="email" name="email" type="text" class="form-control" placeholder="example@email.com">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group form-group-default">
                            <label>Telefono</label>
                            <input id="telefono" name="telefono" type="text" class="form-control" placeholder="Telefono">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group form-group-default">
                            <label>Celular</label>
                            <input id="celular" name="celular" type="text" class="form-control" placeholder="Celular">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group form-group-default">
                            <label>Zona / Rol</label>
                            <select class="full-width" data-init-plugin="select2" id="zona_select" name="zona_select">
                                    <optgroup label="Unidad">
                                     <option>Seleccione una Unidad / Rol</option>
                                    @foreach($zonas as $zona)

                                        @if($zona->tipo == "Contador" || $zona->tipo == "Revisor_Fiscal")
                                          <option value="{{ Crypt::encrypt($zona->id) }}">{{ $zona->value }}</option>
                                        @else
                                          <option value="{{ Crypt::encrypt($zona->id) }}">{{ $zona->tipo }} - {{ $zona->value }}</option>
                                        @endif

                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group form-group-default">
                            <label>Apartamento / Funcion</label>
                            <select class="full-width" data-init-plugin="select2" id="apartamento_select" name="apartamento_select">
                                <optgroup label="Seleccione un apartamento" id="inner-html">

                                </optgroup>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12" style="border: 1px solid rgb(232, 231, 231);padding: 3px 15px;margin: 9px 0px;">
                        <div class="radio radio-success">
                            <input type="radio" checked="checked" value="true" name="propietario" id="yes">
                            <label for="yes">Propietario</label>
                            <input type="radio"  value="false" name="propietario" id="no">
                            <label for="no">Arrendatario</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group form-group-default">
                            <label>Username</label>
                            <input id="username" name="username" type="text" class="form-control" placeholder="Usuario">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group form-group-default">
                            <label>Password</label>
                            <input id="password" name="password" type="password" class="form-control" placeholder="Clave">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary  btn-cons">Crear Usuario</button>
                    <button type="button" class="btn btn-cons">Cerrar</button>
                </div>
                {{ Form::close() }}
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
