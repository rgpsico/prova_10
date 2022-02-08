<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Prova</title>
</head>
<body>
<div class="container">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Prova</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
       <?php  if(isAuthenticate()){ ?>
     
        <li class="nav-item">
        <a class="nav-link" href="listar">Listar</a>
      </li>
  
      <li class="nav-item">
        <a class="nav-link" href="cadastrar">Cadastrar</a>
      </li>
   <?php }?> 

      <?php  $logar = isAuthenticate() === null ? 'logar' : 'logout' ?>
      <li class="nav-item">
        <a class="nav-link" href="<?=$logar ?>"><?=$logar ?> </a>
      </li>
    </ul>
   
  </div>
</nav>
</div></div></div>