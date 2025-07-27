<?php
session_start();
 if(!isset($_SESSION['usuario_id'])){
    header("Location: Login.php");
}
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once 'credenciais.php';

    $titulo = $_POST['titulo'];
    $texto = $_POST['texto'];
    $indice = $_POST['indice'];

    $imagem_nome = '';      

    if (!is_dir('uploads')) {
    mkdir('uploads', 0755, true);
}

    if (!empty($_FILES['imagem']['name'])){
        $imagem_nome = basename($_FILES['imagem']['name']);
        $destino = "uploads/" . $imagem_nome;

        if(!(move_uploaded_file($_FILES['imagem']['tmp_name'], $destino))){
            echo "ERRO AO FAZER OPLOAD DA IMAGEN";
        }

    }
    $stmt = $conn->prepare("INSERT INTO postagens (titulo, texto, imagem, indice) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $titulo, $texto, $imagem_nome, $indice);
    $stmt->execute();

    $CERTO=false;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/blog.css">
    <title>postagens</title>
    
</head>
<body>
    <div class="postes">
        <form method="post" enctype="multipart/form-data">
            <input type="text" name="titulo" placeholder="Titulo" required>
            <textarea name="texto" placeholder="Texto postagem" required></textarea>
            <input type="text" name="indice" placeholder="indice (categoria)" required>
            <input type="file" name="imagem" accept="image/*">
            <button type="submit">Publicar</button>
        </form>
        <?php 
            if(isset($CERTO)){
                echo "Postado";
            }
        ?>
    </div>

    
</body>
</html>