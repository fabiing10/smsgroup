<!-- MODAL STICK UP  -->
<div class="modal fade stick-up" id="modal-actualizar-usuario" tabindex="-1" role="dialog" aria-labelledby="nuevoUsuario" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header clearfix ">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                </button>
                <h4 class="p-b-5"><span class="semi-bold">Actualizar</span> Usuario</h4>
            </div>
            <div class="modal-body">
                <p class="small-text">Deseac actualizar la informacion de un usuario? Completa el siguiente formulario!</p>
                {{ Form::open(array('url' => 'admin-conjuntos/conjunto/usuarios/actualizar', 'class' => '', 'role' => 'form')) }}
                <input type="hidden" name="user_active" id="user_active" value="" />
                <input type="hidden" name="page" id="page" value="admin_u" />
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group form-group-default">
                            <label>Identificacion</label>
                            <input id="u_identificacion" name="u_identificacion" type="text" class="form-control" placeholder="Numero de Identificacion">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group form-group-default">
                            <label>Nombres</label>
                            <input id="u_nombres" name="u_nombres" type="text" class="form-control" placeholder="Nombres">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group form-group-default">
                            <label>Apellidos</label>
                            <input id="u_apellidos" name="u_apellidos" type="text" class="form-control" placeholder="Apellidos">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group form-group-default">
                            <label>Fecha de nacimiento</label>
                            <input id="u_fecha_nacimiento" name="u_fecha_nacimiento" type="text" class="form-control" data-date-format='yyyy-mm-dd'>


                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group form-group-default">
                            <label>Email</label>
                            <input id="u_email" name="u_email" type="text" class="form-control" placeholder="example@email.com">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group form-group-default">
                            <label>Telefono</label>
                            <input id="u_telefono" name="u_telefono" type="text" class="form-control" placeholder="Telefono">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group form-group-default">
                            <label>Celular</label>
                            <input id="u_celular" name="u_celular" type="text" class="form-control" placeholder="Celular">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group form-group-default">
                            <label>Username</label>
                            <input id="u_username" name="u_username" type="text" class="form-control" placeholder="Usuario">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group form-group-default">
                            <label>Password</label>
                            <input id="u_password" name="u_password" type="password" class="form-control" placeholder="Clave">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary  btn-cons">Actualizar Perfil</button>
                    <button type="button" class="btn btn-cons" onclick="clodeWindows('modal-actualizar-usuario')">Cerrar</button>
                </div>
                {{ Form::close() }}
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
