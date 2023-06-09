<?php $title = "User"; ?>

<?php include_once("../../includes/header.php"); ?>

<?php $profiles = Db::connection()->query("SELECT * FROM `profile`")->fetchAll(PDO::FETCH_ASSOC); ?>
<?php $professions = Db::connection()->query("SELECT * FROM `profession`")->fetchAll(PDO::FETCH_ASSOC); ?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h1 class="text-center">Usuários</h1>
    </div>
    <div class="col-md-12">
      <button type="button" class="btn btn-success btn-lg position-absolute start-50 translate-middle" style="margin-top: 30px;" type="submit" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Novo usuário
      </button>
    </div>
    <div class="col-md-12">
      <form action="../../exes/user/create.php" method="post">
        <div class="row">
          <?php if (isset($_GET["error"])) { ?>
            <br><br><br><br>
            <div class="col-md-12">
              <br><br><br>
              <div class="alert alert-danger" role="alert">
                <?php echo $_GET["error"]; ?>
              </div>
            </div>
          <?php } ?>
          <?php if (isset($_GET["success"])) { ?>
            <br><br><br><br>
            <div class="col-md-12">
              <br><br><br>
              <div class="alert alert-success" role="alert">
                <?php echo $_GET["success"]; ?>
              </div>
            </div>
          <?php } ?>

          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Novo Usuário</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input placeholder="Digite o nome para a nova conta de usuário" type="text" class="form-control" id="name" name="name">
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input placeholder="Digite o email para o cadastro" type="email" class="form-control" id="email" name="email">
                  </div>
                  <div class="mb-3">
                    <label for="profile_id" class="form-label">Perfil</label>
                    <select class="form-select" name="profile_id">
                      <option value="">Selecione o perfil</option>
                      <?php foreach ($profiles as $profile) { ?>
                        <option value="<?php echo $profile['id']; ?>">
                          <?php echo $profile['name']; ?>
                        </option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="profession_id" class="form-label">Profissão</label>
                    <select class="form-select" name="profession_id">
                      <option value="">Selecione a profissão</option>
                      <?php foreach ($professions as $profession) { ?>
                        <option value="<?php echo $profession['id']; ?>">
                          <?php echo $profession['name']; ?>
                        </option>
                      <?php } ?>
                    </select>
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
      </form>
    </div>
    <br><br><br>
    <div class="col-md-12">
      <div class="table-responsive">
        <table class="table table-sm table-striped table-bordered">
          <thead>
            <tr>
              <th>Nome</th>
              <th>Email</th>
              <th>Perfil</th>
              <th>Profissão</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $users = Db::connection()
              ->query("SELECT
                        `user`.*,
                        `profile`.`name` AS `profile_name`,
                        `profession`.`name` AS `profession_name`
                      FROM
                        `user`
                      INNER JOIN `profile` ON `profile`.`id` = `user`.`profile_id`
                      INNER JOIN `profession` ON `profession`.`id` = `user`.`profession_id`
                    ")->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <?php foreach ($users as $user) { ?>
              <tr>
                <td><?php echo $user['name']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td><?php echo $user['profile_name']; ?></td>
                <td><?php echo $user['profession_name']; ?></td>
                <td>
                  <a class="btn btn-sm btn-primary" href="edit.php?id=<?php echo $user['id']; ?>">Editar</a>
                  <a class="btn btn-sm btn-danger" href="#" data-bs-toggle="modal" data-bs-target="#excluir-<?php echo $user['id']; ?>">Excluir</a>
                  <!-- Modal para a exclusão de usuário -->
                  <div class="modal fade" id="excluir-<?php echo $user['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Excluir usuário</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">Deseja mesmo excluir este usuário?</div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                          <a class="btn btn-success" href="../../exes/user/delete.php?id=<?php echo $user['id']; ?>">Confirmar</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
      </div>
</div>

<?php include_once("../../includes/footer.php"); ?>