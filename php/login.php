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
    

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($id, $senha_hash);
        $stmt->fetch();
        
    
        
            if(password_verify($senha, $senha_hash)) {
                $_SESSION['usuario_id'] = $id;
                header("Location: postagem.php");
                exit();
            }

        }
        $erro = true;
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
            <?php
                if(isset($erro)){
                    echo "<p>Alguma coisa errada</p>";
                }
                ?>
        </div>
    </div>
</body>
</html>