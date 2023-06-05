<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
  <title>Panel | <?php echo $title; ?></title>
</head>

<body style="position:absolute; z-index:11; height: 100%; width: 100%;">
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="/project"><img src="../../imgs/layout.png" style="width: 40px; height: 40px;"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon">≡</span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="../profile">perfis</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../profession/">profissões</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../user/">usuários</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>


  <?php require_once("../../database/connection.php"); ?>