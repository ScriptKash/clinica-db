

<div id="mGuardar" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <br>
        <center>
        <h4 class="modal-title" id="nn" style="color : #426ef4;"></h4>
      </center>
        </div>
      <div class="modal-body">
              <form id="frm-intervencion" data-locked="false">
                    <div id="div_id_int" class="row">
                      <div class="col col-md-12">
                          <div class="form-group">
                            <label class="col col-md-3">Codigo Intevencion</label>
                            <div class="col col-md-9">
                            <input type="text" class="form-control" name="id_int" id="id_int"  placeholder="Ingrese el número de seguro" readonly>
                            </div>
                          </div>
                        </div>
                      </div>

                      <br>
                      <div class="row">
                        <div class="col col-md-12">
                            <div class="form-group">
                              <label class="col col-md-3">SS de Paciente</label>
                              <div class="col col-md-9">
                              <input type="text" class="form-control" name="ss_pac" id="ss_pac"  placeholder="Ingrese el número de seguro" required>
                              </div>
                            </div>
                          </div>
                        </div>

                        <br>

                        <div class="row">
                          <div class="col col-md-12">
                              <div class="form-group">
                                <label class="col col-md-3">Codigo Doctor</label>
                                <div class="col col-md-9">
                                <input type="number" class="form-control" id="codigo_doc" name="codigo_doc" placeholder="Ingrese Codigo Doctor"  required>
                              </div>
                              </div>
                            </div>
                          </div>

                          <br>

                          <div class="row">
                            <div class="col col-md-12">
                                <div class="form-group">
                                  <label class="col col-md-3">Sintoma</label>
                                  <div class="col col-md-9">
                                  <input type="text" class="form-control" id="sintoma" name="sintoma" placeholder="Ingrese sintoma"  required>
                                </div>
                                </div>
                              </div>
                            </div>

                            <br>

                            <div class="row">
                              <div class="col col-md-12">
                                  <div class="form-group">
                                    <label class="col col-md-3">Tratamiento</label>
                                    <div class="col col-md-9">
                                    <input type="text" class="form-control" id="tratamiento" name="tratamiento" placeholder="Ingrese tratamirnto"  required>
                                  </div>
                                  </div>
                                </div>
                              </div>


                              <br>
            <div class="row" id="fecha">
                     <div class="col col-md-12">
                       <div class="form-group">
                           <label class="col col-md-3">Fecha Intervension</label>
                       <div class="col col-md-9">
                     <div class="input-group">
                           <input type="text" placeholder="Fecha Fin" name="FechaFin" id="FF" class="col col-md-12 fecha" style="height:32px;"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                     </div>
                      </div>
                  </div>
                 </div>
              </div>
                              <br>

             </div>
      <div class="modal-footer">
            <button class="btn btn-success btnGuardar" id="Enviar">Guardar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
      </div>
    </form>
    </div>
   </div>
  </div>
</div>
