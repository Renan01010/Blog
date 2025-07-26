<?php 
    require_once 'credenciais.php';

    if(isset($_POST['indice'])){
        $bd="indice";
    }else {
        $bd="data_postagem";
    }

    $res = $conn->query("SELECT * FROM postagens ORDER BY $bd DESC");

   while ($row = $res->fetch_assoc()) {
    echo "<h2>{$row['titulo']}</h2>";
    echo "<p><strong>Categoria:</strong> {$row['indice']}</p>";
    if ($row['imagem']) {
        echo "<img src='uploads/{$row['imagem']}' width='200'><br>";
    }
    echo "<p>{$row['texto']}</p>";
    echo "<hr>";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/blog.css">
    <!-- <link rel="stylesheet" href="../css/estilo.css"> -->
    <title>Blog</title>
</head>
<body>
    <div>
        <form method="post">
            <select name="opcao">
                <option value="indice">indice</option>
                <option value="Data">Data</option>
            </select>
            <input type="submit" value="Ordenar">
        </form>
    </div>
</body>
</html>