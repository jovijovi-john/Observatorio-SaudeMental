<section class="container">
    <div class="section-header"> <!-- para mudar a cor é so acessar essa classe em style.css -->
      <h2>Notícias</h2>
    </div>
    <div class="line-purple"></div>
       <?php
            mysqli_select_db($mysqli, $bd) or die("Could not select database");

            $query = "SELECT * FROM noticias";
            $result = mysqli_query($mysqli, $query);
            $num_results = mysqli_num_rows($result);

            if($num_results > 0) {
                for($i=0; $i<$num_results; $i++) {
                    $row = mysqli_fetch_array($result);
        ?>


    <!-- INICIO --> 
    <div class="line-gray"></div>
    <div class="card">
      <img src="./assets/noticias/<?php print_r(utf8_encode($row['Foto']))?>" alt="">
      <div class="details">
        <h1>Title: <?php print_r(utf8_encode($row['Titulo'])) ?></h1>
        <p>Description: <?php print_r(utf8_encode($row['Descricao'])) ?></p>
        <a href="?Noticia">Ver mais</a>
      </div>
    </div>
    <?php 
      }
    }
    ?>
    <!-- FIM -->