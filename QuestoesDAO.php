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
		$rs = $this->conQuiz->query($sql);
		session_start();
        if ($rs) {
            $_SESSION["success"] = "Questão apagada com sucesso";
        } else {
            $_SESSION["danger"] = "Erro ao apagar a questão:";
        }
        header("Location: /Questoes");
	}

	public function inserir(){
		$sql = "INSERT INTO questoes VALUES (0, '$this->enunciado', '$this->tipo')";
		$rs = $this->conQuiz->query($sql);

		session_start();
        if ($rs) {
            $_SESSION["success"] = "Questão inserida com sucesso: ";
        } else {
            $_SESSION["danger"] = "Erro ao inserir a Questão: ";
        }
        header("Location: /Questoes");
	}

	public function editar(){
		$sql = "UPDATE questoes SET enunciado='$this->enunciado', tipo='$this->tipo' WHERE idQuestao=$this->id";
		$rs = $this->conQuiz->query($sql);
		session_start();
        if ($rs) {
            $_SESSION["success"] = "Sucesso ao editar a pergunta ";
        } else {
            $_SESSION["danger"] = "Erro ao editar a pergunta";
        }
        header("Location: /Questoes");
	}


	public function buscar(){
	{

        $sql = "SELECT * FROM questoes";
        $rs = $this->conQuiz->query($sql);
        while ($linha = $rs->fetch_object()) {
            $listaDePerguntas[] = $linha;
        }
        return $listaDePerguntas;
    }
    header("Location: /Questoes");
	}

    public function buscarPorId(){
        $sql = "SELECT * FROM questoes WHERE idQuestao = $this->id";
        $rs = $this->conQuiz->query($sql);
        if ($linha = $rs->fetch_object()){
            $this->enunciado = $linha->enunciado;
            $this->tipo = $linha->tipo;
        } 
    }
}


?>