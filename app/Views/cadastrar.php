
<div class="container my-4" >
<h1>Cadastrar</h1>

<form action="cadastrar" method="POST">
  <div class="form-row">
    

  <h1>Dados pessoas</h1>
  <div class="form-group col-md-6">
      <label for="nome">Nome</label>
      <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="Roger">
    </div>



  <div class="form-group">
    <label for="CPF">CPF</label>
    <input type="text" class="form-control" id="cpf" name="cpf" value="132132132132">
  </div>

  <div class="form-group">
    <label for="rg">rg</label>
    <input type="text" class="form-control" id="rg" name="rg" placeholder="rg" value="12345678">
  </div>
  
    
   <div class="form-row">
      <div class="form-group col-md-6">
        <label for="data_nascimento">Data nascimento</label>
        <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="17/10/1888">
        
        <input type="text" class="form-control" id="data_atualizacao" name="data_atualizacao" value="<?php echo date('Y-m-d') ?>">
        <input type="text" class="form-control" id="data_exclusao" name="data_exclusao"      value="<?php echo date('Y-m-d') ?>">
      </div>
    </div>

    <h1>Telefone</h1>
      
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="Telefone">Telefones</label>
        <input type="text" class="form-control" id="telefone" name="telefone" value="21 990271287">
      </div>
    </div>
  
    <h1>Endereço</h1>
  
    <div class="form-group col-md-4">
      <label for="inputEstado">UF</label>
      <select id="UF" class="form-control" name="UF">
        <option value="rg">rg</option>
      </select>
    </div>


    
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="CEP">CEP</label>
        <input type="text" class="form-control" id="CEP" name="CEP" value="227885258">
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="Endereco">Endereco</label>
        <input type="text" class="form-control" id="endereco" name="endereco" value="">
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="numero">N°</label>
        <input type="number" class="form-control" id="numero" name="numero" value="147852">
      </div>
    </div>

  <input type="submit" name="cadastrar" value="cadastrar" class="btn btn-success">
</form>
</div>  
</div>
