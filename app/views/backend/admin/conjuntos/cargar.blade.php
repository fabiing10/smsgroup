<!-- MODAL STICK UP  -->
<div class="modal fade stick-up" id="cargarConjunto" tabindex="-1" role="dialog" aria-labelledby="cargarConjunto" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header clearfix ">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                </button>
                <h4 class="p-b-5"><span class="semi-bold">Cargar Datos</span> Conjunto Residencial</h4>
            </div>
            <div class="modal-body">
                <p class="small-text">Es facil! Debes cargar el excel en formato xls con todos los campos correctamente dilegenciados.</p>

                {{ Form::open(array('url' => 'admin/conjuntos/cargar', 'class' => '', 'role' => 'form','enctype'=>'multipart/form-data')) }}
                <input type="hidden" name="conjunto_id" id="conjunto_id" value="" />
                <input type="hidden" name="method" id="method" value="cargar" />

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group form-group-default">
                            <label>Cargar Excel</label>
                            <input id="data_conjunto" name="data_conjunto" type="file" class="form-control" >
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary  btn-cons">Cargar Informacion</button>
                    <button type="button" class="btn btn-cons">Close</button>
                </div>

                {{ Form::close() }}


            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
