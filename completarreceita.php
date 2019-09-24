<?php
use Prova\Receita as Receita;
use Prova\Ingrediente as Ingrediente;
include_once 'conexao.php';

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="" method="POST">
    <label for="receita"></label>
    <select name="receita" id="">
        <?php

            $sql = "SELECT `idreceitas`, `nome`, `preparo` FROM `receitas`";
            if(!$result = $db->query($sql)){
                die("Erro {$db->error}");
            }else{
            while($row = $result->fetch_object()){

                    ?>
                    <option value="<?= $row->idreceitas ?>"><?= $row->nome ?></option>
                    <?php
                }
            }
        ?>
    </select>
    <label for="Ingredientes"></label>
    <?php
        $sql = "SELECT `idingredientes`, `nome`, `descricao`, `unidade`, `estoque` FROM `ingredientes`";
        if(!$result = $db->query($sql)){
            die("Erro {$db->error}");
        }else{
            while($row = $result->fetch_object('Ingrediente')){
    ?>
    <input type="checkbox" name="check_list[]" value="<?= $row->getNome() ?>"><?= $row->getNome() ?>
                <input type="number" name="<?= $row->getNome() ?>">
    <?php
                }
    }
    ?>
</form>
</body>
</html>
