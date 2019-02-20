<?php

require_once 'configs/Autoload.php';

//$utils->protectPage();
//
//$user = new User($db);
//$group = new Group($db);
$supporter = new Supporter($db);
$supporter->register();
//
//$user->setData($user->getUser($_SESSION['user']['username']));
//$group->register();

?>

<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

  <title>Cadastrar Sócio | iSoccer</title>
</head>

<body>
  <?php require_once 'components/header.php'; ?>
  <div class="container">
      <div class="row">
          <div class="col">
              <h3>Cadastrar Sócio</h3>
              <hr/>
          </div>
      </div>
      <div class="row">

          <div class="col">
              <form action="cadastrar-socio.php" method="POST">
                  <div class="row">
                      <div class="col">
                          <div class="form-group">
                              <label for="name">Nome</label>
                              <input required type="text" class="form-control" id="name" name="name">
                          </div>
                      </div>
                      <div class="col">
                          <div class="form-group">
                              <label for="email">E-mail</label>
                              <input required type="text" class="form-control" id="email" name="email">
                          </div>
                      </div>
                      <div class="col">
                          <div class="form-group">
                              <label for="CPF">CPF</label>
                              <input required type="text" class="form-control" id="CPF" name="CPF">
                          </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="col">
                          <div class="form-group">
                              <label for="address">Endereço</label>
                              <input required type="text" class="form-control" id="address" name="address">
                          </div>
                      </div>
                      <div class="col">
                          <div class="form-group">
                              <label for="phone">Telefone</label>
                              <input required type="text" class="form-control" id="phone" name="phone">
                          </div>
                      </div>
                      <div class="col">
                          <div class="form-group">
                              <label for="category">Categoria</label>
                              <select class="form-control" id="category" name="category">
                                  <option value="JUNIOR">Júnior - R$15</option>
                                  <option value="SENIOR">Sênior - R$30</option>
                                  <option value="ELITE">Elite - R$50</option>
                              </select>
                          </div>
                      </div>
                      <div class="col">
                          <div class="form-group">
                              <label for="status">Status</label>
                              <select class="form-control" id="status" name="status">
                                  <option value="AD">Adimplente</option>
                                  <option value="INAD">Inadimplente</option>
                              </select>
                          </div>
                      </div>
                  </div>

                  <button type="submit" class="btn btn-primary">Cadastrar</button>
              </form>
          </div>
      </div>
  </div>

  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>