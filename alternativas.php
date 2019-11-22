<?php
include "alternativasDAO.php";

$alternativasDAO = new alternativasDAO();
$listaAlternativas = ($alternativasDAO->buscaralternativas());

include "cabecalho.php";
include "menuLateral.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
        <link rel="stylesheet" type="text/css" href="css/all.min.css">
        <title>Alternativas</title>
    </head>
    <body>
    
        <div class="col-10">
            <h1>Alternativas</h1>
                        <br>
                        <br>
                    <table class="table">
                        <tr>
                            <th>Id</th>
                            <th>Resposta</th>
                            <th>Referência</th>
                            <th>Correta</th>
                        </tr>
                        
                        <?php foreach($listaAlternativas as $alternativas): ?>
                        <tr>
                            <td><?= $alternativas->id_alternativa?></td>
                            <td><?= $alternativas->texto?></td>
                            <td><?= $alternativas->idQuestao?></td>
                            <td><?= $alternativas->correta?></td>
                            <td>
                                <a class="btn btn-danger" href="alternativascontroller.php?acao=apagar&id=<?= $alternativas->id_alternativa?>"><i class="fas fa-trash-alt"></i></a>
                            </td>
                            
                            
                        </tr>
                        <?php endforeach ?>
                    </table>
                    <button class="btn btn-dark" data-toggle="modal" data-target="#newmodal">
                <i class="fas fa-plus"></i>
                </i>  </button>
        <!--modal-->          
        <div class="modal fade" id="newmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
        </div>
        <div class="modal-body">
        <form action="alternativascontroller.php?acao=inserir" method="POST">
        <div class="input-group mb-3">
                        <input type="text" name="texto" class="form-control" placeholder="Enunciado" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="correta" class="form-control" placeholder="correta" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="idQuestao" class="form-control" placeholder="Relação" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Sair</button>
            <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
        </div>
    </div>
    </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript">
        var botao = document.querySelector(".alterar-senha");
        console.log(botao);
        botao.addEventListener("click", function(){
            //window.alert(botao.getAttribute("data-id"));
            var campo = document.querySelector("#campo-id");
            campo.value = botao.getAttribute("data-id");
        });
    </script>
</html>