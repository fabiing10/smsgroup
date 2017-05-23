<!-- MODAL STICK UP  -->

<div class="modal fade stick-up" id="modal-nuevo-mensaje" tabindex="-1" role="dialog" aria-labelledby="nuevoMensaje" aria-hidden="true">
    <div class="modal-dialog" style="width: 100%">
        <div class="modal-content">
            <div class="modal-header clearfix ">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                </button>
                <h4 class="p-b-5"><span class="semi-bold">Nuevo</span> Mensaje</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid container-fixed-lg m-t-20">
                    {{ Form::open(array('url' => 'admin-conjuntos/conjunto/mensajes/crear', 'class' => '', 'role' => 'form','enctype'=>'multipart/form-data')) }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>Asunto</label>
                                <input id="asunto" name="asunto" type="text" class="form-control" placeholder="Asunto del mensaje">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group form-group-default">
                                <label>Clase Mensaje</label>
                                <select class="full-width" data-init-plugin="select2" id="importancia" name="importancia">
                                    <optgroup label="Clase Mensaje">
                                        <option value="normal">Normal</option>
                                        <option value="relevante">Relevante</option>
                                        <option value="importante">Importante</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group form-group-default">
                                <label>Dirigido a</label>
                                <select class="full-width" data-init-plugin="select2" id="send_to" name="send_to">
                                    <optgroup label="Dirigido a">
                                        <option value="todos">Todos</option>
                                        <option value="zona">Zona</option>
                                        <option value="apartamento">Bodegas</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3" style="display: none;" id="zona_display">
                            <div class="form-group form-group-default">
                                <label>Seleccione una zona</label>
                                <select class="full-width" data-init-plugin="select2" id="zona_select" name="zona_select">
                                    <optgroup label="Seleccione una zona" id="inner-zona">

                                    </optgroup>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3" style="display: none;" id="apartamento_display">
                            <div class="form-group form-group-default">
                                <label>Seleccione una Bodega</label>
                                <select class="full-width" data-init-plugin="select2" id="apartamento_select" name="apartamento_select">
                                    <optgroup label="Seleccione una zona" id="inner-apartamento">

                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    </div>




                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group form-group-default">
                                <label>Adjuntar Archivo</label>
                                <input type="checkbox" id="adjunto-opt" name="adjunto" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group form-group-default">
                                <label>Permitir Respuesta</label>
                                <input type="checkbox" class="respuesta-opt" name="respuesta"  />
                            </div>
                        </div>

                        <div class="col-md-6 file_upload" style="display:none;">
                            <div class="form-group form-group-default">
                                <label>Seleccione Archivo</label>
                                <input type="file" name="file_" id="file_"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- START PANEL -->
                            <div class="summernote-wrapper">
                                <textarea name="mensaje" id="summernote"></textarea>
                            </div>
                            <!-- END PANEL -->
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary  btn-cons">Enviar Mensaje</button>
                        <button type="button" class="btn btn-cons" onclick="clodeWindows('modal-nuevo-mensaje')">Cerrar</button>
                    </div>

                    {{ Form::close() }}
                </div>


            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
