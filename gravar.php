<?php
    include 'conexao.php';

    $renavam = $_POST["txt_renavam"];
    $descricao_veiculo = $_POST["txt_descricao"];
    $montadora = $_POST['txt_montadora'];
    $ano_fabricacao = $_POST['txt_ano_fab'];
    $placa = $_POST['txt_placa'];
    $valor = $_POST['txt_valor'];
    

    $sql = mysqli_query($con, "select * from tb_veiculos where renavam='$renavam' or placa='$placa'");

    if (mysqli_num_rows($sql) > 0){
        echo "<center>";
        echo "<hr>";
        echo "Carro ja existente";
        echo "<hr>";
        echo "<br>";
        echo "<a href=\"montadoras.html\">Retornar ao cadastro </a>";
    }else{
        $sql = mysqli_query($con, "insert into tb_veiculos (RENAVAM, DESCRICAO_VEICULO, MONTADORA,ANO_FABRICACAO, PLACA, VALOR) values ('$renavam', '$descricao_veiculo','$montadora', '$ano_fabricacao', '$placa', '$valor')");
        echo "<center>";
        echo "<hr>";
        echo "Carro cadastrado com sucesso!";
        echo "<hr>";
        echo "<br>";
        echo "<a href=\"montadoras.html\">Retornar ao cadastro </a>";
    }
?>