<?php include_once("header.php"); ?>

<?php $profiles = Db::connection()->query("SELECT * FROM `profile`")->fetchAll(PDO::FETCH_ASSOC); ?>

<div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>Edição de perfis</h1>
      </div>
      <div class="col-md-12">
        <form action="execute/profile/create.php" method="post">
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
                <input type="text" class="form-control" name="name" value="<?php echo $profile['nome']; ?>">
                <div class="input-group-pprend">
                  <button type="submit">SALVAR</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>  
  </div>  

<?php include_once("footer.php"); ?>