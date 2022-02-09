<div class="container my-4">
  <h1>Cadastrar</h1>

  <?php

  use App\Controllers\UserController;

  $router = $_REQUEST['router'] === 'cadastrar' ? 'criarPessoa' : 'update';
  $bottom = $_REQUEST['router'] === 'cadastrar' ? 'cadastrar' : 'Atualizar';
  if (isset($_REQUEST['id'])) {
    $user = new UserController();

    $id = $_REQUEST['id'];
    $res = $user->show($id);
    $nome = $res[0]->nome;
    $cpf = $res[0]->cpf;
    $rg = $res[0]->rg;
    $data_nascimento = $res[0]->data_nascimento;
    $data_cadastro = $res[0]->data_cadastro;
    $data_atualizacao = $res[0]->data_atualizacao;
    $data_exclusao = $res[0]->data_exclusao;
    $cep = $res[0]->cep;

    $endereco = $res[0]->endereco;
    $numero = $res[0]->numero;
    $telefone = $res[0]->telefone;
    $uf = $res[0]->uf;
  }


  ?>
  <form action="<?= $router ?>" method="POST">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="Roger Neves">
        <input type="hidden" class="form-control" id="id" name="id" placeholder="id" value="<?= @$id ?>">
      </div>



      <div class="form-group">
        <label for="CPF">CPF</label>
        <input type="text" class="form-control" id="cpf" name="cpf" value="111">
      </div>

      <div class="form-group">
        <label for="rg">rg</label>
        <input type="text" class="form-control" id="rg" name="rg" placeholder="rg" value="111">
      </div>


      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="data_nascimento">Data nascimento</label>
          <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="">

          <input type="hidden" class="form-control" id="data_atualizacao" name="data_atualizacao" value="">
          <input type="hidden" class="form-control" id="data_exclusao" name="data_exclusao" value="">
        </div>
      </div>



      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="Telefone">Telefones</label>
          <input type="text" class="form-control" id="telefone" name="telefone" value="2022-02-09">
        </div>
      </div>



      <div class="form-group col-md-4">
        <label for="inputEstado">UF</label>
        <select id="UF" class="form-control" name="UF">
          <option value="rg">rg</option>
        </select>
      </div>



      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="CEP">CEP</label>
          <input type="text" class="form-control" id="cep" name="cep" value="<?= @$cep ?>">
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="Endereco">Endereco</label>
          <input type="text" class="form-control" id="endereco" name="endereco" value="<?= @$endereco ?>">
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="numero">N°</label>
          <input type="number" class="form-control" id="numero" name="numero" value="<?= @$numero ?>">
        </div>
      </div>

      <input type="submit" name="<?= $bottom ?>" value="<?= $bottom ?>" class="btn btn-success my-5">
  </form>
</div>
</div>