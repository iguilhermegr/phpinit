<?php $title = "Profile"; ?>

<?php include_once("../../includes/header.php"); ?>

<?php $profiles = Db::connection()->query("SELECT * FROM `profile`")->fetchAll(PDO::FETCH_ASSOC); ?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h1 class="text-center">Em breve...</h1>
    </div>
  </div>
</div>

<?php include_once("../../includes/footer.php"); ?>