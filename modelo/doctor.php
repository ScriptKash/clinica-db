<?php
class Doctor
{
	  private $dbh;
    public $codigo_doc;
		private $n;
    public $nombre;
    public $ap1;
    public $ap2;
    public $especializacion;

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
		$sql = 'SELECT * from fnlistardoctor();';
    $stmt = $this->dbh->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	 }





	/*public function Obtener($IdPersona)
	{
		try
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM uspr01 WHERE IdPersona = ?");


			$stm->execute(array($IdPersona));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}

 }*/

	public function Eliminar($codigo_doc)
	{
		try
		{

				$sql = "SELECT fneliminardoctor(?);";
		    $stmt = $this->dbh->prepare($sql);
				return $stmt->execute(array($codigo_doc));

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Doctor $data)
	{
		try
		{
			$sql = "SELECT fneditardoctor(?,?,?,?,?);";
	    $stmt = $this->dbh->prepare($sql);
			return $stmt->execute(array(
				$data->codigo_doc,
				$data->nombre,
				$data->ap1,
				$data->ap2,
				$data->especializacion
			));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Doctor $data)
	{
		$sql = 'SELECT fninsertardoctor(?,?,?,?,?);';
    $stmt = $this->dbh->prepare($sql);
		return $stmt->execute(array(
			$data->codigo_doc,
			$data->nombre,
			$data->ap1,
			$data->ap2,
			$data->especializacion
		));
	}
}
