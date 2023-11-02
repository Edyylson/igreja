<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tabela finanças -Mysql</title>
  <link rel="stylesheet" href="style.css">

  <style>
  td {
    color: white;
  }

  body {
    font-family: 'Times New Roman', Times, serif;
  }

  .formulario {
    border: none;
    display: block;
    text-align: center;

  }

  thead {
    background-color: pink;
  }

  .tabela {
    background-color: gray;
    margin-top: 20px;
  }

  label {
    color: blue;
    font-family: Arial, Helvetica, sans-serif;
    display: inline;
    justify-content: space-evenly;

  }
  </style>

</head>

<body>

  <?php
  //$datas = $_POST['ndata'];
  //$osmembros = $_POST['nmembro'];
  //$valores = $_POST['nvalor'];
  //$ascategorias = $_POST['ncategoria'];
  //$ostipos = $_POST['ntipo'];
  //$meses = $_POST['nmes'];

  //echo "$datas, $osmembros, $valores, $ascategorias, $ostipos, $meses";

  //
  ?>



  <header>
    <section class="sessao">
      <form class="formulario" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <label for="data">Data</label>
        <input type="date" name="ndata" id="id_data" required>

        <label for="sobrenome">Membro</label>
        <input type="text" name="nmembro" id="id_membro" placeholder="Digitar Nome membro" required value="">

        <label for="valor">Valor</label>
        <input type="number" name="nvalor" id="id_valor" required value=0>

        <label for="categoria">Categoria</label>
        <input type="text" name="ncategoria" id="id_categoria" placeholder="Dizimo ou Oferta" required>

        <label for="tipo">Tipo</label>
        <input type="text" name="ntipo" id="id_tipo" placeholder="Pix ou Espécie" required>

        <label for="tipo">Mês</label>
        <input type="text" name="nmes" id="id_tipo" placeholder="Pix ou Espécie" required>

        <input type="submit" name="submit" value="ENVIAR">

      </form>
    </section>

  </header>
  <main>

    <?php

    //include_once "dados.php";

    include_once "conectar.php";

    if (isset($_POST['submit']) && !empty($_POST['nmembro']) && !empty($_POST['ncategoria']) && !empty($_POST['ntipo'])) {
  
      $datas = $_POST['ndata'];
      $osmembros = $_POST['nmembro'];
      $valores = $_POST['nvalor'];
      $ascategorias = $_POST['ncategoria'];
      $ostipos = $_POST['ntipo'];
      $meses = $_POST['nmes'];

      //if ($valores = "0000-00-00") {
      //  echo "verdade";
      //} else {

      $sql = "INSERT INTO  gastos(dtRegistro,membro,valor,categoria,meio,mês) values
  ('$datas','$osmembros','$valores','$ascategorias','$ostipos','$meses')";

      if (mysqli_query($conexao, $sql)) {
        var_dump($valores);
      } else {
        echo "algo deu errado!" . $sql . "<br>" . mysqli_error($conexao);
      }
    };

    $sql_plint = "select * from gastos";

    $result = $conexao->query($sql_plint);

    //print_r($result);
    //if ($conexao->connect_errno) {
    // echo "Erro";
    //} else {
    // echo "Conexão realizada com sucesso!";

    //};


    ?>


    <div>
      <table class="tabela">

        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Data</th>
            <th scope="col">Membros</th>
            <th scope="col">Valor</th>
            <th scope="col">Categoria</th>
            <th scope="col">Meio</th>
            <th scope="col">Mês</th>
            <th scope="col">Ano</th>

          </tr>

        </thead>

        <tbody>



          <?php

          while ($user_data = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $user_data['id'] . "</td>";

            echo "<td>" . $user_data['dtRegistro'] . "</td>";

            echo "<td>" . $user_data['membro'] . "</td>";

            echo "<td>" . $user_data['valor'] . "</td>";

            echo "<td>" . $user_data['categoria'] . "</td>";

            echo "<td>" . $user_data['meio'] . "</td>";

            echo "<td>" . $user_data['mês'] . "</td>";

            echo "<td>" . $user_data['ano'] . "</td>";
          }

          ?>


  </main>

</body>

</html>