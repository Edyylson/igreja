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

    #bt_enviar {
      width: 70px;
      margin-top: 30px;
    }

    hover #bt_enviar {
      color: blue;
    }

    input {
      height: 20px;
      width: 40vw;
      margin: auto;
      margin-inline: 20px;
      margin-bottom: 10px;
    }

    .inputcaixaA {
      display: inline-block;

    }

    .inputcaixaB {
      display: inline-block;
    }

    .inputcaixaC {
      display: inline-block;
    }


    a {
      color: white;
    }

    .bteditar {
      background-color: blue;
    }

    .btexcluir {
      background-color: red;
    }

    body {
      font-family: 'Times New Roman', Times, serif;
      border: 2px solid orange;
      width: 99%;


    }

    .formulario {
      border: 1px solid blue;
      text-align: center;
      margin-top: 30px;

    }

    section {
      border: 1px solid red;

    }

    thead {
      background-color: pink;
      height: 2em;
      font-size: 20px;
      font-weight: bold;
    }

    .tabela {
      background-color: gray;
      margin-top: 60px;
      font-size: 18px;
      border-collapse: collapse;
      border: 1px solid black;
      margin: auto;

    }

    header {
      border: 1px solid gray;
    }

    main {
      border: 1px solid green;
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
        <?php //<label for="data">Data</label>
        ?>
        <input class="inputcaixaA" type="date" name="ndata" id="id_data" required>

        <?php //<label for="sobrenome">Membro</label>
        ?>
        <input class="inputcaixaA" type="text" name="nmembro" id="id_membro" placeholder="Digite seu Nome" required value=""><br>

        <?php //<label for="valor">Valor</label>
        ?>
        <input class="inputcaixaB" type="number" name="nvalor" id="id_valor" placeholder="Digite um valor:0.00">

        <?php //<label for="categoria">Categoria</label>
        ?>
        <input class="inputcaixaB" type="text" name="ncategoria" id="id_categoria" placeholder="Dizimo ou Oferta?" required><br>

        <?php //<label for="tipo">Tipo</label>
        ?>
        <input class="inputcaixaC" type="text" name="ntipo" id="id_tipo" placeholder="Pix ou Espécie?" required>

        <?php //<label for="tipo">Mês</label>
        ?>
        <input class="inputcaixaC" type="text" name="nmes" id="id_tipo" placeholder="Digite o Mês" required><br>

        <input id="bt_enviar" type="submit" name="submit" value="ENVIAR">

      </form>




    </section>

  </header>
  <main>

    <?php

    $bdhost = 'localhost';
    $bdusuario = 'root';
    $bdsenha = '';
    $bdbandodados = 'financas';


    $conexao = new mysqli($bdhost, $bdusuario, $bdsenha, $bdbandodados);

    //include_once "conectar.php";

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
            echo "<td class='bteditar'><a href='#'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='black' class=' bi-pencil' viewBox='0 0 16 16'>
            <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
          </svg></a></td>";

            echo "<td class='btexcluir'><a><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='black' class='bi bi-trash' viewBox='0 0 16 16' font-weight= 'bold'>
          <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z'/>
          <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z'/>
        </svg>
          </a></td>";

            echo "</tr>";
          }

          ?>


  </main>

</body>

</html>