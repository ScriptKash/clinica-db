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
              <form id="frm-doctor" data-locked="false">
                      <div class="row">
                        <div class="col col-md-12">
                            <div class="form-group">
                              <label class="col col-md-3">Codigo doctor</label>
                              <div class="col col-md-9">
                              <input type="number" class="form-control" name="Cedula" id="codigo_doc"  placeholder="Ingrese el número de cédula" name="Cedula" required>
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
                                <input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Ingrese nombre"  required>
                              </div>
                              </div>
                            </div>
                          </div>

                          <br>

                          <div class="row">
                            <div class="col col-md-12">
                                <div class="form-group">
                                  <label class="col col-md-3">Apellido 1</label>
                                  <div class="col col-md-9">
                                  <input type="text" class="form-control" id="ap1" name="Apellido1" placeholder="Ingrese primer apellido"  required>
                                </div>
                                </div>
                              </div>
                            </div>

                            <br>

                            <div class="row">
                              <div class="col col-md-12">
                                  <div class="form-group">
                                    <label class="col col-md-3">Apellido 2</label>
                                    <div class="col col-md-9">
                                    <input type="text" class="form-control" id="ap2" name="Apellido2" placeholder="Ingrese segundo apellido"  required>
                                  </div>
                                  </div>
                                </div>
                              </div>


                              <br>

                              <div class="row">
                                <div class="col col-md-12">
                                  <div class="form-group">
                                    <label class="col col-md-3">Especializacion</label>
                                      <div class="col col-md-9">
                                      <input type="text" class="form-control" id="espe" name="especializacion" placeholder="Ingrese número de teléfono"  required>
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
