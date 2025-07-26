<?php
session_start();
require_once "credenciais.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $stmt = $conn->prepare("SELECT id, senha FROM usuarios WHERE usuario=?");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $senha_hash);

    if ($stmt->fetch() && password_verify($senha, $senha_hash)) {
        $_SESSION['usuario_id'] = $id;
        header("Location: postagem.php");
        exit();
    }else{
        echo "<script>alert('Usuário ou senha inválidos.');</script>";

    }

}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Login</title>
</head>
<body>
    <div class="areaLog">
        <div>
            <form method="post">
                <label for="">Email</label>
                <input type="text" name="usuario" id="login">
                <label>Senha</label>
                <input type="password"  name="senha" id="senha">
                <input  type="submit" value="entrar" name="entrar">
            </form>
        </div>
    </div>
</body>
</html>