<?php
require "Config.php";
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
		session_start();
        if ($rs) {
            $_SESSION["success"] = "usuário apagado com sucesso";
        } else {
            $_SESSION["dangen"] = "Error Fatal...você não conseguiu se apagar ;)";
        }
        header("Location: /usuarios");
    }

	public function inserir(){
		$sql = "INSERT INTO usuarios VALUES (0, '$this->nome', '$this->email', md5('$this->senha') )";
		$rs = $this->con->query($sql);
		session_start();
        if ($rs) {
            $_SESSION["success"] = "usuário inserido com sucesso";
        } else {
            $_SESSION["danger"] = "Não foi possivel inserir esse usuário :(";
        }
        header("Location: /usuarios");
    }

	public function editar(){
		$sql = "UPDATE usuarios SET nome='$this->nome', email='$this->email' WHERE idUsuario=$this->id";
		$rs = $this->con->query($sql);
		session_start();
        if($rs){
            $_SESSION["success"] = "Nome e/ou email alterado com sucesso ;)";
        } else{
            $_SESSION["danger"] = "Não foi possivel alterar o nome e/ou email :";
        }
        header("Location: /usuarios");
    
	}

	public function trocarSenha($id, $senha){
		$sql = "UPDATE usuarios SET senha=md5('$senha') WHERE idUsuario=$id";
		$rs = $this->con->query($sql);
		session_start();
        if ($rs) {
            $_SESSION["success"] = "Senha alterada com sucesso ;)";
        } else {
            $_SESSION["danger"] = "Não foi possivel alterar a senha :(";
        }
        header("Location: /usuarios");
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
	
	 public function logar()
    {
        $sql = "SELECT * FROM usuarios WHERE
            email='$this->email' AND
            senha=md5('$this->senha')";
        $rs = $this->con->query($sql);
        if ($rs->num_rows) {
            session_start();
            $_SESSION["logado"] = true;
            header("Location:/usuarios");
        } else {
            header("Location:/?erro=1");
        }
    }
	public function sair()
    {
        session_destroy();
        header("Location: /");
    }
}


?>