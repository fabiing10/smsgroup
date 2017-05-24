<!-- MODAL STICK UP  -->
<div class="modal fade stick-up" id="nuevoConjunto" tabindex="-1" role="dialog" aria-labelledby="nuevoConjunto" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header clearfix ">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                </button>
                <h4 class="p-b-5"><span class="semi-bold">Nuevo</span> Parque o Zona</h4>
            </div>
            <div class="modal-body">
                <p class="small-text">Es facil! Solo debes completar el siguiente formulario</p>

                {{ Form::open(array('url' => 'admin/conjuntos/crear', 'class' => 'nuevo-conjunto', 'role' => 'form')) }}

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group form-group-default">
                            <label>Nit</label>
                            <input id="nit" name="nit" type="text" class="form-control" placeholder="Digite el nit del conjunto">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group form-group-default">
                            <label>Tipo de P.H</label>
                            <select class="full-width" data-init-plugin="select2" id="tipo" name="tipo">
                                <optgroup label="Tipo Conjunto">
                                    <option value="Locales">Bodegas</option>
                                    <option value="Locales">Locales</option>
                                    <option value="Oficinas">Oficinas</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group form-group-default">
                            <label>Nombre</label>
                            <input id="nombre" name="nombre" type="text" class="form-control" placeholder="Nombre de su conjunto">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group form-group-default">
                            <label>Pais</label>
                            <input id="pais" name="pais" type="text" class="form-control" placeholder="Colombia">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group form-group-default">
                            <label>Ciudad</label>
                            <input id="ciudad" name="ciudad" type="text" class="form-control" placeholder="Bogota">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group form-group-default">
                            <label>Localidad</label>
                            <input id="localidad" name="localidad" type="text" class="form-control" placeholder="Digite su localidad">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group form-group-default">
                            <label>Barrio</label>
                            <input id="barrio" name="barrio" type="text" class="form-control" placeholder="Digite el barrio">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group form-group-default">
                            <label>Direccion</label>
                            <input id="direccion" name="direccion" type="text" class="form-control" placeholder="Direccion del conjunto">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group form-group-default">
                            <label>Telefono</label>
                            <input id="telefono" name="telefono" type="text" class="form-control" placeholder="Digite su Telefono">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group form-group-default">
                            <label>Estrato</label>
                            <input id="estrato" name="estrato" type="text" class="form-control" placeholder="Digite el estrato de su conjunto">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group form-group-default">
                            <label>Telefono Cuadrante</label>
                            <input id="telefono_cuadrante" name="telefono_cuadrante" type="text" class="form-control" placeholder="Telefono del cuadrante mas cercano">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary  btn-cons">Crear</button>
                    <button type="button" class="btn btn-cons" onclick="clodeWindows('nuevoConjunto')">Cerrar</button>
                </div>

                {{ Form::close() }}


            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
