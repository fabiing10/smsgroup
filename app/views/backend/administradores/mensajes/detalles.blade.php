<!-- MODAL STICK UP  -->
<div class="modal fade stick-up" id="modal-detalles-mensaje" tabindex="-1" role="dialog" aria-labelledby="nuevoMensaje" aria-hidden="true">
    <div class="modal-dialog" style="width: 100%">
        <div class="modal-content">
            <div class="modal-header clearfix ">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                </button>
                <h4 class="p-b-5"><span class="semi-bold">Detalles </span> Mensaje</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid container-fixed-lg m-t-20">
                    <div class="col-sm-12">

                        <div class="panel panel-transparent">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs nav-tabs-linetriangle">
                                <li class="active"> <a data-toggle="tab" href="#home"><span>Mensaje</span></a></li>
                                <li> <a data-toggle="tab" href="#profile"><span>Detalles</span></a> </li>
                                <li> <a data-toggle="tab" href="#respuestas"><span>Respuestas</span></a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="home">
                                    <div class="row column-seperation">

                                        <div class="row describe">
                                            <div class="col-md-4">
                                                <h5>
                                                    <span class="semi-bold">Asunto: </span> <span id="inner-subject"></span>
                                                </h5>
                                            </div>
                                            <div class="col-md-4">
                                                <h5>
                                                    <span class="semi-bold">Fecha: </span> <span id="inner-date"></span>
                                                </h5>
                                            </div>
                                            <div class="col-md-4" id="attachment" style="display: none;">

                                            </div>
                                        </div>
                                        <div class="col-md-12" style="padding: 0px;">

                                            <div id="inner-msg"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="profile">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="panel panel-transparent">
                                                <div class="panel-heading">
                                                    <div class="panel-title">
                                                        <h5>Estadisticas<span class="semi-bold"> Mensaje</span></h5>
                                                    </div>
                                                    <div class="pull-right" style="width: 50%;">
                                                        <div class="col-xs-12">
                                                            <input type="text" id="search-table-report" class="form-control pull-right" placeholder="Search">
                                                        </div>

                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="panel-body">
                                                    <table class="table table-hover demo-table-dynamic" id="dataTableReporteMensajeGral">
                                                        <thead>
                                                        <tr>
                                                            <th style="width: auto;">Unidad</th>
                                                            <th style="width: auto;">Bodega</th>
                                                            <th style="width: auto;">Nombres</th>
                                                            <th style="width: auto;">Apellidos</th>
                                                            <th style="width: auto;">Leido</th>
                                                            <th style="width: auto;">Fecha Leido</th>
                                                            <th style="width: auto;">-</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>



                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="respuestas">
                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="panel panel-transparent">
                                                <div class="panel-heading">
                                                    <div class="panel-title">
                                                        <h5>Mensajes<span class="semi-bold"> Respondidos</span></h5>
                                                    </div>
                                                    <div class="pull-right" style="width: 50%;">
                                                        <div class="col-xs-12">
                                                            <input type="text" id="search-table-report" class="form-control pull-right" placeholder="Search">
                                                        </div>

                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="panel-body">
                                                    <table class="table table-hover demo-table-dynamic" id="dataTableRespuestasMensaje">
                                                        <thead>
                                                        <tr>
                                                            <th style="width: auto;">Nombres</th>
                                                            <th style="width: auto;">Apellidos</th>
                                                            <th style="width: auto;">Unidad</th>
                                                            <th style="width: auto;">Bodega</th>
                                                            <th style="width: auto;">Id</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="content-respuesta-data">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
