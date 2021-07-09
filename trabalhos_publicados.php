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
      <li class="item">
      <!-- <details>
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
      </details> -->
    <div class="line-purple"></div>
    <div class="card1">
      <div class="details">
        <div class="data-name">
          <p class="data">2021-01-01</p>
          <h5 class="article-name">
            Saúde Mental: Desafios da Prevenção, Diagnóstico, Tratamento e Cuidado na Sociedade Moderna
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
            Sem Saúde Mental desde os primórdios tem despertado o interesse e questionamentos da humanidade. Em sua essência recebe a definição atribuída pela Organização Mundial de Saúde como sendo aquele estado de bem-estar no qual o indivíduo consegue perceber suas habilidades, administrar os estresses do dia a dia e trabalhar de forma produtiva contribuindo para a sociedade. Para uma efetiva atenção em saúde mental se faz necessário o empenho de uma equipe multi e interdisciplinar, que atenda ao indivíduo, família e comunidade em sua integralidade, seja na esfera pública ou privada. Ademais, as políticas de saúde devem garantir a prevenção e o tratamento dos agravos de ordem psíquica dentro das condições mais humanizadoras possíveis. Sabe-se que a dor e o sofrimento das pessoas acometidas é real e impacta familiares, amigos e a sociedade. O sofrimento mental tem ganhado notoriedade na atualidade pelo crescente número de pessoas em adoecimento frente à atual crise sanitária e econômica imposta pela infecção do Coronavírus SARS-CoV-2, configurando-se como um preocupante problema de saúde pública. Contudo, essas questões da mente não são novas, inclusive, dados apontam o Brasil como o país mais ansioso do mundo. Nessa perspectiva, devemos ampliar mais a discussão sobre a Saúde Mental, disciplina tão relevante para a saúde global do ser humano. Frente a esses elementos, resolvemos dedicar este livro específico para a divulgação de estudos sobre a temática, a fim de contribuir para a ampliação dos conhecimentos, dirimir dúvidas, reduzir preconceitos e estigmas que circundam o tema. Acreditamos que, além de um veículo de divulgação de pesquisas, poderá incitar a reflexão crítica dos leitores sobre as questões abordadas, bem como estimular novas investigações.
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
      <div class="line-gray"></div>
      <div class="card1">
        <div class="details">
          <div class="data-name">
            <p class="data">2021-01-01</p>
            <h5 class="article-name">
              Saúde Mental: Desafios da Prevenção, Diagnóstico, Tratamento e Cuidado na Sociedade Moderna
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
              Sem Saúde Mental desde os primórdios tem despertado o interesse e questionamentos da humanidade. Em sua essência recebe a definição atribuída pela Organização Mundial de Saúde como sendo aquele estado de bem-estar no qual o indivíduo consegue perceber suas habilidades, administrar os estresses do dia a dia e trabalhar de forma produtiva contribuindo para a sociedade. Para uma efetiva atenção em saúde mental se faz necessário o empenho de uma equipe multi e interdisciplinar, que atenda ao indivíduo, família e comunidade em sua integralidade, seja na esfera pública ou privada. Ademais, as políticas de saúde devem garantir a prevenção e o tratamento dos agravos de ordem psíquica dentro das condições mais humanizadoras possíveis. Sabe-se que a dor e o sofrimento das pessoas acometidas é real e impacta familiares, amigos e a sociedade. O sofrimento mental tem ganhado notoriedade na atualidade pelo crescente número de pessoas em adoecimento frente à atual crise sanitária e econômica imposta pela infecção do Coronavírus SARS-CoV-2, configurando-se como um preocupante problema de saúde pública. Contudo, essas questões da mente não são novas, inclusive, dados apontam o Brasil como o país mais ansioso do mundo. Nessa perspectiva, devemos ampliar mais a discussão sobre a Saúde Mental, disciplina tão relevante para a saúde global do ser humano. Frente a esses elementos, resolvemos dedicar este livro específico para a divulgação de estudos sobre a temática, a fim de contribuir para a ampliação dos conhecimentos, dirimir dúvidas, reduzir preconceitos e estigmas que circundam o tema. Acreditamos que, além de um veículo de divulgação de pesquisas, poderá incitar a reflexão crítica dos leitores sobre as questões abordadas, bem como estimular novas investigações.
            </p>
          </div>
          <p class="tags-title">Palavras-chave</p>
          <div class="tags">
            <ul class="list-tags">
              <li class="item-tag">Cuidado</li>
              <li class="item-tag">Saúde Mental</li>
              <li class="item-tag">Saúde Pública</li>
            </ul>
            <a href="/" class="download-btn">Download</a>
          </div>
        </div>
        <button class="button-show-more">Ver mais</button>
        <div class="line-gray"></div>
      </li>
      <!-- END -->
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