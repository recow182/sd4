<?php
require('inicio.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastro</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <meta charset="iso-8859-1">
<body>
<?php
    if($_POST){
        curl_setopt_array($ch = curl_init(), array(
        CURLOPT_URL => "http://recowemail.esy.es/trab/api/clientes",
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => json_encode( array(
        "nome" => $_POST['nome'],
        "email" => $_POST['email']
      )),
    ));

@$result = curl_exec($ch);
@curl_close($ch);
}
?>

    <h2>Cliente</h2>
    <form method="post" onsubmit="/clientes" class="form">
        <label for="nome">Nome</label>
        <input type="text" name="nome" />
        <label for="email">E-mail</label>
        <input type="text" name="email" />
        <input type="submit" value="Enviar" />
    </form>
</body>
</html>