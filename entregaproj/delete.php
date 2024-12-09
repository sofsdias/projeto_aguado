<?php
session_start(); // Inicia a sessão
require_once 'conex.php'; // Inclui a conexão com o banco

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Verifica se o título foi enviado
    if (!empty($_POST["titulo"])) {
        $titulo = $_POST["titulo"]; // Captura o valor do título de forma segura
        
        $sql = "Delete from treino where titulo = '$titulo'";
    if ($conn->query($sql) === TRUE) { // Executa o insert e verifica!
        $_SESSION['message'] = "Pessoa excluida com sucesso!"; //Cria a mensagem!
        header("Location: meustreinos.php"); //Chama o index!
        exit(0);
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
    $conn->close(); //Fecha a conexão com o banco
    }
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