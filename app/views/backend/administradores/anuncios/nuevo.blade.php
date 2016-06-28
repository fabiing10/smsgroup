<!-- MODAL STICK UP  -->

<div class="modal fade stick-up" id="modal-nuevo-anuncio" tabindex="-1" role="dialog" aria-labelledby="nuevoMensaje" aria-hidden="true">
    <div class="modal-dialog" style="width: 100%">
        <div class="modal-content">
            <div class="modal-header clearfix ">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                </button>
                <h4 class="p-b-5"><span class="semi-bold">Nuevo</span> Mensaje</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid container-fixed-lg m-t-20">
                    {{ Form::open(array('url' => 'admin-conjuntos/conjunto/anuncios/crear', 'class' => '', 'role' => 'form','enctype'=>'multipart/form-data')) }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>Nombre</label>
                                <input id="nombre" name="nombre" type="text" class="form-control" placeholder="Nombre Anuncio">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Banner</label>
                                <input type="checkbox" data-init-plugin="switchery" checked="checked" />
                            </div>
                        </div>
                        <div class="col-md-6">
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
                                <textarea name="descripcion" id="summernote"></textarea>
                            </div>
                            <!-- END PANEL -->
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary  btn-cons">Crear Anuncio</button>
                        <button type="button" class="btn btn-cons">Cerrar</button>
                    </div>

                    {{ Form::close() }}
                </div>


            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
