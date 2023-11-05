let mysql = require("mysql");

let conexao = mysql.createConnection({
  host: "localhost",
  database: "financas",
  user: "root",
  password: ""

});

conexao.connect(function (err) {


  if (err) { throw err }

  else {
    console.log("conexão exitosa")

  }

});

