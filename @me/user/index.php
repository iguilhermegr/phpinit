<?php $title = "User"; ?>

<?php include_once("../../includes/header.php"); ?>

<?php $users = Db::connection()->query("SELECT * FROM `user`")->fetchAll(PDO::FETCH_ASSOC); ?>
<?php $profiles = Db::connection()->query("SELECT * FROM `profile`")->fetchAll(PDO::FETCH_ASSOC); ?>
<?php $professions = Db::connection()->query("SELECT * FROM `profession`")->fetchAll(PDO::FETCH_ASSOC); ?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h1 class="text-center">Usuários</h1>
    </div>
    <div class="col-md-12">
      <form action="../../exes/register/create.php" method="post">
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
          <div class="col-md-12">
            <div class="input-group">
              <div class="input-group-pprend">
                <div class="positition-relative ">
                  <button type="button" class="btn btn-success btn-lg position-fixed top-50 start-50 translate-middle" style="margin-top: 35px; top: 10%!important;" type="submit" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Novo usuário
                  </button>
                </div>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Novo Usuário</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form action="../../exes/register/create.php" method="post">
                          <div class="mb-3">
                            <label for="name" class="form-label">Nome</label>
                            <input placeholder="Nome para a nova conta de usuário" type="text" class="form-control" id="name" name="name" required>
                          </div>
                          <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input placeholder="Email para login" type="email" class="form-control" id="email" name="email" required>
                          </div>
                          <br>
                          <div class="mb-3">
                            <h5>Abaixo informe o perfil e a profissão do novo usuário</h5>
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
                        </form>
                      </div>
                    </div>
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
      <table class="table table-sm table-striped table-bordered">
        <thead>
          <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Perfil</th>
            <th>Profissão</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($users as $user) { ?>
            <tr>
              <td><?php echo $user['id']; ?></td>
              <td><?php echo $user['name']; ?></td>
              <td><?php echo $user['email']; ?></td>
              <td><?php echo $user['profile_id']; ?></td>
              <td><?php echo $user['profession_id']; ?></td>
              <td>
                <a class="link-offset-1" href="edit.php?id=<?php echo $user['id']; ?>">Editar</a>
                <a class="link-offset-1" href="#" data-bs-toggle="modal" data-bs-target="#excluir-<?php echo $user['id']; ?>">Excluir</a>

                <div class="modal fade" id="excluir-<?php echo $user['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Excluir usuário</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        Deseja mesmo excluir este usuário?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <a class="btn btn-success" href="../../exes/register/delete.php?id=<?php echo $user['id']; ?>">Confirmar</a>
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

<?php include_once("../../includes/footer.php"); ?>