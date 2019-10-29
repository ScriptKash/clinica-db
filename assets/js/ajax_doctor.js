$(document).on("ready", function(){
  listar();
 guardar();
Eliminar();

$("#tabla").on("click",".btnEditarDoctor", function(){
  d = $(this).parents("tr").find("td");
          $("#codigo_doc").val(d[0].innerText);
          $("#Nombre").val(d[1].innerText);
          $("#ap1").val(d[2].innerText);
          $("#ap2").val(d[3].innerText);
          $("#espe").val(d[4].innerText);
          __('nn').innerHTML = "Editar";

});
/**/


});

function Eliminar(){
  $("#tabla").on("click",".btnElinimarDoctor", function(){
  d = $(this).parents("tr").find("td");


        swal({
                  title: '¿Esta seguro que desea eliminar a '+d[1].innerText+'?',
                  text: "No se puede revertir!",
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Si, Vuelelo!',
                  cancelButtonText: 'No, Cancelar!',
                  confirmButtonClass: 'btn btn-success',
                  cancelButtonClass: 'btn btn-danger',
                  buttonsStyling: false
                }).then(function () {

                  $.ajax({
                            type: 'POST',
                            url:"?c=Doctor&a=Eliminar",
                            data: {
                           'codigo_doc': d[0].innerText},
                            success: function(result){

                              if(result == 1){
                                swal({
                                    type: 'success',
                                    title: 'Eliminado exitosamente',
                                    showConfirmButton: false,
                                    timer: 1500
                                  });
                              }
                              console.log(result);
                              listar();
                            }
                    });


                }, function (dismiss) {
                  // dismiss can be 'cancel', 'overlay',
                  // 'close', and 'timer'
                  if (dismiss === 'cancel') {
                    swal({
                        type: 'error',
                        title: 'Operacion Cancelada',
                        text : 'Su registro esta a salvo ☺',
                        showConfirmButton: false,
                        timer: 1500
                      });

                  }
                })


});


}

function guardar(){
    $("#frm-doctor").on("submit", function(e){
           e.preventDefault();
           //Guardamos la referencia al formulario
           var $f = $(this);
           //Comprobamos si el semaforo esta en verde (1)
           if ($f.data('locked') != undefined && !$f.data('locked')){
            //No esta bloqueado aun, bloqueamos, preparamos y enviamos la peticion
                             $.ajax({
                                type: 'POST',
                                url:"?c=Doctor&a=Guardar",
                                data: {
                                    'codigo_doc': $("#codigo_doc").val(),
                                    'nombre':  $("#Nombre").val(),
                                    'ap1': $("#ap1").val(),
                                    'ap2': $("#ap2").val(),
                                    'especializacion': $("#espe").val(),
                                    'acc' : __("nn").innerHTML
                                },
                                beforeSend: function(){
                                    $f.data('locked', true);  // (2)
                                },
                                success: function(result){
                                  $('#mGuardar').modal('hide');
                                  if(result == true)
                                  {
                                    console.log(result);
                                    swal({
                                        type: 'success',
                                        title: 'Operación ejecutada exitosamente',
                                        showConfirmButton: false,
                                        timer: 1500
                                      });
                                   listar();
                                  }
                                  else
                                  {
                                    console.log(result);

                                    swal({
                                        type: 'error',
                                        title: 'Error',
                                        showConfirmButton: false,
                                        timer: 1500
                                      });

                                  }
                               },
                               complete: function(){ $f.data('locked', false);  // (3)
                              }
                          });
                        }
                        else
                        {
                         //Bloqueado!!!
                         //alert("locked");
                        }

    });
/**/
}
function __(id) {
  return document.getElementById(id);
}
function limpiar(){
  $("#codigo_doc").val("");
  $("#Nombre").val("");
  $("#ap1").val("");
  $("#ap2").val("");
  $("#espe").val("");
  __('nn').innerHTML = "Nuevo";
}



function listar(){

  var table = $("#tabla").DataTable({
       "destroy": true,
       "responsive":true,
       "bDeferRender": true,
        "sPaginationType": "full_numbers",
        "ajax": {
          "url": "?c=Doctor&a=Listar",
          "type": "POST"
        },
        "columns": [
          { "data": "codigo_doc"},
          { "data": "nombre" },
          { "data": "ap1" },
          { "data": "ap2" },
          { "data": "especializacion"},
          {"data":null,"defaultContent": "<button class='btn btn-warning btnEditarDoctor ' data-toggle='modal' data-target='#mGuardar'><span class='fa fa-pencil'></span></button>\
          <button class='btn btn-danger btnElinimarDoctor'><span class='fa fa-trash'></span></button>" }
          ],

 "language": idioma_espanol
  });


}


    var idioma_espanol = {

      "sProcessing":     "Procesando...",
      "sLengthMenu":     "Mostrar _MENU_ registros",
      "sZeroRecords":    "No se encontraron resultados",
      "sEmptyTable":     "Ningún dato disponible en esta tabla",
      "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
      "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix":    "",
      "sSearch":         "Buscar:",
      "sUrl":            "",
      "sInfoThousands":  ",",
      "sLoadingRecords": "Cargando...",
      "oPaginate": {
          "sFirst":    "Primero",
          "sLast":     "Último",
          "sNext":     "Siguiente",
          "sPrevious": "Anterior"
      },
      "oAria": {
          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
}
