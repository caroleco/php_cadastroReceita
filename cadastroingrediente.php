<?php
use Prova\Ingrediente as Ingrediente;
include_once 'conexao.php';
//cadastro
if(isset($_POST['cadastrar'])){
    $nome = $_POST['nome'];
    $desc = $_POST['desc'];
    $unmed = $_POST['unmed'];
    $estoque = $_POST['estoque'];

    $sql = "INSERT INTO `ingredientes`(`nome`, `descricao`, `unidade`, `estoque`) 
VALUES (?,?,?,?)";

    $stmt = $db->prepare($sql);
    $stmt->bind_param('sssi',$nome,$desc,$unmed,$estoque);
    if(!$result=$stmt->execute()){
        die("Ocorreu um erro {$db->error}");
    }

}

//exclusao
if(isset($_GET['excluir'])){
    $id = $_GET['excluir'];
    $sql = "DELETE FROM `ingredientes` WHERE `idingredientes` = ?;";

    $stmt = $db->prepare($sql);
    $stmt->bind_param('i',$id);
    if(!$result = $stmt->execute()){
        die("Erro {$db->error}");
    }
}
?>

<form action="" method="POST">
    <label for="nome">Nome</label>
    <input type="text" name="nome"></br>
    <label for="desc">Descrição</label>
    <input type="text" name="desc"></br>
    <label for="unmed">Unidade de Medida</label>
    <input type="text" name="unmed"></br>
    <label for="estoque">Quantidade em Estoque</label>
    <input type="number" name="estoque"></br>
    <input type="submit" value="Cadastrar" name="cadastrar">
</form>
<table>
    <thead>
    <th colspan="4">Ingredientes</th>
    </thead>
    <tbody>
    <?php
    try {
        $sql = "SELECT * FROM `ingredientes`";
        $stmt = $db->query($sql);
        foreach ($stmt as $row){
            $ingredientes = new Ingrediente($row['nome'],
            $row['descricao'],$row['unidade'],$row['estoque']);

            ?>
                <tr>
                    <td><?= $ingredientes->getNome() ?></td>
                    <td><?= $ingredientes->getDescricao() ?></td>
                    <td><?= $ingredientes->getUnidade() ?></td>
                    <td><?= $ingredientes->getEstoque() ?></td>
                    <td><a href="cadastroingrediente.php?excluir=<?= $row['idingredientes'] ?>">x</a></td>
                </tr>
                <?php
            }
        }catch (PDOException $exception){
        throw new Exception($exception->getMessage());
    }
    ?>
    </tbody>
</table>