<?php 
session_start();
require_once 'credenciais.php';

if(isset($_POST['indice'])){
    $bd = "indice";
} else {
    $bd = "data_postagem";
}

$res = $conn->query("SELECT * FROM postagens ORDER BY $bd DESC");

while ($row = $res->fetch_assoc()) {
    echo "<article>";
    echo "<div class='postess'>";
    echo "<h2>{$row['titulo']}</h2>";
    echo "<p>{$row['texto']}</p>";
    if ($row['imagem']) {
        echo "<img src='uploads/{$row['imagem']}' width='200'>";
    }
    echo "</div>";
    echo "</article>";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/pulico.css">
    <title>Blog</title>
</head>
<body>
    <div>
        <form method="post">
            <select name="opcao">
                <option value="indice">Índice</option>
                <option value="Data">Data</option>
            </select>
            <input type="submit" value="Ordenar">
        </form>
    </div>
</body>
</html>