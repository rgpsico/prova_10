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
      <th scope="col">E-mail</th>
      <th scope="col">Telefone</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
         
      <?php foreach($res as $value){?>
    <tr class="user-<?=$value->id?>">
      <th scope="row">1</th>
      <td><?=$value->nome?></td>
      <td><?=$value->nome?></td>
      <td><?=$value->nome?></td>
      <td><button class="btn btn-success editar">Editar</button>
      <button class="btn btn-danger delete" data-delete="<?=$value->id ?>" >Excluir</button>
    </td>
    </tr>  
    <?php } ?>
  </tbody>
</table>
</div>

</body>
