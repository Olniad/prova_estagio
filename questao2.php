<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>questao 2</title>
</head>
<body>
    <form method="POST" action="questao2.php">
        <label>Insira os numeros.</label> <br>
        <label>Numero 1.</label><br>
        <input type="number" name="n1" required></input><br>
        <label>Numero 2.</label><br>
        <input type="number" name="n2" required></input><br>
        <label>Numero 3.</label><br>
        <input type="number" name="n3" required></input><br>
        <label>Numero 4.</label><br>
        <input type="number" name="n4" required></input><br>
        <label>Numero 5.</label><br>
        <input type="number" name="n5" required></input><br>
        <input type="submit" value="ordenar">
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    if (isset($_POST["n1"]) && !empty($_POST["n1"]) &&
    isset($_POST["n2"]) && !empty($_POST["n2"]) &&
    isset($_POST["n3"])&& !empty($_POST["n3"]) &&
    isset($_POST["n4"]) && !empty($_POST["n4"]) &&
     isset($_POST["n5"]) && !empty($_POST["n5"])) {
        $n1 = $_POST["n1"];
        $n2 = $_POST["n2"];
        $n3 = $_POST["n3"];
        $n4 = $_POST["n4"];
        $n5 = $_POST["n5"];

        $numeros = array($n1, $n2, $n3, $n4, $n5);
        asort($numeros);
        echo "Os valores digitados por voce em ordem são: " . $n1 . ", " . $n2 . ", " . $n3 . ", " . $n4 . ", " . $n5;
        echo"<br>";
        echo "Valores em ordem crescente dentro de uma lista.";
        echo" <main>";
        echo "<ol>";        
        foreach ($numeros as $numero) {
            echo "<li>$numero</li>";
        }
        echo "</ol>";
        echo "</main>";
    }else{
        echo"verifique os valores digitados.";
    }
}
    ?>
</body>
</html>