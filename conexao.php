<?php
$servidor="127.0.0.1";
$usuario="root";
$senha="";
$banco="multimarcas";
$con = mysqli_connect($servidor, $usuario, $senha, $banco) or die ('Erro ao conetar com o servidor');
echo 'Banco de dados conectado com sucesso';
?>
