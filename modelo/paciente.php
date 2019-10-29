<?php
class Paciente
{
	private $dbh;
    private $n;
    public $ss_pac;
    public $nombre;
    public $ap1;
    public $ap2;
    public $edad;
    public $fecha_ing;
    public $id_uni;

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
		$sql = 'SELECT * from fnlistarpaciente();';
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

	public function Eliminar($ss_pac)
	{
		try
		{
           $sql = "SELECT fneliminarpaciente(?);";
		    $stmt = $this->dbh->prepare($sql);
				return $stmt->execute(array($ss_pac));

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Paciente $data)
	{
		try
		{
			$sql = "SELECT fneditarpaciente(?,?,?,?,?,?,?);";
	    $stmt = $this->dbh->prepare($sql);
			return $stmt->execute(array(
				$data->ss_pac,
				$data->nombre,
				$data->ap1,
				$data->ap2,
				$data->edad,
				$data->fecha_ing,
				$data->id_uni
			));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Paciente $data)
	{
		$sql = 'SELECT fninsertarpaciente(?,?,?,?,?,?,?);';
    $stmt = $this->dbh->prepare($sql);
		return $stmt->execute(array(
			    $data->ss_pac,
				$data->nombre,
				$data->ap1,
				$data->ap2,
				$data->edad,
				$data->fecha_ing,
				$data->id_uni
		));
	}
}
