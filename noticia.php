<?php
	require_once('conexao.php');
            mysqli_select_db($mysqli, $bd) or die("Could not select database");	
            $stmt = $mysqli->prepare('SELECT * FROM noticias WHERE idNoticia =  ?');
            $stmt->bind_param('i', $_GET['Noticia']);
            $stmt->execute();

            $result = $stmt->get_result();

            $row = $result->fetch_assoc();

?>

  <main>
    <section class="container">
      <div class="image">
        <img src="./assets/noticias/<?php print_r(utf8_encode($row['Foto'])) ?>" alt="">
        <p>Mão com pílulas e remédios</p>
        <span>Crédito Imagem</span>
      </div>
      <div class="texto-noticia">
        <h1><?php print_r(utf8_encode($row['Titulo'])) ?></h1>
        <p><?php print_r(utf8_encode($row['Texto'])) ?> </p>
      </div>
    </section>
  </main>