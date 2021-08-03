<?php

include 'conexao.php';

if(isset($_POST["txt_BuscaDesc"]) != '') {
    $sql = mysqli_query($con, "select * from tb_veiculos where descricao_veiculo like '{$_POST['txt_BuscaDesc']}%' order by descricao_veiculo asc");
}else{
    $sql = mysqli_query($con, "select * from tb_veiculos order by descricao_veiculo asc");
}

if(isset($_GET['apagar'])){
    $sql = mysqli_query($con, "delete from tb_veiculos where RENAVAM=". $_GET['apagar']);
    echo "<br>";
    echo "<center>";
    echo "<hr>";
    echo "Carro Excluido";
    echo "<br>";
    echo "<a href=\"listagem.php\">Voltar</a>";        
    return false;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem Veiculos</title>
</head>
<body>
    <form name="frm_listagem" method="POST" action="gravar.php">
    </form>

    <table border="1" align="center">
        <tr> 
            <th colspan="8" bgcolor="orange">Listagem de Veiculos</th>
        </tr>
        <tr>
            <th bgcolor="yellow">Renavam</th>
            <th bgcolor="yellow">Descrição do Veiculo</th>
            <th bgcolor="yellow">Montadora</th>
            <th bgcolor="yellow">Ano Fabricação</th>
            <th bgcolor="yellow">Placa</th>
            <th bgcolor="yellow">Valor Veiculo</th>
            <th bgcolor="yellow">IPVA</th>
            <th bgcolor="yellow">Excluir</th>
        </tr>
        <tr>
            <?php
                while($linha = mysqli_fetch_assoc($sql)) {
            ?>
                <td align="left"><?php echo $linha['RENAVAM']; ?></td>
                <td align="left"><?php echo $linha['DESCRICAO_VEICULO']; ?></td>
                <td align="left"><?php echo $linha['MONTADORA']; ?></td>
                <td align="left"><?php echo $linha['ANO_FABRICACAO']; ?></td>
                <td align="left"><?php echo $linha['PLACA']; ?></td>
                <td align="left"><?php echo $linha['VALOR']; ?></td>
                <td align="left"><?php echo $linha['IPVA']; ?></td>
                <th align="center"><a href="listagem.php?apagar='<?php echo $linha['RENAVAM']; ?>'"><img src="close-icon.png"></a></th>
        </tr>
               <?php }
               echo "<br>";
               echo "<center>";
               echo "<hr>";
               echo "<a href=\"montadoras.html\">Retornar ao Cadastro</a>";
               echo "<hr>";
               ?>
    </table>
</body>
</html>
