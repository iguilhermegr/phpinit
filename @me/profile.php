<?php include_once("../includes/head.php"); ?>
  <title>Panel | Profile</title>
</head>
<body>

  <?php include_once("../includes/header.php"); ?>

  <?php $profiles = Db::connection()->query("SELECT * FROM `profile`")->fetchAll(PDO::FETCH_ASSOC); ?>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>Perfis</h1>
      </div>
      <div class="col-md-12">
        <form action="../exes/profile/create.php" method="post">
          <div class="row">
            <?php if(isset($_GET["error"])) { ?>
              <div class="col-md-12">
                <div class="alert alert-danger" role="alert">
                  <?php echo $_GET["error"]; ?>
                </div>
              </div>
            <?php } ?>
            <?php if(isset($_GET["success"])) { ?>
              <div class="col-md-12">
                <div class="alert alert-success" role="alert">
                  <?php echo $_GET["success"]; ?>
                </div>
              </div>
            <?php } ?>
            <div class="col-md-12">
              <div class="input-group">
                <input type="text" class="form-control" name="name">
                <div class="input-group-pprend">
                  <button type="submit">SALVAR</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="col-md-12">
        <table class="table table-sm table-striped table-bordered">
          <thead>
            <tr>
              <th>Código</th>
              <th>Nome</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
              <?php foreach ($profiles as $profile) { ?>
                <tr>
                  <td><?php echo $profile['id']; ?></td>
                  <td><?php echo $profile['name']; ?></td>
                  <td>
                    <a href="edit-profile.php?id=<?php echo $profile['id']; ?>">Editar</a>
                    <a href="../exes/profile/delete.php?id=<?php echo $profile['id']; ?>">Excluir</a>
                  </td>
                </tr>
              <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

<?php include_once("../includes/footer.php"); ?>