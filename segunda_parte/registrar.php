<!DOCTYPE html>
<html lang="eng">
<head>
    <meta charset="utf-8">
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
    
<div class="container">
<h2 class="py-5 text-center">Novo livro</i></h2>

<form method="POST" action="registrar.php">
<div class="row g-3">
    <div class="col-md-6">
        <label for="titulo" class="form-label">Titulo<i class="bi bi-person"></i></label>
        <input type="text" class="form-control" name="titulo" required autofocus>
    </div>

    <div class="col-md-6">
        <label for="autor" class="form-label">Autor<i class="bi bi-person"></i></label>
        <input type="text" class="form-control" name="autor" required autofocus>
    </div>

    <div class="col-md-4">
        <label for="ano" class="form-label">Ano de Publicação<i class="bi bi-person"></i></label>
        <input type="number" class="form-control" name="ano" required autofocus>
    </div>

    <hr class="my-4">

    <div class="col-md-12 text-end">
        <button class="btn btn-primary btn-lg" name="botao" type="submit">Cadastrar</button>
        <a class="btn btn-success btn-lg" href="index.php">Cancelar</a> 
    </div>
</div>
</form>


</div>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

</body>

</html>
<?php
header('Content-Type: text/html; charset=utf-8');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["botao"])) {
    require_once "conexao.php";
    $conexao = new conexao();

    $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
    $autor = filter_input(INPUT_POST, 'autor', FILTER_SANITIZE_STRING);
    $ano = filter_input(INPUT_POST, 'ano', FILTER_VALIDATE_INT);

    if ($ano === false) {
        echo "<script>alert('Ano inválido.');</script>";
    } else {
        $sql = "INSERT INTO livros (titulo, autor, ano) VALUES ('$titulo', '$autor', $ano)";
        $result = $conexao->executeQuery($sql);

        if ($result === '1') {
            echo "<script>alert('Cadastrado com sucesso!');</script>";
            header('Location: index.php');  
            exit;
        } else {
            echo "<script>alert('Erro ao cadastrar!');</script>";
        }
    }
}
?>








