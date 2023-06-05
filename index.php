<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
  <title>Início em PHP</title>
</head>

<body style="background-color: #24273a; position:absolute; z-index:11; height: 100%; width: 100%;">
  <br>
  <h1 class="text-center text-light">Início em PHP</h1>
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <h2 class="underline text-light text-center">Seja bem vindo ao painel de controle de um projeto básico em PHP</h2>
  <form method="POST" action="exes/login/login.php">
    <div class="row position-absolute top-50 start-50 translate-middle" style="margin: 0;">
      <div class="col-md-12">
        <label class="text-light">E-mail:</label>
        <input type="email" name="email" id="email"><br>
      </div>
      <div class="col-md-12">
        <label class="text-light">Senha:</label>
        <input type="password" name="password" id="password"><br>
      </div>
      <div class="col-md-12">
        <buttonc class="btn btn-primary" type="submit">Entrar</buttonc>
      </div>
    </div>
  </form>

    <footer style="position: absolute; bottom: 0; width: 100%; align-items: center; height: 10vh; padding: 0; margin: 0;" class="bg-dark">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <blockquote>
              <p style="padding-top: 30px;" class="text-center text-white fs-9">Feito por Guilherme Ribeiro (GR) - Um painel de gerenciamento de usuários</p>
            </blockquote>
          </div>
        </div>
      </div>
    </footer>

</body>

</html>