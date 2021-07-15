<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Observatório Saúde Mental</title>
  
  <link rel="icon" href="./assets/images/LogoObservatorio2.png">
  
  <link rel="stylesheet" href="./styles/contato.css">
  <link rel="stylesheet" href="./styles/styles.css">

  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head>
<body>
  
  <?php
    include('header.php');
  ?>

  <main class="fade">
    <section id="envio-mensagem">
      <div class="section-header">
        <h2>contato</h2>
      </div>

      <div class="mensagem">
        <div class="nome">
          <input type="name" name="nome" id="" placeholder="Nome:*" class="nome">
        </div>
        <div class="telefone-email">
          <input type="email" name="email" id="" placeholder="Email:*" class="email">
          <input type="phone" name="telefone" id="" placeholder="Telefone:*" class="telefone">
        </div>
        <div class="texto-mensagem">
          <input type="text" name="mensagem" id="" placeholder="Mensagem" class="input-mensagem">
        </div>
      </div>
    </section>
    <button type="submit">Enviar</button>
  </main>
  
  <?php
    include('footer.php');
  ?>
  
  <script src="./scripts/script.js"></script>
</body>
</html>