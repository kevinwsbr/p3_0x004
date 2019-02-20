<?php

require_once 'configs/Autoload.php';

$utils->protectPage();

$stadium = new Stadium($db);
$st = $stadium->getStadium();
$stadium->update();

?>

<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

  <title>Alterar Estádio | iSoccer</title>
</head>

<body>
  <?php require_once 'components/header.php'; ?>
  <div class="container">
      <div class="row">
          <div class="col">
              <h3>Alterar Estádio</h3>
              <hr/>
          </div>
      </div>
      <div class="row">

          <div class="col">
              <form action="alterar-estadio.php?id=<?=$st['ID']?>" method="POST">
                  <div class="row">
                      <div class="col">
                          <div class="form-group">
                              <label for="name">Nome</label>
                              <input disabled type="text" class="form-control" id="name" name="name" value="<?=$st['name']?>">
                          </div>
                      </div>
                      <div class="col col-8">
                          <div class="form-group">
                              <label for="address">Endereço</label>
                              <input disabled type="text" class="form-control" id="address" name="address" value="<?=$st['address']?>">
                          </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="col">
                          <div class="form-group">
                              <label for="capacity">Capacidade total</label>
                              <input type="text" class="form-control" id="capacity" name="capacity" value="<?=$st['capacity']?>">
                          </div>
                      </div>
                      <div class="col">
                          <div class="form-group">
                              <label for="restrooms">Nº de banheiros</label>
                              <input type="text" class="form-control" id="restrooms" name="restrooms" value="<?=$st['restrooms']?>">
                          </div>
                      </div>
                      <div class="col">
                          <div class="form-group">
                              <label for="snack_bars">Nº de lanchonetes</label>
                              <input type="text" class="form-control" id="snack_bars" name="snack_bars" value="<?=$st['snack_bars']?>">
                          </div>
                      </div>
                      <div class="col">
                          <div class="form-group">
                              <label for="status">Status</label>
                              <select disabled class="form-control" id="status" name="status">
                                  <option>Disponível</option>
                                  <option>Indisponível</option>
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