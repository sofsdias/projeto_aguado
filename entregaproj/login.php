<?php
session_start();
require_once 'conex.php';


if ($_SERVER["REQUEST_METHOD"] === "POST") {
   $email = $_POST['email'];
   $senha = $_POST['senha'];


   // Usando prepared statements para segurança
   $stmt = $conn->prepare("SELECT * FROM usuario WHERE email = ? AND senha = ?");
   $stmt->bind_param("ss", $email, $senha);
   $stmt->execute();
   $result = $stmt->get_result();


   if ($result->num_rows > 0) {
       $_SESSION['email'] = $email;
       header('Location: meustreinos.php');
       exit;
   } else {
       unset($_SESSION['email']);
       header('Location: index.php');
       exit;
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
    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="celular">
            <img src="img/login.png" alt="Login">
        </div>
        <div class="dir">
            <h1>Olá!</h1>
            <h2>Entre na sua conta</h2>
            <form method="POST" action="">
                <div class="form">
                    <label for="email">Email</label>
                    <input type="text" name="email" placeholder="Digite seu email" required>

                    <label for="password">Senha</label>
                    <input type="password" name="senha" placeholder="Digite sua senha" required>
                </div>
                <button type="submit" name="acessar" value="Acessar"> <a href="meustreinos.php"> Fazer login </a> </button>
            </form>
            <br>
            <a href="avisosenha.html">Esqueceu sua senha?</a>
            <p>Não tem uma conta ainda? <a href="criarconta.php">Crie sua conta</a></p>
        </div>
    </div>

    
</body>
</html>
