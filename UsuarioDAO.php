<?php

require ("Config.php");

class UsuarioDAO{
    public $id;
    public $nome;
    public $email;
    public $senha;
    
    private $con;

    function __construct(){
        $this->con = mysqli_connect(DB_SEVER,DB_USER,DB_PASS, DB_NAME);
    }
    public function apagar($id){
        
        $sql = "DELETE FROM users WHERE UserID=$id";
        $rs = $this->con->query($sql);
        session_start();
        if ($rs){
            $_SESSION["sucess"]="usuário apagar com sucesso";
            header("Location: /usuarios");
            else{
            $_SESSION["danger"]="erro ao apagar usuário";
        }
            header("Location: /usuarios");
        } 

        
    }
    public function inserir(){
                          
        $sql = "INSERT INTO users VALUES (0, '$this->nome', '$this->email', md5('$this->senha'))"; 
        $rs = $this->con->query($sql);
        if($rs)
            header("Location: /usuarios");
        else
            echo $this->con->error;
    }
        public function trocaSenha($id, $senha){
        $sql = "UPDATE users SET Senha=md5('$senha') WHERE UserID='$id'";
        $rs = $this->con->query($sql);
        if($rs)
            header("Location: /usuarios");
        else
            echo $this->con->error;
    }

    public function buscar(){
        
        $sql = "SELECT * FROM users";
        $rs = $this->con->query($sql);
        while ($linha = $rs->fetch_object()){
            $listaDeUsuarios[] = $linha;
        }
        return $listaDeUsuarios;
    }

    public function logar(){
        $sql = "SELECT * FROM usuarios WHERE email = '$this->email' AND senha = md5('$this->senha')";
        $rs = $this->con->query($sql);
        if ($rs->num_rows>0){
            header("Location: /usuarios");
        }
        else
            header("Location: /");
    }

    public function sair(){
        session_destroy();
        header("Location: /?erro=1");   
    }
}

?>