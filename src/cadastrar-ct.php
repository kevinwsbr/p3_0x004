<?php

require_once 'configs/Autoload.php';

$utils->protectPage();

$ct = new TrainingCenter($db);
$ct->register();

?>

<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

  <title>Cadastrar CT | iSoccer</title>
</head>

<body>
  <?php require_once 'components/header.php'; ?>
  <div class="container">
      <div class="row">
          <div class="col">
              <h3>Cadastrar Centro de Treinamento</h3>
              <hr/>
          </div>
      </div>
      <div class="row">

          <div class="col">
              <form action="cadastrar-ct.php" method="POST">
                  <div class="row">
                      <div class="col">
                          <div class="form-group">
                              <label for="name">Nome</label>
                              <input required type="text" class="form-control" id="name" name="name">
                          </div>
                      </div>
                      <div class="col col-8">
                          <div class="form-group">
                              <label for="address">Endereço</label>
                              <input required type="text" class="form-control" id="address" name="address">
                          </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="col">
                          <div class="form-group">
                              <label for="dormitories">Nº de dormitórios</label>
                              <input required type="text" class="form-control" id="dormitories" name="dormitories">
                          </div>
                      </div>
                      <div class="col">
                          <div class="form-group">
                              <label for="status">Status</label>
                              <select class="form-control" id="status" name="status">
                                  <option>Disponível</option>
                                  <option>Indisponível</option>
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