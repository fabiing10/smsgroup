<!-- Modal -->
<div class="modal fade slide-up disable-scroll" id="eliminarAdministrador" tabindex="-1" role="dialog" aria-hidden="false">
    <div class="modal-dialog ">
        <div class="modal-content-wrapper">
            <div class="modal-content">
                <div class="modal-header clearfix text-left">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                    </button>
                    <h5>Eliminar <span class="semi-bold">un Administrador</span></h5>
                    <p class="p-b-10">Estas seguro? Vas a eliminar un administrador!</p>
                </div>
                <div class="modal-body">
                    {{ Form::open(array('url' => 'admin/administradores/eliminar', 'class' => 'nuevo-conjunto', 'role' => 'form')) }}
                    <input type="hidden" name="value-a" id="value-a" value="" />
                    <input type="hidden" name="method" id="method" value="delete" />
                    <div class="row">
                        <div class="col-sm-6 m-t-10 sm-m-t-10">
                            <button type="submit" class="btn btn-primary btn-block m-t-5">Eliminar</button>
                        </div>
                        <div class="col-sm-6 m-t-10 sm-m-t-10">
                            <button type="button" class="btn btn-primary btn-block m-t-5 c-a-e-conjunto" onclick="clodeWindows('eliminarAdministrador')">Cancelar</button>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>
