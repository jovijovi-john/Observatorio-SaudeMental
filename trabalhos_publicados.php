  <?php
    require_once('conexao.php');
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

  <link rel="stylesheet"
          href=
"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="./styles/styles.css">
  <link rel="stylesheet" href="./styles/trabalhos_publicados.css">
</head>
<body>

  <header>
    <div class="logos">
      <a href="./index.html"><img src="./assets/images/LogoObservatorio2.png" alt="Logo Dexters" class="dexters-logo"></a>
      <div class="divider"></div>
      <a href="https://portalpadrao.ufma.br/site" target="_blank"><img src="./assets/images/logo-uva-sem-texto.png" alt="Logo UVA" class="ufma-logo"></a>
    </div>
    <nav id="nav-bar" class="overlay">
      <img src="./assets/svg/close-24px.svg" alt="" class="close-btn" onclick="closeMenu()">
      <div class="overlay-content">
        <ul>
          <li>
            <button>
              <a href="./index.html">Início</a>
            </button>
          </li>
          <li>
            <button>
              <a href="./trabalhos_publicados.php">Trabalhos Publicados</a>
            </button>
          </li>
          <li>
            <button>
              <a href="./submeter_obra.html">Como submeter uma obra?</a>
            </button>
          </li>
          <li>
            <button>
              <a href="./sobre.html">Sobre nós</a>
            </button>
          </li>
        </ul>
      </div>
    </nav>
    <img src="./assets/svg/menu-24px.svg" alt="" class="open-btn" onclick="openMenu()">
  </header>

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
	  </form>
        </summary>
        <form class="filtro">
          <div class="author">
            <h5>Filtrar por Autor: </h5>
            <input type="text" placeholder="Autor">
          </div>
          <div class="author">
            <h5>Filtrar por Data: </h5>
            <input type="date" placeholder=>
          </div>
          <div class="author">
            <h5>Palavra-chave: </h5>
            <input type="text" placeholder="Palavra-chave">
          </div>
          <div class="author">
            <h5>Tipo: </h5>
            <select name="" id="">
              <option value="">Tipo</option>
              <option value="">Artigo</option>
              <option value="">TCC Graduação</option>
              <option value="">TCC Especialização</option>
              <option value="">Dissertação Mestrado</option>
              <option value="">Tese Doutorado</option>
              <option value="">Livro</option>
              <option value="">Capítulo de Livro</option>
              <option value="">Produção Técnica</option>
              <option value="">Documentos Institucionais</option>
            </select>
          </div>
          <button class="btn-filter">
            <span class="material-icons">
              filter_alt
            </span>
          </button>
        </form>
      </details>
      <!-- START  -->
       <?php
            mysqli_select_db($mysqli, $bd) or die("Could not select database");

            $query = "SELECT * FROM trabalhos_publicados";
            $result = mysqli_query($mysqli, $query);
            $num_results = mysqli_num_rows($result);

            if($num_results > 0) {
                for($i=0; $i<$num_results; $i++) {
                    $row = mysqli_fetch_array($result);
        ?>
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
                <button onclick='cite(`<?php print_r(utf8_encode($row['cite_abnt']))?>`)'>ABNT</button>
                <button onclick='cite(`<?php print_r(utf8_encode($row['cite_apa']))?>`)'>APA</button>
                <button onclick='cite(`<?php print_r(utf8_encode($row['cite_vancouver']))?>`)'>VANCOUVER</button>
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
      <!-- END -->
    <?php
      }
    }
    ?>
    </section>
      
  </main>

<footer>
    <div class="container">
      <div class="logos">
        <a href="./index.html"><img src="./assets/images/LogoObservatórioBranca.png" alt=""></a>
        <div class="logos-secundarias">
          <a href="http://saude.sobral.ce.gov.br/politicas-sobre-drogas"><img src="./assets/images/logo-coord-psds.png" alt=""></a>
          <a href=""><img src="./assets/images/logo-gesam-sem-fundo.png" alt=""></a>
          <a href="http://www.sobral.ce.gov.br"><img src="./assets/images/logo-sobral.png" alt=""></a>
          <a href="http://www.uvanet.br"><img src="./assets/images/logo-uva-sem-texto.png" alt=""></a>
        </div>
      </div>
      <div class="infos">
        <ul>
          <li><img src="./assets/svg/email icon.svg" alt=""><p>atendimento@observatoriodesaudemental.com.br</p></li>
          <li><img src="./assets/svg/email icon.svg" alt=""><p>cpdsobral2017@gmail.com</p></li>
        </ul>
      </div>
      <div class="sociais">
        <ul>
          <li><img src="./assets/svg/instagram icon.svg" alt=""><a href="/" target="_blank">@Observatório</a></li>
          <li><img src="./assets/svg/twitter icon.svg" alt="""><a href="/" target="_blank">@Observatório</a></li>
        </ul>
      </div>
      <div class="contato">
        <img src="./assets/svg/comment icon.svg" alt=""><a href="./contato.html">Fale Conosco</a>
      </div>
    </div>
  </footer>
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