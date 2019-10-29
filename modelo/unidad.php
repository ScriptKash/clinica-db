<?php
class Unidad
{
	  private $dbh;
	  private $n;
    public $id_uni;	
    public $nom_uni;
    public $planta;
    public $codigo_doc;

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
		$sql = 'SELECT * from fnlistarunidad();';
    $stmt = $this->dbh->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	 }





	/*public function Obtener($IdInt)
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

 }*/

	public function Eliminar($id_uni)
	{
		try
		{

				$sql = "SELECT fneliminarunidad(?);";
		    $stmt = $this->dbh->prepare($sql);
				return $stmt->execute(array($id_uni));

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Unidad $data)

	{
		try
		{
			$sql = "SELECT fneditarunidad(?,?,?,?);";
	        $stmt = $this->dbh->prepare($sql);
			return $stmt->execute(array(
				$data->id_uni,
				$data->nom_uni,
				$data->planta,
				$data->codigo_doc
			));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Unidad $data)
	{  
		$sql = 'SELECT fninsertarunidad(?,?,?);';
    $stmt = $this->dbh->prepare($sql);
		return $stmt->execute(array(
			$data->nom_uni,
			$data->planta,
			$data->codigo_doc
		));
	}
}