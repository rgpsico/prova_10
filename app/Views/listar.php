<body>
  <?php
  include_once 'partials/modal.php';
  ?>
  <div class="container mt-3">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">rg</th>
          <th scope="col">Telefone</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>

        <?php foreach ($res as $value) {


        ?>
          <tr class="user-<?= $value->id ?>">
            <th scope="row"><?= $value->id ?></th>
            <td><?= $value->nome ?></td>
            <td><?= $value->rg ?></td>
            <td><?= $value->telefone ?></td>
            <td><button class="btn btn-success"><a href="atualizar?id=<?= $value->id ?>">Editar</a></button>
              <button class="btn btn-danger delete" data-delete="<?= $value->id ?>">Excluir</button>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

</body>