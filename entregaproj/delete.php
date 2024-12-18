<?php
session_start(); 
require_once 'conex.php'; 


if ($_SERVER["REQUEST_METHOD"] === "POST") { 
    $titulo = $_POST["titulo"]; 
    $descricao= $_POST["descricao"]; 
    $sql = "Delete from treino where titulo = '$titulo'";
    if ($conn->query($sql) === TRUE) { 
        $_SESSION['message'] = "Treino excluido com sucesso!"; 
        header("Location: meustreinos.php"); 
        exit(0);
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
    $conn->close(); //Fecha a conexão com o banco
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Vamos usar o BootStrap para pegar alguns estilos prontos? -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Inserindo gente!</title>
</head>
<body>
<div class="container mt-5">
                <div class="card">
                    <div class="card-header">
                        <h4>Deletar treino
                            <a href="meustreinos.php" class="btn btn-danger float-end">VOLTAR</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                        <input type="text" name="titulo" placeholder="Título do treino" required value=<?=$_GET['prontuario']?>>
                        <button type="submit">Deletar</button>
                        </form>
                    </div>
                </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> 
</body>
</html> 