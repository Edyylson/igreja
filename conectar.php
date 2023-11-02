<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>dados de formulario</title>
</head>

<body>

  <?php

  $bdhost = 'localhost';
  $bdusuario = 'root';
  $bdsenha = '';
  $bdbandodados = 'financas';


  $conexao = new mysqli($bdhost, $bdusuario, $bdsenha, $bdbandodados);
  //$sql = "INSERT INTO  gastos(dtRegistro,membro,valor,categoria,meio,mês) values
  //('$datas','$membros','$valores','$categ','$tipos','$meses')";

  //if (mysqli_query($conexao, $sql)) {
  //  echo "deu tudo certo!";
  // } else {
  //  echo "algo deu errado!" . $sql . "<br>" . mysqli_error($conexao);
  //}

  ?>


</body>

</html>