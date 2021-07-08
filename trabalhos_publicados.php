  <?php
    require_once('conexao.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  
  <link rel="stylesheet" href="./styles/trabalhos_publicados.css">
  <link rel="stylesheet" href="./styles/styles.css">

  <!-- <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet"> -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head>
<body>
  <header>
    <div class="logos">
      <a href="./index.html"><img src="./assets/images/LogoObservatorio2.png" alt="Logo Dexters" class="dexters-logo"></a>
      <div class="divider"></div>
      <a href="http://www.uvanet.br" target="_blank"><img src="./assets/images/logo-uva-sem-texto.png" alt="Logo UVA" class="ufma-logo"></a>
    </div>
    <nav id="nav-bar" class="overlay">
      <img src="./assets/svg/close-24px.svg" alt="" class="close-btn" onclick="closeMenu()">
      <div class="overlay-content">
        <ul>
          <li>
            <button>
              <a href="./index.php">Início</a>
            </button>
          </li>
          <li>
            <button>
              <a href="./trabalhos_publicados.php">Trabalhos Publicados</a>
            </button>
          </li>
          <li>
            <button>
              <a href="./ListaNoticias.php">Notícias</a>
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
    <form action="" class="filtro">
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
        <select name="type" id="">
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
      <div class="search">
        <label for="search-button">Buscar</label>
        <button name="search-button" class="search-button"><img src="./assets/svg/search_black_24dp.svg" alt=""></button>
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
      <li class="item">
      <details>
        <summary>
          <div class="nome">
           <?php print_r(utf8_encode($row['Titulo']));?>
            <span>Detalhes</span>
          </div>
          <ul>
            <li><b>Autor: </b> <?php print_r(utf8_encode($row['Autor']));?></li>
            <li><b>Tipo: </b> <?php print_r(utf8_encode($row['Tipo']));?></li>
            <li><b>Data de Publicação: </b><?php print_r(utf8_encode($row['Data']));?></li>
            <li><b>Palavras-chaves: <?php print_r(utf8_encode($row['Palavras_Chave'])) ?> </b></li>
          </ul>
        </summary>
        <div class="detalhes">
          <div class="resumo">
            <h3>Resumo</h3>
            <p><?php print_r(utf8_encode($row['Resumo']));?></p>
          </div>
          <div class="share">
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
    }
    ?>
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

  <footer>
    <div class="container">
      <div class="logos">
        <a href="./index.html"><img src="./assets/images/LogoObservatorioBranca.png" alt=""></a>
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
          <li><img src="./assets/svg/phone_black_24dp.svg" alt="">(88)993584258</li>
          <li><img src="./assets/svg/phone_black_24dp.svg" alt="">(88)36111164</li>
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