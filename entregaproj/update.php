<?php
session_start(); // Inicia os trabalhos com sessão
require_once 'conex.php'; // Inclui a conexão com o banco
if (isset($_GET['titulo']) && isset($_GET['descricao'])) {
    $_SESSION['titulo_veio'] = $_GET['titulo'];
    $_SESSION['descricao_veio'] = $_GET['descricao'];
}
if ($_SERVER["REQUEST_METHOD"] === "POST") { //verifica se será chamado via método post
    $titulo_veio = $_SESSION['titulo_veio'] ?? '';
    $titulo = $_POST['titulo'] ?? '';
    $descricao_veio = $_SESSION['descricao_veio'] ?? '';
    $descricao = $_POST['descricao'] ?? '';

    $sql = "UPDATE treino SET titulo = '$titulo', descricao = '$descricao' WHERE titulo='$titulo_veio' AND descricao='$descricao_veio'";
    if ($conn->query($sql) === TRUE) { // Executa o insert e verifica!
        $_SESSION['message'] = "Pessoa atualizada com sucesso!"; //Cria a mensagem!
        header("Location: meustreinos.php"); //Chama o index!
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
    <title>Atualizando o treino</title>
</head>
<body>
<!-- Essas classes do CSS são todas do bootstrap!-->
<div class="container mt-5">
        <!-- O bootstrap organiza o layout em linhas (row) e colunas (col)-->
                <div class="card">
                    <div class="card-header">
                        <h4>Atualizar treino
                            <a href="meustreinos.php" class="btn btn-danger float-end">VOLTAR</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <!-- Vamos omitir o  action porque queremos que o formulário chame ele mesmo!-->
                        <form method="POST">
                            <div class="mb-3">
                                <label>Título</label>
                                <input type="text" name="titulo" value="<?=$_GET['titulo']?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Descrição</label>
                                <input type="text" name="descricao" value="<?= htmlspecialchars($_GET['descricao'] ?? '', ENT_QUOTES) ?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="atualizar_pessoa" class="btn btn-primary">Atualizar treino</button>
                            </div>
                        </form>
                    </div>
                </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> 
</body>
</html>