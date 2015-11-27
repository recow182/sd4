<?php

require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();
#$app->response()->header('Content-Type', 'application/json;charset=utf-8');

$app->get('/', function () {

});

$app->get('/clientes','getClientes');
$app->post('/clientes','addCliente');
$app->get('/clientes/:codigo','getCliente');
$app->put('/clientes/:codigo','saveCliente');
$app->delete('/clientes/:codigo','deleteCliente');

$app->run();

function getConn()
{
 return new PDO('mysql:host=mysql.hostinger.com.br;dbname=u375804982_sd',
  'u375804982_sd',
  '147renan',
  array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
  
  );

}

function getClientes()
{
$stmt = getConn()->query("SELECT * FROM cliente");
$clientes = $stmt->fetchAll(PDO::FETCH_OBJ);
echo "{\"clientes\":".json_encode($clientes)."}";
}

function addCliente()
{
  $request = \Slim\Slim::getInstance()->request();
  $clientes = json_decode($request->getBody());
  $sql = "INSERT INTO cliente (nome, email) values (:nome,:email)";
  $conn = getConn();
  $stmt = $conn->prepare($sql);
  $stmt->bindParam("nome",$clientes->nome);
  $stmt->bindParam("email",$clientes->email);
  $stmt->execute();
  $clientes->codigo = $conn->lastInsertId();
  echo json_encode($cliente);
}

function getCliente($codigo)
{
  $conn = getConn();
  $sql = "SELECT * FROM cliente WHERE codigo=:codigo";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam("codigo",$icodigo);
  $stmt->execute();
  $cliente = $stmt->fetchObject();
  
  echo json_encode($cliente);
}

function saveCliente($codigo)
{
  $request = \Slim\Slim::getInstance()->request();
  $cliente = json_decode($request->getBody());
  $sql = "UPDATE cliente SET nome=:nome,email=:email WHERE codigo=:codigo";
  $conn = getConn();
  $stmt = $conn->prepare($sql);
  $stmt->bindParam("nome",$cliente->nome);
  $stmt->bindParam("email",$cliente->email);
  $stmt->bindParam("codigo",$codigo);
  $stmt->execute();
  echo json_encode($cliente);

}

function deleteCliente($codigo)
{
  $sql = "DELETE FROM cliente WHERE codigo=:codigo";
  $conn = getConn();
  $stmt = $conn->prepare($sql);
  $stmt->bindParam("codigo",$codigo);
  $stmt->execute();
}
	
		
