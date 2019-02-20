<?php

require_once 'configs/Autoload.php';

$utils->protectPage();

$coach = new Employee($db);
$coach->register("COOKER");

?>

<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

  <title>Cadastrar Cozinheiro | iSoccer</title>
</head>

<body>
  <?php require_once 'components/header.php'; ?>
  <div class="container">
      <div class="row">
          <div class="col">
              <h3>Cadastrar Cozinheiro</h3>
              <hr/>
          </div>
      </div>
      <div class="row">

          <div class="col">
              <form action="cadastrar-cozinheiro.php" method="POST">
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
                  </div>

                  <div class="row">
                      <div class="col">
                          <div class="form-group">
                              <label for="CPF">CPF</label>
                              <input required type="text" class="form-control" id="CPF" name="CPF">
                          </div>
                      </div>
                      <div class="col">
                          <div class="form-group">
                              <label for="salary">Salário</label>
                              <input required type="text" class="form-control" id="salary" name="salary">
                          </div>
                      </div>
                      <div class="col">
                          <div class="form-group">
                              <label for="phone">Telefone</label>
                              <input required type="text" class="form-control" id="phone" name="phone">
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