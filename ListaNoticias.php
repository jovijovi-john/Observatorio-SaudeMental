  <?php
    require_once('conexao.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notícias</title>
  
  <link rel="stylesheet" href="./styles/noticias.css">
  <link rel="stylesheet" href="./styles/styles.css">

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

  <?php 
      if(!isset($_GET['Noticia'])){
        include('noticias.php');
      }else{
        include('noticia.php');
      }

  ?>
    
    <div class="line-gray"></div>
  </section>
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
</body>
<script src="./scripts/script.js"></script>
</html>