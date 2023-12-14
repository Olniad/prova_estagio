<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>questao 3</title>
</head>
<body>
<form method="POST" action="questao3.php">
    <label>Contador de caracteres.</label><br>
  <label for="caracteres">Digite:</label><br>
  <input type="text" name="caracteres" required><br>
  <input type="submit" value="enviar">
</form> 
<?php 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if (isset($_POST["caracteres"]) && !empty($_POST["caracteres"])){
    $caracteres = $_POST["caracteres"];
    echo "Voce digitou: ".$caracteres."<br>"; 
    echo "Possuem ".strlen($caracteres)." caracteres.<br>(contando com o espaço).";
}else{
    echo"algo deu errado, confira de novo.";
}
}
?>
</body>
</html>
