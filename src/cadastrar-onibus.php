<?php

require_once 'configs/Autoload.php';

//$utils->protectPage();
//
//$user = new User($db);
//$group = new Group($db);

$bus = new Bus($db);
$bus->register();
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

  <title>Cadastrar Ônibus | iSoccer</title>
</head>

<body>
  <?php require_once 'components/header.php'; ?>
  <div class="container">
      <div class="row">
          <div class="col">
              <h3>Cadastrar Ônibus</h3>
              <hr/>
          </div>
      </div>
      <div class="row">

          <div class="col">
              <form action="cadastrar-onibus.php" method="POST">
                  <div class="row">
                      <div class="col">
                          <div class="form-group">
                              <label for="model">Modelo</label>
                              <input required type="text" class="form-control" id="model" name="model">
                          </div>
                      </div>
                      <div class="col col-8">
                          <div class="form-group">
                              <label for="plate">Placa</label>
                              <input required type="text" class="form-control" id="plate" name="plate">
                          </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="col">
                          <div class="form-group">
                              <label for="capacity">Capacidade</label>
                              <input required type="text" class="form-control" id="capacity" name="capacity">
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