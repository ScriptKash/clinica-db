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
              <form id="frm-unidad" data-locked="false">
                    <div id="div_id_uni" class="row">
                      <div class="col col-md-12">
                          <div class="form-group">
                            <label class="col col-md-3">Id Unidad</label>
                            <div class="col col-md-9">
                            <input type="text" class="form-control" name="id_uni" id="id_uni"  placeholder="Ingrese el número de unidad" readonly>
                            </div>
                          </div>
                        </div>
                      </div>

                      <br>
                      <div class="row">
                        <div class="col col-md-12">
                            <div class="form-group">
                              <label class="col col-md-3">Nombre</label>
                              <div class="col col-md-9">
                              <input type="text" class="form-control" name="nom_uni" id="nom_uni"  placeholder="Ingrese el nombre" required>
                              </div>
                            </div>
                          </div>
                        </div>

                        <br>

                         <div class="row">
                            <div class="col col-md-12">
                                <div class="form-group">
                                  <label class="col col-md-3">Planta</label>
                                  <div class="col col-md-9">
                                  <input type="text" class="form-control" id="planta" name="planta" placeholder="Ingrese el numero de planta"  required>
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
