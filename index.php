<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
  <title>Início em PHP</title>
</head>

<body style="position:absolute; z-index:11; height: 100%; width: 100%;">
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="/project"><img src="imgs/layout.png" style="width: 40px; height: 40px;"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="/project">Início</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="@me/profile">Perfis</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="@me/profession/">Profissões</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="@me/user/">Usuários</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <br>
  <h1 class="text-center">Início em PHP</h1>
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <h2 class="underline text-light text-center">Seja bem vindo ao painel de controle de um projeto básico em PHP</h2>
  <form method="POST" action="exes/login/login.php">
    <div class="row position-absolute top-50 start-50 translate-middle" style="margin: 0;">
      <div class="col-md-12">
        <label>E-mail:</label>
        <input type="email" name="email" id="email"><br>
      </div>
      <div class="col-md-12">
        <label>Senha:</label>
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