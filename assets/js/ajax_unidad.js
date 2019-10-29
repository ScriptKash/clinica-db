$(document).on("ready", function(){
  listar();

  $("#frm-unidad").on("submit", function(e){
           e.preventDefault();
           //Guardamos la referencia al formulario
           var $f = $(this);
           //Comprobamos si el semaforo esta en verde (1)
           if ($f.data('locked') != undefined && !$f.data('locked')){
            //No esta bloqueado aun, bloqueamos, preparamos y enviamos la peticion
                             $.ajax({
                                type: 'POST',
                                url:"?c=Unidad&a=Guardar",
                                data: {
                                    'acc': __("nn").innerHTML,
                                    'id_uni': $("#id_uni").val(),
                                    'nom_uni': $("#nom_uni").val(),
                                    'planta': $("#planta").val(),
                                    'codigo_doc':  $("#codigo_doc").val()     
                                },
                                beforeSend: function(){
                                    $f.data('locked', true);  // (2)
                                },
                                success: function(result){
                                  $('#mGuardar').modal('hide');
                                  if(result == 1)
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

$("#tabla").on("click",".btnEditarUnidad", function(){
  d = $(this).parents("tr").find("td");
          $("#div_id_uni").show();
          $("#id_uni").val(d[0].innerText);
          $("#nom_uni").val(d[1].innerText);
          $("#planta").val(d[2].innerText); 
          $("#codigo_doc").val(d[3].innerText);
          __('nn').innerHTML = "Editar";

});
/**/
$("#tabla").on("click",".btnEliminarUnidad", function(){
  d = $(this).parents("tr").find("td");


        swal({
                  title: '¿Esta seguro que desea eliminar esta Unidad?',
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
                            url:"?c=Unidad&a=Eliminar",
                            data: {
                           'id_uni': d[0].innerText},
                            success: function(result){

                              if(result == true){
                                swal({
                                    type: 'success',
                                    title: 'Eliminado exitosamente',
                                    showConfirmButton: false,
                                    timer: 1500
                                  });

                              }

                            listar();
                      }});


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



});

function __(id) {
  return document.getElementById(id);
}
function limpiar(){
  $("#div_id_uni").hide();
  $("#nom_uni").val("");
  $("#planta").val("");
  $("#codigo_doc").val("");
  __('nn').innerHTML = "Nuevo";
}



function listar(){
  var table = $("#tabla").DataTable({
       "destroy": true,
       "responsive":true,
       "bDeferRender": true,
        "sPaginationType": "full_numbers",
        "ajax": {
          "url": "?c=Unidad&a=Listar",
          "type": "POST"
        },
        "columns": [
          { "data": "id_uni"},
          { "data": "nom_uni"},
          { "data": "planta" },
          { "data": "codigo_doc"},
          {"data":null,"defaultContent": "<button class='btn btn-warning btnEditarUnidad ' data-toggle='modal' data-target='#mGuardar'><span class='fa fa-pencil'></span></button>\
          <button class='btn btn-danger btnEliminarUnidad'><span class='fa fa-trash'></span></button>" }
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
