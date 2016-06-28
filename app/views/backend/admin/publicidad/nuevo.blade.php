<!-- MODAL STICK UP  -->

<div class="modal fade stick-up" id="modal-nuevo-anuncio" tabindex="-1" role="dialog" aria-labelledby="nuevoMensaje" aria-hidden="true">
    <div class="modal-dialog" style="width: 100%">
        <div class="modal-content">
            <div class="modal-header clearfix ">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                </button>
                <h4 class="p-b-5"><span class="semi-bold">Crear</span> Publicidad</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid container-fixed-lg m-t-20">
                    {{ Form::open(array('url' => 'admin/publicidad/crear', 'class' => '', 'role' => 'form','enctype'=>'multipart/form-data')) }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-default" style="padding: 13px 15px;">
                                <label>Nombre</label>
                                <input id="nombre" name="nombre" type="text" class="form-control" placeholder="Nombre Publicidad">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group form-group-default">
                                <label>Conjunto Residencial</label>
                                <select class="full-width" data-init-plugin="select2" id="conjunto" name="conjunto">
                                    <optgroup label="Seleccione el Conjunto">
                                        @foreach($conjuntos as $conjunto)
                                        <option value="{{ Crypt::encrypt($conjunto->id) }}">{{ $conjunto->nombre }}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group form-group-default">
                                <label>Tienda</label>
                                <input id="tienda" name="tienda" type="text" class="form-control" placeholder="Tienda">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-group-default">
                                <label>Logo Tienda</label>
                                <input type="file" name="logo_" id="logo_"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-group-default">
                                <label>Link</label>
                                <input id="link" name="link" type="text" class="form-control" placeholder="Link Publicidad">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group form-group-default">
                                <label>Fecha Publicacion</label>
                                <div class="input-prepend input-group">
                                    <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                                    <input type="text" style="width: 100%" name="desde_hasta" id="daterangepicker" class="form-control fecha_" value="" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-group-default">
                                <label>Imagen Publicidad</label>
                                <input type="file" name="file_" id="file_"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-group-default">
                                <label>Valor</label>
                                <input id="valor" name="valor" type="text" class="form-control" placeholder="Link Publicidad">
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
    </div>
</div>
