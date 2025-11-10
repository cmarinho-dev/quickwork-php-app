<?php
include_once("../_components/header.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
      crossorigin="anonymous"
    />
    <title>Home</title>
  </head>
  <body>
    <?= $header ?>
    <div class="container pt-4">
        <div class="d-flex justify-content-between mt-4">
          <h3>Gerenciar Usuários</h3>
          <button id="novo" class="btn btn-primary">+ Novo Cliente</button>
        </div>
      <div id="lista" class="mt-4 rounded-5"></div>
    </div>
    <script src="../js/cliente_listar.js"></script>
    <script src="../js/_valida_sessao.js"></script>
  </body>
</html>
