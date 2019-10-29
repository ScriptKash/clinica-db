<?php
class Intervencion
{
	  private $dbh;
	  private $n;
    public $id_int;	
    public $ss_pac;
    public $codigo_doc;
    public $fecha_int;
    public $sintoma;
    public $tratamiento;

		public function __construct()
    {
        try{
        $this->dbh=new PDO('pgsql:host=localhost;port=5432;dbname=Clinica', "postgres", "");
        }catch (PDOException $e){
            // report error message
             echo $e->getMessage();
            }

        $this->n=array();
    }


	public function listar(){ // aqui manda a llamar la function _vehiel
		$sql = 'SELECT * from fnlistarintervencion();';
    $stmt = $this->dbh->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	 }





	public function Obtener($IdInt)
	{
		try
		{
			$stm = $this->pdo
			          ->prepare("SELECT * from fnconsultarintervencion(?);");


			$stm->execute(array($IdInt));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}

 }

	public function Eliminar($IdInt)
	{
		try
		{

				$sql = "SELECT fneliminarintervencion(?);";
		    $stmt = $this->dbh->prepare($sql);
				return $stmt->execute(array($IdInt));

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Intervencion $data)

	{
		$data->fecha_int = date('Y/m/d',strtotime($data->fecha_int));
		try
		{
			$sql = "SELECT fneditarintervencion(?,?,?,?,?,?);";
	    $stmt = $this->dbh->prepare($sql);
			return $stmt->execute(array(
				$data->id_int,
				$data->ss_pac,
				$data->codigo_doc,
				$data->fecha_int,
				$data->sintoma,
				$data->tratamiento
			));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Intervencion $data)
	{  
		$sql = 'SELECT fninsertarintervencion(?,?,?,?);';
    $stmt = $this->dbh->prepare($sql);
		return $stmt->execute(array(
			$data->ss_pac,
			$data->codigo_doc,
			$data->sintoma,
			$data->tratamiento
		));
	}
}