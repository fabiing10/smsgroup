<!-- MODAL STICK UP  -->
<div class="modal fade stick-up" id="modal-nuevo-apartamento" tabindex="-1" role="dialog" aria-labelledby="nuevoApartamento" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header clearfix ">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                </button>
                <h4 class="p-b-5"><span class="semi-bold">Nuevo</span> Apartamento</h4>
            </div>
            <div class="modal-body">
                <p class="small-text">Es facil! Solo debes completar el siguiente formulario</p>

                {{ Form::open(array('url' => 'admin-conjuntos/conjunto/apartamentos/crear', 'class' => 'nuevo-apartamento', 'role' => 'form')) }}

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group form-group-default">
                            <label>Apartamento</label>
                            <input id="apartamento" name="apartamento" type="text" class="form-control" placeholder="# Apartamento">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group form-group-default">
                            <label>Zonas del conjunto</label>
                            <select class="full-width" data-init-plugin="select2" name="zona_select">
                                <optgroup label="Zonas Disponibles">

                                    @foreach($zonas as $zona)
                                        @if($zona->tipo == "Contador" || $zona->tipo == "Revisor_Fiscal")
                                          <option value="{{ Crypt::encrypt($zona->id) }}">{{ $zona->value }}</option>
                                        @else
                                          <option value="{{ Crypt::encrypt($zona->id) }}">{{ $zona->tipo }} - {{ $zona->value }}</option>
                                        @endif
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group form-group-default">
                            <label>Descripcion</label>
                            <div class="wysiwyg5-wrapper b-a b-grey">
                                <textarea id="descripcion" name="descripcion" class="wysiwyg demo-form-wysiwyg" placeholder="Descripcion del apartamento..."></textarea>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary  btn-cons">Crear</button>
                    <button type="button" class="btn btn-cons" onclick="clodeWindows('modal-nuevo-apartamento')">Cerrar</button>
                </div>

                {{ Form::close() }}


            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
