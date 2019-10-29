
<center><button type="button" name="button" data-toggle="modal" data-target="#mGuardar" style="position:relative; top:50px;" onclick="limpiar();">Nuevo</button></center>
<!-- <button type="button" name="button"  onclick="listar();">listar</button> -->
<h1 class="page-header"><i>Intervenciones</i></h1>
<div class="table-responsive">
  <table id="tabla" class="table" cellspacing="0" width="100%">
      <thead>
          <tr>
              <th>id Intervencion</th>
              <th>ss paciente</th>
              <th> paciente</th>
              <th>codigo doc</th>
              <th>doc</th>
              <th>fecha</th>
              <th>sintoma</th>
              <th>tratamiento</th>
              <th></th>
          </tr>
      </thead>
       <tbody>
       </tbody>
   </table>
</div>
<?php include('vista/intervencion/intervencion-m.php'); ?>
