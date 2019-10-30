<!DOCTYPE html>
<html>
<head>
    <title>DesafioTeknisa</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

</head>
<body>

<div class="container">

    <h1>ContactMe</h1>

    <hr />

    <form action="/enviar" method="POST">
      

      <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome">
      </div>

      <div class="form-group">
        <label for="email">E-Mail</label>
        <input type="text" id="email" name="email" class="form-control" placeholder="E-Mail">
      </div>

      <div class="form-group">
        <textarea id="mensagem" name="mensagem" class="form-control" placeholder="Digite sua mensagem"></textarea>
      </div>

      <button type="submit" class="btn btn-default">Enviar</button>

    </form>

</div>

</body>
</html>