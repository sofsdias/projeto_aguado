<?php
session_start(); // Inicia a sessão
require_once 'conex.php'; // Inclui a conexão com o banco

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Preparar a query para evitar injeção SQL
    $stmt = $conn->prepare("INSERT INTO usuario (nome, email, senha) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nome, $email, $senha);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Conta criada com sucesso!";
        header("Location: index.php");
        exit(0);
    } else {
        echo "Erro ao inserir os dados: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/criarconta.css">
    <title>Crie Sua Conta</title>
</head>
<body>
    <div class="container">
        <div class="form">
            <h2>Crie sua conta</h2>
            <form method="POST" action="">
                <label class="label">Nome Completo</label>
                <input type="text" name="nome" required>

                <label class="label">E-mail</label>
                <input type="email" name="email" required>

                <label class="label">Senha</label>
                <input type="password" name="senha" id="senha" required>

                <label class="label">Confirme sua Senha</label>
                <input type="password" id="confirmar_senha" required>

                <button type="submit">Criar Conta</button>
            </form>
        </div>
    </div>

    <script>
        // Validação de senha
        const form = document.querySelector('form');
        form.addEventListener('submit', (e) => {
            const senha = document.getElementById('senha').value;
            const confirmarSenha = document.getElementById('confirmar_senha').value;

            if (senha !== confirmarSenha) {
                e.preventDefault();
                alert('As senhas não coincidem!');
            }
        });
    </script>
</body>
</html>
