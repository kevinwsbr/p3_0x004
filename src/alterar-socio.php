<?php

require_once 'configs/Autoload.php';

$utils->protectPage();

$supporter = new Supporter($db);
$sup = $supporter->getData();
$supporter->update();

?>

<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

  <title>Alterar Sócio | iSoccer</title>
</head>

<body>
  <?php require_once 'components/header.php'; ?>
  <div class="container">
      <div class="row">
          <div class="col">
              <h3>Alterar Sócio</h3>
              <hr/>
          </div>
      </div>
      <div class="row">

          <div class="col">
              <form action="alterar-socio.php?id=<?=$sup['ID']?>" method="POST">
                  <div class="row">
                      <div class="col">
                          <div class="form-group">
                              <label for="name">Nome</label>
                              <input disabled type="text" class="form-control" id="name" name="name" value="<?=$sup['name'] ?>">
                          </div>
                      </div>
                      <div class="col">
                          <div class="form-group">
                              <label for="email">E-mail</label>
                              <input disabled type="text" class="form-control" id="email" name="email" value="<?=$sup['email'] ?>">
                          </div>
                      </div>
                      <div class="col">
                          <div class="form-group">
                              <label for="CPF">CPF</label>
                              <input disabled type="text" class="form-control" id="CPF" name="CPF" value="<?=$sup['CPF'] ?>">
                          </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="col">
                          <div class="form-group">
                              <label for="address">Endereço</label>
                              <input disabled type="text" class="form-control" id="address" name="address" value="<?=$sup['address'] ?>">
                          </div>
                      </div>
                      <div class="col">
                          <div class="form-group">
                              <label for="phone">Telefone</label>
                              <input disabled type="text" class="form-control" id="phone" name="phone" value="<?=$sup['phone'] ?>">
                          </div>
                      </div>
                      <div class="col">
                          <div class="form-group">
                              <label for="category">Categoria</label>
                              <select class="form-control" id="category" name="category">
                                  <option value="JUNIOR" <?php if($sup['category'] == 'JUNIOR') {echo 'selected';}?>>Júnior - R$15</option>
                                  <option value="SENIOR" <?php if($sup['category'] == 'SENIOR') {echo 'selected';}?>>Sênior - R$30</option>
                                  <option value="ELITE" <?php if($sup['category'] == 'ELITE') {echo 'selected';}?>>Elite - R$50</option>
                              </select>
                          </div>
                      </div>
                      <div class="col">
                          <div class="form-group">
                              <label for="status">Status</label>
                              <select class="form-control" id="status" name="status">
                                  <option value="AD" <?php if($sup['status'] == 'AD') {echo 'selected';}?>>Adimplente</option>
                                  <option value="INAD" <?php if($sup['status'] == 'INAD') {echo 'selected';}?>>Inadimplente</option>
                              </select>
                          </div>
                      </div>
                  </div>

                  <button type="submit" class="btn btn-primary">Atualizar</button>
              </form>
          </div>
      </div>
  </div>

  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>