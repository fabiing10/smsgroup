<!-- MODAL STICK UP  -->
<div class="modal fade stick-up" id="actualizarConjunto" tabindex="-1" role="dialog" aria-labelledby="actualizarConjunto" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header clearfix ">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                </button>
                <h4 class="p-b-5"><span class="semi-bold">Nuevo</span> Conjunto Residencial</h4>
            </div>
            <div class="modal-body">
                <p class="small-text">Es facil! Solo debes completar el siguiente formulario</p>

                {{ Form::open(array('url' => 'admin/conjuntos/actualizar', 'class' => '', 'role' => 'form')) }}
                <input type="hidden" name="actualizar-c" id="actualizar-c" value="" />
                <input type="hidden" name="method" id="method" value="actualizar" />

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group form-group-default">
                            <label>Nit</label>
                            <input id="u_nit" name="u_nit" type="text" class="form-control" placeholder="Digite el nit del conjunto">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group form-group-default">
                            <label>Tipo</label>
                            <input id="u_tipo" name="u_tipo" type="text" class="form-control" placeholder="Tipo del conjunto">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group form-group-default">
                            <label>Nombre</label>
                            <input id="u_nombre" name="u_nombre" type="text" class="form-control" placeholder="Nombre de su conjunto">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group form-group-default">
                            <label>Pais</label>
                            <input id="u_pais" name="u_pais" type="text" class="form-control" placeholder="Colombia">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group form-group-default">
                            <label>Ciudad</label>
                            <input id="u_ciudad" name="u_ciudad" type="text" class="form-control" placeholder="Bogota">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group form-group-default">
                            <label>Localidad</label>
                            <input id="u_localidad" name="u_localidad" type="text" class="form-control" placeholder="Digite su localidad">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group form-group-default">
                            <label>Barrio</label>
                            <input id="u_barrio" name="u_barrio" type="text" class="form-control" placeholder="Digite el barrio">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group form-group-default">
                            <label>Direccion</label>
                            <input id="u_direccion" name="u_direccion" type="text" class="form-control" placeholder="Direccion del conjunto">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group form-group-default">
                            <label>Telefono</label>
                            <input id="u_telefono" name="u_telefono" type="text" class="form-control" placeholder="Digite su Telefono">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group form-group-default">
                            <label>Estrato</label>
                            <input id="u_estrato" name="u_estrato" type="text" class="form-control" placeholder="Digite el estrato de su conjunto">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group form-group-default">
                            <label>Telefono Cuadrante</label>
                            <input id="u_telefono_cuadrante" name="u_telefono_cuadrante" type="text" class="form-control" placeholder="Telefono del cuadrante mas cercano">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group form-group-default">
                            <label>Latitud</label>
                            <input id="u_latitud" name="u_latitud" type="text" class="form-control" placeholder="Digite la Latitud del mapa">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group form-group-default">
                            <label>Longitud</label>
                            <input id="u_longitud" name="u_longitud" type="text" class="form-control" placeholder="Digite la longitud del mapa">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary  btn-cons">Actualizar</button>
                    <button type="button" class="btn btn-cons">Close</button>
                </div>

                {{ Form::close() }}


            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
