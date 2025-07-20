<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Diario</title>
</head>
<body>
    <h1>
    <?php
        $nome = "Renan";
        $sobrenome = "Teles de Oliveira";
    ?>
    </h1>
    <div class="corpo">
        <p>BEM VINDO AO MEU BLOG</p>
    </div>
    <div class="login">
        <h2>Login</h2>
    </div>

<div class="form">
    <form method="post" action="">
        <button class="buton" type="submit" name="sobre">Sobre o criador</button>
    </form>
</div>

<?php 
    if(isset($_POST['sobre'])){
        echo "<div class='overlay'></div>";
        echo "<div class='criador'>";
        echo "<div class='formatacao'><p>Criador: $nome $sobrenome</p>";
        echo "<p>Email: renantelesdeoliveira@gmail.com</p>";
        echo "<p>Graduação: Cursando Análise e desenvolvimento de sistemas na Universidade Federal do Paraná</p></div>";
        echo "<hr>";
        echo "<div class= formatacao_2>";
        echo "<h1 class='alinhamento'>Quando tudo começou?</h1>";
        echo "<img src='../imagens/renan01.jpg' alt='foto de renan' width='300px'>";
        echo "<p>Essa foto foi logo no ensino médio, primeiro ano em tecnico em administração, foi um bom ano,
         conheci pessoas incriveis, lá consegui me desenvolver técnicamente e criar muito network, 
         os professores sempre incentivando o fazer faculdade ou algo relacionado.</p>";
        echo "<p>Nessa epoca eu não sabia qual formação eu queria escolher, porem já sabia que
        gostava de tecnologia. </p></div>";
        echo '<a href="pagina2.php" class="botao-link">Clique aqui para saber mais</a>';
        echo '<a href="../php/index.php" class="botao-link">Voltar ao menu inicial</a>';
        echo "</div>";
    }
?>
</body>
</html>