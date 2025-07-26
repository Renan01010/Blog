<?php
require_once "credenciais.php";

$usuario = "admin";
$senha_log = "renanteles";

$senha_criptografada = password_hash($senha_log, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO usuarios (usuario, senha) VALUES (?,?)");
$stmt->bind_param("ss", $usuario, $senha_criptografada);

if ($stmt->execute()){
    echo "usuario criado com sucesso!";
}else{
    echo "Erro ao criar usuario: " . $conn->error;
}
?>