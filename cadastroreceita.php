<?php
include_once 'conexao.php';

if (isset($_POST['cadastrar'])) {
    $nome = $_POST['nome'];
    $preparo = $_POST['preparo'];


    $sql = "INSERT INTO `receitas`(`nome`, `preparo`) VALUES (?,?);";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('ss', $nome, $preparo);
    if (!$result = $stmt->execute()) {
        die("Erro no banco {$db->error}");
    }else{
        print_r("<h2>SALVO</h2>");
    }
}
?>

<form action="" method="POST">
    <label for="nome">Nome</label>
    <input type="text" name="nome"></br>
    <label for="preparo">Preparo</label>
    <textarea name="preparo" cols="30" rows="10"></textarea></br></br>

    <input type="submit" value="Cadastrar" name="cadastrar">
</form>
