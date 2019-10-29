<?php
require_once 'modelo/paciente.php';

class PacienteController{

    private $model;
    public function __CONSTRUCT(){
        $this->model = new Paciente();
    }


    public function Index(){
        require_once 'vista/paciente/index.php';
    }

    public function Listar() {
        $resultSet["data"] = $this->model->listar();
 			 	echo json_encode($resultSet);
 			 		exit();

    }

    public function Guardar()
    {
      $per = new Paciente();
      $per->ss_pac = $_POST['ss_pac'];
      $per->nombre = $_POST['nombre'];
      $per->ap1 = $_POST['ap1'];
      $per->ap2 = $_POST['ap2'];
      $per->edad = $_POST['edad'];
      $per->fecha_ing = $_POST['fecha_ing'];
      $per->id_uni = $_POST['id_uni'];
      $condicion = $_POST['acc'];
      if($condicion == 'Editar')
      {
        $result = $this->model->Actualizar($per);
        echo $result;
         exit();
      }
      elseif($_POST['acc'] =='Nuevo')
      {

      $result = $this->model->Registrar($per);
      echo $result;
       exit();
       }
    }

    public function Eliminar()
    {
      $result = $this->model->Eliminar($_POST['ss_pac']);
      echo $result;
       exit();
    }

}
