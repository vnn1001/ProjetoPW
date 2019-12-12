<?php

require "Config.php";

class QuestoesDAO

{
	public $id;
	public $enunciado;
	public $tipo;

	private $conQuiz;

	function __construct(){
        $this->conQuiz = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    }
	
	public function apagar($id){
		$sql = "DELETE FROM questoes WHERE idQuestao=$id";
		$rs = $this->con->query($sql);
		session_start();
        if ($rs) {
            $_SESSION["success"] = "Tu conseguiu apagar!";
        } else {
            $_SESSION["danger"] = "não deu pra apagar isso não: ";
        }
	}

	public function inserir(){
		$sql = "INSERT INTO questoes VALUES (0, '$this->enunciado', '$this->tipo')";
		$rs = $this->con->query($sql);

		session_start();
        if ($rs) {
            $_SESSION["success"] = "Desafio inserido com Sucesso!";
        } else {
            $_SESSION["danger"] = "Não deu pra inserir a pergunta: ";
        }
        header("Location: /questoes");
	}

	public function editar(){
		$sql = "UPDATE questoes SET enunciado='$this->enunciado', tipo='$this->tipo' WHERE idQuestao=$this->id";
		$rs = $this->con->query($sql);
		session_start();
        if ($rs) {
            $_SESSION["success"] = "Deu bom pra trocar esse desafio cara: ";
        } else {
            $_SESSION["danger"] = "É...então, não deu pra mudar nada não x(";
        }
        header("Location: /questoes");
	}


	public function buscar(){
	{

        $sql = "SELECT * FROM questions";
        $rs = $this->conQuiz->query($sql);
        while ($linha = $rs->fetch_object()) {
            $listaDePerguntas[] = $linha;
        }
        return $listaDePerguntas;
    }
	}
}


?>