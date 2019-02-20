<?php

require_once 'configs/Autoload.php';

$utils->protectPage();
$employee = new Employee($db);
$teamBus = new Bus($db);
$tc = new TrainingCenter($db);
$stadium = new Stadium($db);
$supporter = new Supporter($db);

$busList = $teamBus->getBus();
$tcList = $tc->getTrainingCenters();
$coachesList = $employee->getCoaches();
$playersList = $employee->getPlayers();
$stadiumsList = $stadium->getStadiums();
$employeesList = $employee->getEmployees();
$supportersList = $supporter->getSupporters();
?>

<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <title>iSoccer</title>
</head>

<body>
  <?php require_once 'components/header.php'; ?>
  <div class="container">
      <div class="row">
          <div class="col">
              <h3>Bem vindo ao sistema de gerenciamento do iSoccer!</h3>
              <hr>
          </div>
      </div>
      <div class="row">
          <div class="col">
              <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle btn-block" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Adicionar novo funcionário
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="cadastrar-advogado.php">Advogado</a>
                      <a class="dropdown-item" href="cadastrar-cozinheiro.php">Cozinheiro</a>
                      <a class="dropdown-item" href="cadastrar-jogador.php">Jogador</a>
                      <a class="dropdown-item" href="cadastrar-medico.php">Médico</a>
                      <a class="dropdown-item" href="cadastrar-motorista.php">Motorista</a>
                      <a class="dropdown-item" href="cadastrar-preparador.php">Preparador Técnico</a>
                      <a class="dropdown-item" href="cadastrar-presidente.php">Presidente</a>
                      <a class="dropdown-item" href="cadastrar-tecnico.php">Técnico</a>
                  </div>
              </div>
          </div>
          <div class="col">
              <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle btn-block" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Adicionar novo recurso
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="cadastrar-ct.php">Centro de Treinamento</a>
                      <a class="dropdown-item" href="cadastrar-estadio.php">Estádio</a>
                      <a class="dropdown-item" href="cadastrar-onibus.php">Ônibus</a>
                  </div>
              </div>
          </div>
          <div class="col">
              <a class="btn btn-secondary btn-block"  href="cadastrar-socio.php">Adicionar sócio-torcedor</a>
          </div>
      </div>
      <div class="row">
          <div class="col">
              <h4 class="mt-3">Relatórios</h4>
              <hr>
          </div>
      </div>
      <div class="row">
          <div class="col">
              <h5>Sócios-torcedores</h5>
              <span class="d-block">Número de sócios: <?=$supporter->getSupportersCount()?></span>
              <span class="d-block">Número de sócios adimplentes: <?=$supporter->getAdSupportersCount()?></span>
              <span class="d-block mb-3">Número de sócios inadimplentes: <?=$supporter->getInadSupportersCount()?></span>
              <?php

              if (count($supportersList) != 0) {
              ?>
                  <table class="table">
                      <thead class="thead-dark">
                      <tr>
                          <th scope="col">Nome</th>
                          <th scope="col">CPF</th>
                          <th scope="col">E-mail</th>
                          <th scope="col">Telefone</th>
                          <th scope="col">Endereço</th>
                          <th scope="col">Categoria</th>
                          <th scope="col">Status</th>
                          <th scope="col">Ações</th>

                      </tr>
                      </thead>
                      <tbody>
                      <?php foreach($supportersList as $sup) { ?>
                          <tr>
                              <td><?=$sup['name']; ?></td>
                              <td><?=$sup['CPF']; ?></td>
                              <td><?=$sup['email']; ?></td>
                              <td><?=$sup['phone']; ?></td>
                              <td><?=$sup['address']; ?></td>
                              <td><?=$sup['category']; ?></td>
                              <td><?php
                                  if($sup['status'] == 'AD') {
                                      echo 'Adimplente';
                                  }else if($sup['status'] == 'INAD') {
                                      echo 'Inadimplente';
                                  }
                                  ?></td>
                              <td><a href="alterar-socio.php?id=<?=$sup['ID']?>">Alterar sócio</a></td>
                          </tr>
                      <?php } ?>
                      </tbody>
                  </table>
              <?php
              }
              ?>

              <h4 class="mt-5">Time</h4>
              <?php

              if(count($coachesList) == 0) {
                  echo '<span class="d-block">Não há técnicos cadastrados!</span>';
              }else {
              ?>
              <h5>Técnicos</h5>
              <table class="table">
                  <thead class="thead-dark">
                  <tr>
                      <th scope="col">Nome</th>
                      <th scope="col">CPF</th>
                      <th scope="col">E-mail</th>
                      <th scope="col">Telefone</th>
                      <th scope="col">Salário</th>

                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach($coachesList as $coa) { ?>
                      <tr>
                          <td><?=$coa['name']; ?></td>
                          <td><?=$coa['CPF']; ?></td>
                          <td><?=$coa['email']; ?></td>
                          <td><?=$coa['phone']; ?></td>
                          <td><?=$coa['salary']; ?></td>
                      </tr>
                  <?php } ?>
                  </tbody>
              </table>
                  <?php
              }


              ?>
              <h5>Jogadores</h5>
              <?php

              if(count($playersList) == 0) {
                  echo '<span class="d-block">Não há jogadores cadastrados!</span>';
              }else {
              ?>

              <table class="table">
                  <thead class="thead-dark">
                  <tr>
                      <th scope="col">Nome</th>
                      <th scope="col">CPF</th>
                      <th scope="col">E-mail</th>
                      <th scope="col">Telefone</th>
                      <th scope="col">Salário</th>
                      <th scope="col">Posição</th>
                      <th scope="col">Status</th>

                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach($playersList as $pli) { ?>
                      <tr>
                          <td><?=$pli['name']; ?></td>
                          <td><?=$pli['CPF']; ?></td>
                          <td><?=$pli['email']; ?></td>
                          <td><?=$pli['phone']; ?></td>
                          <td><?=$pli['salary']; ?></td>
                          <td><?=$pli['type']; ?></td>
                          <td><?=$pli['status']; ?></td>
                      </tr>
                  <?php } ?>
                  </tbody>
              </table>
                  <?php
              }


              ?>

              <h5>Demais funcionários</h5>

              <?php

              if(count($employeesList) == 0) {
                  echo '<span class="d-block">Não há funcionários cadastrados!</span>';
              }else {
              ?>
              <table class="table">
                  <thead class="thead-dark">
                  <tr>
                      <th scope="col">Nome</th>
                      <th scope="col">CPF</th>
                      <th scope="col">Salário</th>
                      <th scope="col">Telefone</th>
                      <th scope="col">CRM</th>
                      <th scope="col">Nº de habilitação</th>

                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach($employeesList as $emp) {
                      if ($emp['role'] != 'PLAYER' && $emp['role'] != 'COACH') {?>
                      <tr>
                          <td><?=$emp['name']; ?></td>
                          <td><?=$emp['CPF']; ?></td>
                          <td><?=$emp['salary']; ?></td>
                          <td><?=$emp['phone']; ?></td>
                          <td><?=$emp['CRM']; ?></td>
                          <td><?=$emp['driving_ID']; ?></td>
                      </tr>
                  <?php } } ?>
                  </tbody>
              </table>
                  <?php
              }


              ?>

          </div>
      </div>
      <div class="row">
          <div class="col">
              <h4 class="mt-5">Recursos Físicos</h4>
              <h5>Ônibus</h5>
              <?php

              if(count($busList) == 0) {
                  echo '<span class="d-block">Não existem ônibus cadastrados!</span>';
              }else {
              ?>
              <table class="table">
                  <thead class="thead-dark">
                  <tr>
                      <th scope="col">Modelo</th>
                      <th scope="col">Placa</th>
                      <th scope="col">Capacidade</th>
                      <th scope="col">Status</th>

                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach($busList as $b) { ?>
                      <tr>
                          <td><?=$b['model']; ?></td>
                          <td><?=$b['plate']; ?></td>
                          <td><?=$b['capacity']; ?></td>
                          <td><?=$b['status']; ?></td>
                      </tr>
                  <?php } ?>
                  </tbody>
              </table>
                  <?php
              }


              ?>
              <h5>Estádios</h5>
              <?php

              if(count($stadiumsList) == 0) {
                  echo '<span class="d-block">Não há estádios cadastrados!</span>';
              }else {
              ?>
              <table class="table">
                  <thead class="thead-dark">
                  <tr>
                      <th scope="col">Nome</th>
                      <th scope="col">Endereço</th>
                      <th scope="col">Capacidade</th>
                      <th scope="col">Banheiros</th>
                      <th scope="col">Lanchonetes</th>
                      <th scope="col">Status</th>
                      <th scope="col">Ações</th>

                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach($stadiumsList as $sl) { ?>
                      <tr>
                          <td><?=$sl['name']; ?></td>
                          <td><?=$sl['address']; ?></td>
                          <td><?=$sl['capacity']; ?></td>
                          <td><?=$sl['restrooms']; ?></td>
                          <td><?=$sl['snack_bars']; ?></td>
                          <td><?=$sl['status']; ?></td>
                          <td><a href="alterar-estadio.php?id=<?=$sl['ID']?>">Alterar estádio</a></td>
                      </tr>
                  <?php } ?>
                  </tbody>
              </table>
                  <?php
              }


              ?>
              <h5>Centros de Treinamento</h5>
              <?php

              if(count($tcList) == 0) {
                  echo '<span class="d-block mb-5">Não há CTs cadastrados!</span>';
              }else {
              ?>
              <table class="table">
                  <thead class="thead-dark">
                  <tr>
                      <th scope="col">Nome</th>
                      <th scope="col">Endereço</th>
                      <th scope="col">Dormitórios</th>
                      <th scope="col">Status</th>

                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach($tcList as $tl) { ?>
                      <tr>
                          <td><?=$tl['name']; ?></td>
                          <td><?=$tl['address']; ?></td>
                          <td><?=$tl['dormitories']; ?></td>
                          <td><?=$tl['status']; ?></td>
                      </tr>
                  <?php } ?>
                  </tbody>
              </table>
                  <?php
              }


              ?>
          </div>
      </div>
  </div>

  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>