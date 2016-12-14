<!-- MODAL STICK UP  -->
<div class="modal fade stick-up" id="modal-nueva-zona" tabindex="-1" role="dialog" aria-labelledby="nuevoUsuario" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header clearfix ">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                </button>
                <h4 class="p-b-5"><span class="semi-bold">Nueva</span> Unidad</h4>
            </div>
            <div class="modal-body">
                <p class="small-text">Es facil! Solo debes completar el siguiente formulario</p>

                {{ Form::open(array('url' => 'admin-conjuntos/conjunto/zonas/crear', 'class' => '', 'role' => 'form')) }}

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group form-group-default">
                            <label>Tipo Unidad</label>
                            <select class="full-width" data-init-plugin="select2" id="tipo_zona" name="tipo_zona">
                                <optgroup label="Zonas">
                                    <option value="Torre">Torre</option>
                                    <option value="Casa">Casa</option>
                                    <option value="Local">Local</option>
                                    <option value="Oficina">Oficina</option>

                                </optgroup>

                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group form-group-default">
                            <label>Unidad</label>
                            <input id="value" name="value" type="text" class="form-control" placeholder="# Unidad">
                        </div>
                    </div>
                </div>


                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary  btn-cons">Agregar Unidad</button>
                    <button type="button" class="btn btn-cons" onclick="clodeWindows('modal-nueva-zona')">Cerrar</button>
                </div>

                {{ Form::close() }}


            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
