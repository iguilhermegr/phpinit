<?php $title = "Profission Edit"; ?>

<?php include_once("../../includes/header.php"); ?>
<section><a href="./" style="margin-top: 30px; margin-left: 400px;" class="d-inline-flex p-2 btn btn-secondary btn-sm fs-9 mb-3">← VOLTAR</a></section>

<?php
$id = isset($_GET["id"]) && $_GET["id"] ? $_GET["id"] : NULL;

$stmt = Db::connection()->prepare("SELECT * FROM `profession` WHERE `id` = :id");
$stmt->bindParam(":id", $id, PDO::PARAM_INT);
$stmt->execute();
$profession = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h1>Editar nome da profissão</h1>
    </div>
    <?php if (!$profession) { ?>
      <h1>Profissão não encontrada!</h1>
    <?php } else { ?>
      <div class="col-md-12">
        <form action="../../exes/profession/update.php" method="post">
          <input type="hidden" name="id" value="<?php echo $id; ?>">
          <div class="row">
            <?php if (isset($_GET["error"])) { ?>
              <div class="col-md-12">
                <div class="alert alert-danger" role="alert">
                  <?php echo $_GET["error"]; ?>
                </div>
              </div>
            <?php } ?>
            <?php if (isset($_GET["success"])) { ?>
              <div class="col-md-12">
                <div class="alert alert-success" role="alert">
                  <?php
                  header("Location: ../../@me/profession?success=📝 Profissão atualizada com sucesso");
                  exit();
                  ?>
                </div>
              </div>
            <?php } ?>
            <div class="col-md-12">
              <div class="input-group">
                <input style="margin-right: 10px;" type="text" class="form-control" name="name" value="<?php echo $profession['name']; ?>">

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  Salvar
                </button>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmação</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        Deseja mesmo salvar essas alterações?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-success">Confirmar</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    <?php } ?>
  </div>
</div>

<?php include_once("../../includes/footer.php"); ?>