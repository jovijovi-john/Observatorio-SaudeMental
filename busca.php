<?php
    require_once('conexao.php');

    if(isset($_GET['pesquisa'])){
      $pesquisa = "%".trim($_GET['pesquisa'])."%";
    }else{
      $pesquisa = null;
    }

    if(isset($_GET['autor'])){
      $autor = "%".trim($_GET['autor'])."%";
    }else{
      $autor = null;
    }

    if(isset($_GET['data'])){
      $data = $_GET['data'];
    }else{
      $data = null;
    }

    if(isset($_GET['palavra-chave'])){
      $palavra_chave = "%".trim($_GET['palavra-chave'])."%";
    }else{
      $palavra_chave = null;
    }

    if(isset($_GET['selection_tipo'])){
      $tipo = "%".trim($_GET['selection_tipo'])."%";
    }else{
      $tipo = null;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Observatório</title>

  <link rel="icon" href="./assets/images/LogoObservatorio.png">

  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="./styles/styles.css">
  <link rel="stylesheet" href="./styles/trabalhos_publicados.css">
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
      <details>
        <summary>
          <form action="busca.php" method="GET">
          <div class="header">
              <input type="search" name="pesquisa" id="" placeholder="Pesquisa">
              <div class="btn-pesquisas">
                <button>
                  <span class="material-icons">
                    search
                  </span>
                </button>
                <span class="material-icons">
                  manage_search
                </span>
              </div>
          </div>
        </summary>
        <div class="filtro">
          <div class="author">
            <h5>Filtrar por Autor: </h5>
            <input type="text" name="autor" placeholder="Autor">
          </div>
          <div class="author">
            <h5>Filtrar por Data: </h5>
            <input type="date" name="data" placeholder=>
          </div>
          <div class="author">
            <h5>Palavra-chave: </h5>
            <input type="text" name="palavra-chave" placeholder="Palavra-chave">
          </div>
          <div class="author">  
            <h5>Tipo: </h5>
            <select name="selection_tipo" id="" value="Tipo">
              <option value="Tipo">Tipo</option>
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
          <button class="btn-filter">
            <span class="material-icons">
              filter_alt
            </span>
          </button>
          </div>
        </form>
      </details>
      <!-- START  -->
      
      <section id="paginate">
      <ul class="list" style="list-style: none;">  <!-- lista com cada li e cada li tem a box dentro-->
          <?php
              mysqli_select_db($mysqli, $bd) or die("Could not select database");
  
              $query = "SELECT * FROM trabalhos_publicados as tp 
                        INNER JOIN pesquisa as p on tp.id_trabalho=p.id_trabalho 
                        GROUP BY tp.id_trabalho
                        HAVING (p.palavra_pesquisa LIKE '".$pesquisa."' OR tp.titulo LIKE '".$pesquisa."')";

              /*$query = "SELECT * FROM trabalhos_publicados as tp 
                          INNER JOIN pesquisa as p on tp.id_trabalho=p.id_trabalho 
                          WHERE (p.palavra_pesquisa LIKE '%a%' OR tp.titulo LIKE '%a%') 
                          and tp.id_trabalho IN 
                              (SELECT pc.id_trabalho from palavra_chave as pc 
                              WHERE pc.palavra_chave LIKE '%Pandemia%')" */

              if($autor!=null){
                $query = $query." and tp.autor LIKE '".$autor."'";
              }
              if($data!=null){
                $query = $query." and tp.data_publicacao > '".$data."'";
              }
              if($palavra_chave!=null){
                $query = $query." and tp.id_trabalho IN 
                                (SELECT pc.id_trabalho from palavra_chave as pc 
                                WHERE pc.palavra_chave LIKE '".$palavra_chave."')";
              }
              if($tipo!="%Tipo%"){
                $query = $query." and tp.tipo LIKE '".$tipo."'";  
              }

              $result = mysqli_query($mysqli, $query);
              $num_results = mysqli_num_rows($result);
  
              if($num_results > 0) {
                  for($i=0; $i<$num_results; $i++) {
                      $row = mysqli_fetch_array($result);
          ?>
        <li class="item">
        <details>
          <summary>
            <div class="nome">
              <?php print_r(utf8_encode($row['titulo']));?>
              <span>Detalhes</span>
            </div>
            <ul>
              <li><b>Autor: </b> <?php print_r(utf8_encode($row['autor']));?></li>
              <li><b>Tipo: </b> <?php print_r(utf8_encode($row['tipo']));?></li>
              <li><b>Data de Publicação: </b><?php print_r(utf8_encode($row['data_publicacao']));?></li>
              <li><b>Palavras-chaves: </b> 
                <?php
                  $queryKey = "SELECT palavra_chave FROM palavra_chave WHERE id_trabalho = ".$row['id_trabalho'];
                  $keywordsresult = mysqli_query($mysqli, $queryKey);
                  $num_results_KeysWord = mysqli_num_rows($keywordsresult);
        
                  if($num_results_KeysWord > 0){
                    for($j=0;$j<$num_results_KeysWord;$j++){
                      $rowKeys = mysqli_fetch_array($keywordsresult);
                      print_r(utf8_encode($rowKeys['palavra_chave']));
                      if($j != $num_results_KeysWord - 1){
                        print_r(", ");
                      }
                    }
                  }
                ?>
  
              </li>
            </ul>
          </summary>
          <div class="detalhes">
            <div class="resumo">
              <h3>Resumo</h3>
              <p><?php print_r(utf8_encode($row['res']));?></p>
            </div>
            <div class="share">
              <div class="citation">
                <h3>Cite</h3>
                <div class="btn-container">
                  <button onclick='cite(`<?php print_r($row['cite_abnt'])?>`)'>ABNT</button>
                  <button onclick='cite(`<?php print_r($row['cite_apa'])?>`)'>APA</button>
                  <button onclick='cite(`<?php print_r($row['cite_vancouver'])?>`)'>VANCOUVER</button>
                </div>
              </div>
              <div class="compartilhe">
                <h3>Compartilhe</h3>
                <div class="sociais">
                  <button><img src="./assets/svg/facebook icon.svg" alt=""></button>
                  <button><img src="./assets/svg/twitter icon.svg" alt=""></button>
                  <button><img src="./assets/svg/instagram icon.svg" alt=""></button>
                </div>
              </div>
            </div>
          </div>
        </details>
        </li>
        <!-- END -->
      <?php
        }
      }else{ ?>
      <li class="item">
        <div class="nome">
          <h3>Nenhum registro encontrado!</h3>
        </div>
      </div>
        <?php } ?>
          </ul>
        </section>
  
        <div class="pagination"> <!-- botões -->
          <div class="prev"><</div>
          <div class="numbers">
            <div>1</div>
            <div>2</div>
            <div>3</div>
          </div>
          <div" class="next">></div>
        </div>
      </section>
    </main>

    
  <?php 
    include('footer.php');
  ?>
  
  <script src="./scripts/script.js"></script>
  <script src="./scripts/pagination.js"></script>

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