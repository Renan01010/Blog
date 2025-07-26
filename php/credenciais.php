<?php
$host = 'localhost';
$usuario = 'root';
$senha = '4085';
$banco = 'blog';

$conn = new mysqli($host, $usuario, $senha, $banco);

if ($conn->connect_error){
    die ("ERRO AO CONECTAR AO BD: " . $conn->connect_error);
}

?>