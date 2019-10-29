<?php
require_once 'modelo/intervencion.php';

class IntervencionController{

    private $model;
    public function __CONSTRUCT(){
        $this->model = new Intervencion();
    }


    public function Index(){
        require_once 'vista/intervencion/index.php';
    }

    public function Listar() {
      //echo "listar int controller";
        $resultSet["data"] = $this->model->Listar();
 			 	echo json_encode($resultSet);
 			 		exit();

    }

    public function Guardar()
    {
      
      $int = new Intervencion();
      $int->id_int = $_POST['id_int'];
      $int->ss_pac = $_POST['ss_pac'];
      $int->codigo_doc = $_POST['codigo_doc'];
      $int->sintoma = $_POST['sintoma'];
      $int->fecha_int = $_POST['F'];
      $int->tratamiento = $_POST['tratamiento'];
      $condicion = $_POST['acc'];
      if($condicion == 'Editar')
      {
        $result = $this->model->Actualizar($int);
        echo $result;
         //exit();
      }
      elseif($condicion =='Nuevo')
      {

      $result = $this->model->Registrar($int);
      echo $result;
       //exit();
       }
    }

    public function Eliminar()
    {
      $result = $this->model->Eliminar($_POST['id_int']);
      echo $result;
       exit();
    }
    public function obtenerIntervencion(){
     $int = $this->model->Obtener($_GET["ss_pac"]);
      var_dump($int);
    }

}
