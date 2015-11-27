<?php
error_reporting(0);
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
$teste = "http://recowemail.esy.es/trab/api/clientes/".$_POST['codigo'];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $teste);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

$result = curl_exec($ch);
curl_close($ch);
}
?>

    <h2>Cliente</h2>
    <form method="post" onsubmit="/clientes" class="form">
        <label for="nome">Codigo</label>
        <input type="text" name="codigo" placeholder="codigo" />
        <input type="submit" value="Deletar" />
    </form>
</body>
</html>