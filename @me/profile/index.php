 <?php $title = "Profile"; ?>

 <?php include_once("../../includes/header.php"); ?>

 <?php $profiles = Db::connection()->query("SELECT * FROM `profile`")->fetchAll(PDO::FETCH_ASSOC); ?>

 <div class="container">
  <div class="row">
    <div class="col-md-12">
      <h1 class="text-center">Perfis</h1>
    </div>
    <div class="col-md-12">
      <button type="button" class="btn btn-success btn-lg position-absolute start-50 translate-middle" style="margin-top: 30px;" type="submit" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Novo perfil
      </button>
    </div>
    <div class="col-md-12">
      <form action="../../exes/profile/create.php" method="post">
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
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Novo Perfil</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <label for="name" class="form-label">Nome</label>
                  <input placeholder="Digite o nome de perfil personalizado" style="margin-right: 10px;" type="text" class="form-control" name="name">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                  <button type="submit" class="btn btn-success">Confirmar</button>
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
             <th>Ações</th>
           </tr>
         </thead>
         <tbody>
           <?php foreach ($profiles as $profile) { ?>
             <tr>
               <td><?php echo $profile['id']; ?></td>
               <td><?php echo $profile['name']; ?></td>
               <td>
                 <a class="btn btn-sm btn-primary" href="edit.php?id=<?php echo $profile['id']; ?>">Editar</a>
                 <a class="btn btn-sm btn-danger" href="#" data-bs-toggle="modal" data-bs-target="#excluir-<?php echo $profile['id']; ?>">Excluir</a>

                 <div class="modal fade" id="excluir-<?php echo $profile['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                   <div class="modal-dialog">
                     <div class="modal-content">
                       <div class="modal-header">
                         <h1 class="modal-title fs-5" id="exampleModalLabel">Excluir perfil</h1>
                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                       </div>
                       <div class="modal-body">
                         Deseja mesmo excluir esse perfil?
                       </div>
                       <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                         <a class="btn btn-success" href="../../exes/profile/delete.php?id=<?php echo $profile['id']; ?>">Confirmar</a>
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