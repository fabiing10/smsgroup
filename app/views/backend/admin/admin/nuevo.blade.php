<!-- MODAL STICK UP  -->
<div class="modal fade stick-up" id="modal-nuevo-administrador" tabindex="-1" role="dialog" aria-labelledby="nuevoAdministrador" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header clearfix ">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                </button>
                <h4 class="p-b-5"><span class="semi-bold">Nuevo</span> Administrador</h4>
            </div>
            <div class="modal-body">
                <p class="small-text">Es facil! Solo debes completar el siguiente formulario</p>

                {{ Form::open(array('url' => 'admin/administradores/crear', 'class' => 'nuevo-administrador', 'role' => 'form')) }}

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
                            <div class="form-group form-group-default">
                                <label>Fecha de nacimiento</label>
                                <input id="fecha_nacimiento" name="fecha_nacimiento" type="text" class="form-control" data-date-format='yyyy-mm-dd'>
                            </div>


                        </div>
                        <div class="col-sm-6">
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
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Conjuntos Residenciales</label>
                                <select class="full-width" data-init-plugin="select2" name="conjunto_select">
                                    <optgroup label="Conjuntos Residenciales">
                                        <?php
                                            $conjuntos = $conjunto->listarConjuntosSinAdministrador();
                                        ?>
                                        @foreach($conjuntos as $conjunto)
                                                <option value="{{ Crypt::encrypt($conjunto->id) }}">{{ $conjunto->nombre }}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
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
                    <button type="submit" class="btn btn-primary  btn-cons">Crear</button>
                    <button type="button" class="btn btn-cons" onclick="clodeWindows('modal-nuevo-administrador')">Cerrar</button>
                </div>

                {{ Form::close() }}


            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
