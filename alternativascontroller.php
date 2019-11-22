<?php
//Back do User
include "alternativasDAO.php";
$acao = $_GET["acao"];

switch ($acao) {
    case 'inserir':
        $alternativas= new alternativasDAO();
        $alternativas->texto = $_POST["texto"];
        $alternativas->idQuestao = $_POST["idQuestao"];
        if (isset($_POST["correta"])) $alternativa->correta = 1;
        else $alternativa->correta = 0;
        $alternativas->inserir();
        break;
        
    case 'apagar':
        $alternativas = new alternativasDAO();
        $id_alternativa =  $_GET["id"];
        $alternativas->apagar($id_alternativa);
        break;
    
    case 'trocarIdQuestão':
        $alternativas = new alternativasDAO();
        $id_alternativa =  $_POST["id_alternativa"];
        $idQuestao =  $_POST["idQuestao"];
        $alternativas->trocaSenha($id_alternativa, $idQuestao);
        break;
    
    default:
        # code...
        break;
}

    
?>