$(document).on("ready", function(){
  listar();

  $("#frm-intervencion").on("submit", function(e){
           e.preventDefault();
           //Guardamos la referencia al formulario
           var $f = $(this);
           //Comprobamos si el semaforo esta en verde (1)
           if ($f.data('locked') != undefined && !$f.data('locked')){
            //No esta bloqueado aun, bloqueamos, preparamos y enviamos la peticion
                             $.ajax({
                                type: 'POST',
                                url:"?c=Intervencion&a=Guardar",
                                data: {
                                    'id_int': $("#id_int").val(),
                                    'ss_pac': $("#ss_pac").val(),
                                    'codigo_doc':  $("#codigo_doc").val(),
                                    'sintoma': $("#sintoma").val(),
                                    'F':$("#FF").val(),
                                    'tratamiento': $("#tratamiento").val(),
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

$("#tabla").on("click",".btnEditarIntervencion", function(){
  d = $(this).parents("tr").find("td");
          $("#id_int").val(d[0].innerText);
          $("#ss_pac").val(d[1].innerText);
          $("#codigo_doc").val(d[3].innerText);
          $("#sintoma").val(d[6].innerText);
          $("#tratamiento").val(d[7].innerText);
          $('#FF').val(d[5].innerText);
          $('#fecha').show();
          __('nn').innerHTML = "Editar";

});
/**/
$("#tabla").on("click",".btnElinimarIntervencion", function(){
  d = $(this).parents("tr").find("td");


        swal({
                  title: '¿Esta seguro que desea eliminar esta Intervencion?',
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
                            url:"?c=Intervencion&a=Eliminar",
                            data: {
                           'id_int': d[0].innerText},
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
  $("#div_id_int").hide();
  $("#ss_pac").val("");
  $("#codigo_doc").val("");
  $("#sintoma").val("");
  $("#tratamiento").val("");
  $('#fecha').hide();
  __('nn').innerHTML = "Nuevo";
}



function listar(){
  var table = $("#tabla").DataTable({
       "destroy": true,
       "responsive":true,
       "bDeferRender": true,
        "sPaginationType": "full_numbers",
        "ajax": {
          "url": "?c=Intervencion&a=Listar",
          "type": "POST"
        },
        "columns": [
          { "data": "id_int"},
          { "data": "ss_pac", "class": "hidden" },
          { "data": "paciente" },
          { "data": "codigo_doc", "class": "hidden"},
          { "data": "doctor" },
          { "data": "fecha" },
          { "data": "sintoma" },
          { "data": "tratamiento"},
          {"data":null,"defaultContent": "<button class='btn btn-warning btnEditarIntervencion ' data-toggle='modal' data-target='#mGuardar'><span class='fa fa-pencil'></span></button>\
          <button class='btn btn-danger btnElinimarIntervencion'><span class='fa fa-trash'></span></button>" }
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
