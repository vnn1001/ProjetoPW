<?php
require "config.php";
class UsuarioDAO
{
    public $nome;
    public $email;
    public $senha;
    private $con;

    public function __construct()
    {
        $this->con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    }
	
	
   public function apagar($id){
		$sql = "DELETE FROM usuarios WHERE idUsuario=$id";
		$rs = $this->con->query($sql);
		if ($rs) header("Location: /usuarios");
		else echo $this->con->error;
	}

	public function inserir(){
		$sql = "INSERT INTO usuarios VALUES (0, '$this->nome', '$this->email', md5('$this->senha') )";
		$rs = $this->con->query($sql);

		if ($rs) 
			header("Location: /usuarios");
		else 
			echo $this->con->error;
	}

	public function editar(){
		$sql = "UPDATE usuarios SET nome='$this->nome', email='$this->email' WHERE idUsuario=$this->id";
		$rs = $this->con->query($sql);
		if ($rs) 
			header("Location: /usuarios");
		else 
			echo $this->con->error;
	}

	public function trocarSenha($id, $senha){
		$sql = "UPDATE usuarios SET senha=md5('$senha') WHERE idUsuario=$id";
		$rs = $this->con->query($sql);
		if ($rs) header("Location: /usuarios");
		else echo $this->con->error;
	}

	public function buscar(){
		$sql = "SELECT * FROM usuarios";
		$rs = $this->con->query($sql);
		$listaDeUsuarios = array();
		while ($linha = $rs->fetch_object()){
			$listaDeUsuarios[] = $linha;
		}
		return $listaDeUsuarios;
	}
}


?>