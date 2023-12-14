<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>questao 4</title>
</head>
<body>
<form method="POST" action="questao4.php">
    <label> Quantos reais você deseja sacar?</label><br>
    <input type="number" name="quantidade"></input><br>
    <br>
    <input type="submit" value="Sacar o dinheiro">
</form>
<br><br>
<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["quantidade"]) && !empty($_POST["quantidade"])) {
        $quantidade = $_POST["quantidade"];
        echo "Quantia escolhida: " . $quantidade . "<br><br><br>";

        while ($quantidade >= 100) {
            echo "<img src='100.jpg'></img><br>";
            echo "<label>Quantidade a sacar: 100</label><br><br>";
            $quantidade -= 100;
        }

        while ($quantidade >= 50) {
            echo "<img src='50.png'></img><br>";
            echo "<label>Quantidade a sacar: 50</label><br><br>";
            $quantidade -= 50;
        }

        while ($quantidade >= 20) {
            echo "<img src='20.png'></img><br>";
            echo "<label>Quantidade a sacar: 20</label><br><br>";
            $quantidade -= 20;
        }

        while ($quantidade >= 10) {
            echo "<img src='10reais.png'></img><br>";
            echo "<label>Quantidade a sacar: 10</label><br>";
            $quantidade -= 10;
        }
    }
}
?>

<form method="POST" >
    
</form>
</body>