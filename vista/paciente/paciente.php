
<center><button type="button" name="button" data-toggle="modal" data-target="#mGuardar" style="position:relative; top:50px;" onclick="limpiar();">Nuevo</button></center>
<h1 class="page-header"><i>Pacientes</i></h1>
<div class="table-responsive">
  <table id="tabla" class="table" cellspacing="0" width="100%">
      <thead>
          <tr>
              <th>Seguro Social</th>
              <th>Nombre</th>
              <th>Primer Apellido</th>
              <th>Segundo Apellido</th>
              <th>Edad</th>
              <th>Fecha Ingreso</th>
              <th>Id Unidad</th>
              <th></th>
          </tr>
      </thead>
       <tbody>
       </tbody>
   </table>
</div>
<?php include('vista/paciente/paciente-m.php'); ?>
