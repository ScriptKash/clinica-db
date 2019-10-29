<?php
require_once 'modelo/unidad.php';

class UnidadController{

    private $model;
    public function __CONSTRUCT(){
        $this->model = new Unidad();
    }


    public function Index(){
        require_once 'vista/unidad/index.php';
    }

    public function Listar() {
      //echo "listar uni controller";
        $resultSet["data"] = $this->model->Listar();
        echo json_encode($resultSet);
          exit();

    }

    public function Guardar()
    { 
      $uni = new Unidad();
      $uni->id_uni = $_POST['id_uni'];
      $uni->nom_uni = $_POST['nom_uni'];
      $uni->planta = $_POST['planta'];
      $uni->codigo_doc = $_POST['codigo_doc'];
      if($_POST['acc'] == 'Editar')
      {
        $result = $this->model->Actualizar($uni);
        echo $result;
         exit();
      }
      elseif($_POST['acc'] =='Nuevo')
      {

       $result = $this->model->Registrar($uni);
       echo $result;
       exit();
       }
    }

    public function Eliminar()
    {
      $result = $this->model->Eliminar($_POST['id_uni']);
      echo $result;
       exit();
    }

}
