<?php
require_once 'modelo/doctor.php';

class DoctorController{

    private $model;
    public function __CONSTRUCT(){
        $this->model = new Doctor();
    }


    public function Index(){
        require_once 'vista/doctor/index.php';
    }

    public function Listar() {
        $resultSet["data"] = $this->model->Listar();
 			 	echo json_encode($resultSet);
 			 		exit();

    }

    public function Guardar()
    {
      $per = new Doctor();
      $per->codigo_doc = $_POST['codigo_doc'];
      $per->nombre = $_POST['nombre'];
      $per->ap1 = $_POST['ap1'];
      $per->ap2 = $_POST['ap2'];
      $per->especializacion = $_POST['especializacion'];
      $condicion = $_POST['acc'];
      if($condicion == 'Editar')
      {
        $result = $this->model->Actualizar($per);
        echo $result;
         exit();
      }
      elseif($condicion =='Nuevo')
      {

      $result = $this->model->Registrar($per);
      echo $result;
       exit();
       }
    }

    public function Eliminar()
    {
      $result = $this->model->Eliminar($_POST['codigo_doc']);
      echo $result;
       exit();
    }

}
