<?php
header('Content-Type: text/html; charset=utf-8');
require_once "conexao.php";
$conexao = new conexao();
$reg = $conexao->executeSelect("select * from livros");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Biblioteca</title>
     
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"/>
    <style type="text/css"> 
    body{
        margin: 20px;
        background-color: #ffffff;
    }
    *{
        font-family: 'Open Sans', sans-serif;
    }
    h2{
        font-family: 'Open Sans', sans-serif;
    }
    .thead{
        background-color: #f7f7f7;
    }
    </style>
</head>
<body>
<body>
    <div class="container">
        <h2 class="text-center"> Lista de Livros <i class="bi bi-people-fill"></i></h2>
        <h5 class="text-end">
            <a href="registrar.php" class="btn btn-primary btn-xs">
                <i class="bi bi-person-plus-fill"></i>
            </a>
        </h5>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="thead">
                    <tr>              
                        <th>TITULO</th>
                        <th>AUTOR</th>
                        <th>ANO DE PUBLICAÇÃO</th>
                        <th colspan="3">AÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($reg)) {
                        foreach ($reg as $livros) {
                            echo
                            '
                            <tr>
                                <td>'.$livros['titulo'].'</td>
                                <td>'.$livros['autor'].'</td>
                                <td>'.$livros['ano'].'</td>
                                <td>
                                    <!-- Sua lógica aqui, caso tenha algo para adicionar na coluna 4 -->
                                </td>
                                <td>
                                    <form method="POST" action="index.php">
                                        <button class="btn btn-danger btn-Xs" value="'.$livros['titulo'].'" name="excluir" type="submit"> 
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            ';
                        }
                    } else {
                        echo '<tr><td colspan="4">Sem resultados.</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
</body>
</html>
<?php
require_once "conexao.php";
$conexao = new conexao();
$reg = $conexao->executeSelect("SELECT * FROM livros");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["excluir"])) {
    require_once "conexao.php";
    $conexao = new conexao();
    $tituloParaExcluir = $_POST["excluir"];

    $sql = "DELETE FROM livros WHERE titulo = :titulo";
    
    try {
        $stmt = $conexao->getConexao()->prepare($sql);
        $stmt->bindParam(':titulo', $tituloParaExcluir, PDO::PARAM_STR);

        if ($stmt->execute()) {
            echo "<script>alert('Registro excluído com sucesso!');</script>";
            header("Location: index.php"); 
            exit(); 
        } else {
            echo "<script>alert('Erro ao excluir registro.');</script>";
        }
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}

if (!empty($reg)) {
    foreach ($reg as $livros) {
    }
} else {
    echo "Sem resultados.";
}
?>

