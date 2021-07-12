<?php
	  require_once('conexao.php');
    $parametro = $_GET['Noticia'];

    if (!preg_match("/^\d+$/", $parametro)) {
      header('location: ListaNoticias.php');
    }

    mysqli_select_db($mysqli, $bd) or die("Could not select database");	
    $stmt = $mysqli->prepare('SELECT * FROM noticias WHERE idNoticia =  ?');
    $stmt->bind_param('i', $_GET['Noticia']);
    $stmt->execute();

    $result = $stmt->get_result();

    $row = $result->fetch_assoc();

    $num_results = mysqli_num_rows($result);
    if($num_results > 0 ){
?>

  <main>
    <section class="container">
      <div class="image">
        <img src="./assets/noticias/<?php print_r(utf8_encode($row['Foto'])) ?>" alt="">
      </div>
      <div class="texto-noticia">
        <h1><?php print_r(utf8_encode($row['Titulo'])) ?></h1>
        <p><?php print_r(utf8_encode($row['Texto'])) ?> </p>
      </div>
    </section>
  </main>

 <?php
}else{
	header("location: ListaNoticias.php");
	die();
	}
?>
