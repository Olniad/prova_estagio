<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>questao 1</title>
</head>
<body>
<form method="POST" action="questao1.php">
  <label for="primeira_nota">Primeira nota:</label><br>
  <input type="number" name="nota1" required><br>
  <label for="segunda_nota">Segunda nota:</label><br>
  <input type="number" name="nota2" required><br>
  <label for="terceira_nota">Terceira nota:</label><br>
  <input type="number" id="nota3" name="nota3" required><br><br>
  <input type="submit" value="calcular"> 
</form> 
<br>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
if (isset($_POST["nota1"]) && !empty($_POST["nota1"]) &&
isset($_POST["nota2"]) && !empty($_POST["nota2"]) &&
isset($_POST["nota3"]) && !empty($_POST["nota3"])) {
$nota1 = $_POST["nota1"];
$nota2 = $_POST["nota2"];
$nota3 = $_POST["nota3"];
$media = ($nota1 + $nota2 + $nota3) / 3;
echo"A média das notas é ".$media;
}else{
    echo"Algo está errado, confira os valores.";
}
}
?>
</body>
</html>