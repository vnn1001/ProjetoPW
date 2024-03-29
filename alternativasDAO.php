<?php 
error_reporting (E_WARNING);
require "Config.php";

class alternativasDAO
{
    
    public $texto;
    public $correta;
    public $idQuestao;
    private $conAlternativa;

    function __construct(){
        $this->conAlternativa = mysqli_connect (DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    }
    public function apagar($id, $idQuestao){
		$sql = "DELETE FROM alternativas WHERE idAlternativa=$id";
		$rs = $this->conAlternativa->query($sql);
		if ($rs) header("Location: \alternativas?questao");
		else echo $this->con->error;
	}

	public function inserir(){
		$sql = "INSERT INTO alternativas VALUES (0, $this->idQuestao, '$this->texto', '$this->correta')";
		$rs = $this->conAlternativa->query($sql);

		if ($rs) 
			header("Location: \alternativas?questao");
		else 
			echo $this->con->error;
	}

	public function editar(){
		$sql = "UPDATE alternativas SET texto='$this->texto', correta='$this->correta' WHERE idAlternativa=$this->id";
		$rs = $this->conAlternativa->query($sql);
		if ($rs) 
			header("Location: \alternativas?questao");
		else 
			echo $this->con->error;
	}


	public function buscar(){
		$sql = "SELECT * FROM alternativas WHERE idQuestao=$this->idQuestao";
		$rs = $this->conAlternativa->query($sql);
		$lista = array();
		while ($linha = $rs->fetch_object()){
			$lista[] = $linha;
		}
		return $lista;
	}
}


?>