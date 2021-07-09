  <?php
    require_once('conexao.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Observatório Saúde Mental</title>

  <link rel="icon" href="./assets/images/LogoObservatorio2.png">
  
  <link rel="stylesheet" href="./styles/trabalhos_publicados.css">
  <link rel="stylesheet" href="./styles/styles.css">

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head>
<body>
  <?php
    include('header.php');
  ?>
  <main>
    <div class="section-header"> <!-- para mudar a cor é so acessar essa clase em style.css -->
      <h2>Trabalhos Publicados</h2>
    </div>
    
    <section class="container">
    <form action="busca.php" class="filtro" method="GET">
      <div class="publication">
        <label for="publication">Publicação</label>
        <input name="publication" type="text" placeholder="Saúde Mental...">
      </div>
      <div class="author">
        <label for="author">Autor</label>
        <input name="author" type="text" placeholder="Guilherme...">
      </div>
      <div class="keyword">
        <label for="keyword">Palavra-chave</label>
        <input name="keyword" type="text" placeholder="cuidado...">
      </div>
      <div class="type">
        <label for="type">Tipo</label>
        <select name="type" id="Artigo">
          <option value="Tipo" disabled>Tipo</option>
          <option value="Artigo">Artigo</option>
          <option value="TCC Graduação">TCC Graduação</option>
          <option value="TCC Especialização">TCC Especialização</option>
          <option value="Dissertação Mestrado">Dissertação Mestrado</option>
          <option value="Tese Doutorado">Tese Doutorado</option>
          <option value="Livro">Livro</option>
          <option value="Capítulo de Livro">Capítulo de Livro</option>
          <option value="Produção Técnica">Produção Técnica</option>
          <option value="Documentos Institucionais">Documentos Institucionais</option>
        </select>
      </div>
      <div class="search">
        <label for="search-button">Buscar</label>
        <button name="search-button" class="search-button"><img src="./assets/svg/search.svg" alt=""></button>
      </div>
    </form>
      <!-- START  -->
      
    <section id="paginate">
    <ul class="list" style="list-style: none;">  <!-- lista com cada li e cada li tem a box dentro-->
       <?php
            mysqli_select_db($mysqli, $bd) or die("Could not select database");

            $query = "SELECT * FROM trabalhos_publicados";
            $result = mysqli_query($mysqli, $query);
            $num_results = mysqli_num_rows($result);

            if($num_results > 0) {
                for($i=0; $i<$num_results; $i++) {
                    $row = mysqli_fetch_array($result);
        ?>

        <!-- inicio -->
      <li class="item">
    <div class="line-purple"></div>
    <div class="card1">
      <div class="details">
        <div class="data-name">
          <p class="data"><?php print_r(utf8_encode($row['Data'])) ?></p>
          <h5 class="article-name">
           <?php print_r(utf8_encode($row['Titulo']))?>
          </h5>
        </div>
        <div class="share">
          <p class="type">Compartilhe <br> a publicação</p>
          <div class="links">
            <a href=""><img src="./assets/svg/twitter icon.svg" alt=""></a>
            <a href=""><img src="./assets/svg/facebook icon.svg" alt=""></a>
            <a href=""><img src="./assets/svg/twitter icon.svg" alt=""></a>
            <a href=""><img src="./assets/svg/facebook icon.svg" alt=""></a>
          </div>
        </div>
        <div class="authors">
          <p class="authors-names">Autores</p>
          <ul class="list-authors">
            <li class="item-author-name">Guilherme Barroso Langoni de Freitas</li>
            <li class="item-author-name">Guilherme Augusto G. Martins</li>
          </ul>
        </div>
      </div>
      <div class="panel">
        <div class="resume">
          <p class="resume-title">Resumo</p>
          <p class="resume-text">
            <?php print_r(utf8_encode($row['Resumo']))?>
          </p>
        </div>
        <p class="tags-title">Palavras-chave</p>
        <div class="tags">
          <ul class="list-tags">
            <li class="item-tag">Cuidado</li>
            <li class="item-tag">Saúde Mental</li>
            <li class="item-tag">Saúde Pública</li>
          </ul>
        </div>
      </div>
      <button class="button-show-more">Ver mais</button>
      <!-- fim -->
    <?php
      }
    }
    ?>
        </ul>
      </section>

      <div class="pagination"> <!-- botões -->
        <div class="prev">
          <span class="material-icons">
            navigate_before
          </span>
        </div>
        <div class="numbers">
          <div>1</div>
          <div>2</div>
          <div>3</div>
        </div>
        <div" class="next">
          <span class="material-icons">
            navigate_next
          </span>
        </div>
      </div>
    </section>
  </main>

  <?php
    include('footer.php');
  ?>
  <script src="./scripts/script.js"></script>
  <script src="./scripts/pagination.js"></script>
  <script src="./scripts/trab_publicados.js"></script>

  <script type="text/javascript">
   function cite(str) {
    // Create new element
   var el = document.createElement('textarea');
   // Set value (string to be copied)
   el.value = str;
   // Set non-editable to avoid focus and move outside of view
   el.setAttribute('readonly', '');
   el.style = {position: 'absolute', left: '-9999px'};
   document.body.appendChild(el);
   // Select text inside element
   el.select();
   // Copy text to clipboard
   document.execCommand('copy');
   // Remove temporary element
   document.body.removeChild(el);
   alert('Citação copiada para área de transferêcia');
}
  </script>

</body>
</html>