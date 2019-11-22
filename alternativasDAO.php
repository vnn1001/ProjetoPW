<?php

class alternativasDAO{
    public $texto;
    public $idQuestao;
    public $correta;
    private $conAlternativas;

    function __construct(){
        $this->conAlternativas = mysqli_connect("localhost","root","etecia", "projetopw");
    }
    public function apagar($id){
        
        $sql = "DELETE FROM alternativas WHERE id_alternativa=$id";
        $rs = $this->conAlternativas->query($sql);
        if ($rs) header("Location: /alternativas");
        else echo $this->conAlternativas->error;
    }
    public function inserir(){
                          
        $sql = "INSERT INTO alternativas VALUES (0, '$this->texto', '$this->idQuestao', '$this->correta')"; 
        $rs = $this->conAlternativas->query($sql);
        if($rs)
            header("Location: /alternativas");
        else
            echo $this->conAlternativas->error;
    }
        public function editar(){
        $sql = "UPDATE alternativas SET texto='$this->texto', correta='$this->correta' WHERE idAlternativa=$this->id";
        $rs = $this->con->query($sql);
        if ($rs) 
            header("Location: \alternativas?questao=$id");
        else 
            echo $this->con->error;
    }
    
    public function buscaralternativas(){
        
        $sql = "SELECT * FROM alternativas";
        $rs = $this->conAlternativas->query($sql);
        while ($linha = $rs->fetch_object()){
            $listaAlternativas[] = $linha;
        }
        return $listaAlternativas;
    }

}

?>