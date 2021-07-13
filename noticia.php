<?php
	require_once('conexao.php');
    $parametro = $_GET['Noticia'];

    for($i=0;$i < strlen($parametro);$i++){
    	if(!is_numeric($parametro[$i])){
    	    $URL="http://observatoriodesaudemental.com.br/v2/Observatorio-SaudeMental/ListaNoticias.php";
            echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
            echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
    	}
    }

    mysqli_select_db($mysqli, $bd) or die("Could not select database");	
    $stmt = $mysqli->prepare('SELECT * FROM noticias WHERE idNoticia =  ?');
    $stmt->bind_param('i', $parametro);
    $stmt->execute();
    $stmt->store_result();
    $num_of_rows = $stmt->num_rows;
    $stmt->bind_result($idNoticia, $Titulo, $Texto, $Descricao, $Foto);
    
    if($stmt->fetch()){

?>

  <main>
    <section class="container">
      <div class="image">
        <img src="./assets/noticias/<?php print_r(utf8_encode($Foto)) ?>" alt="">
      </div>
      <div class="texto-noticia">
        <h1><?php print_r(utf8_encode($Titulo)) ?></h1>
        <p><?php print_r($Texto) ?> </p>
      </div>
    </section>
  </main>

<?php
}else{
    $URL="http://observatoriodesaudemental.com.br/v2/Observatorio-SaudeMental/ListaNoticias.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
}
?>

