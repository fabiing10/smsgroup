<!-- MODAL STICK UP  -->

<div class="modal fade stick-up" id="modal-nuevo-documento" tabindex="-1" role="dialog" aria-labelledby="nuevoMensaje" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header clearfix ">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                </button>
                <h4 class="p-b-5"><span class="semi-bold">Cargar</span> Documento</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid container-fixed-lg m-t-20">
                    {{ Form::open(array('url' => 'admin-conjuntos/conjunto/documentos/crear', 'class' => '', 'role' => 'form','enctype'=>'multipart/form-data')) }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Documento</label>
                                <input id="documento" name="documento" type="text" class="form-control" placeholder="Nombre Documento">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Categoria</label>
                                <select class="full-width" data-init-plugin="select2" name="categoria">
                                    <optgroup label="Categorias">
                                        <option value="all acta-asamblea">Actas de Asambleas</option>
                                        <option value="all informes-contables">Informes Contables</option>
                                        <option value="all manual-convivencia">Manual de convivencia</option>
                                        <option value="all procesos-procedimientos">Procesos & Procedimiento</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="row">

                        <div class="col-md-412">
                            <div class="form-group form-group-default">
                                <label>Seleccione Archivo</label>
                                <input type="file" name="file_" id="file_"/>
                            </div>
                        </div>
                    </div>



                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary  btn-cons">Cargar Documento</button>
                        <button type="button" class="btn btn-cons" onclick="clodeWindows('modal-nuevo-documento')">Cerrar</button>
                    </div>

                    {{ Form::close() }}
                </div>


            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
