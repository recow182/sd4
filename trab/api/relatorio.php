<?php
require('inicio.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Sistema de Clientes</title>
 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    </head>
    <body>
 
        <h1 align="center">Clientes</h1>
 
        <?php
        # Abrir conexão com banco de dados...
        $conexao = new MySQLi("mysql.hostinger.com.br","u375804982_sd","147renan","u375804982_sd");

        # Validar se houve conexão...
        if(!$conexao){ echo "Não foi possível se conectar ao banco de dados"; exit;}
 
        # Selecionar todos os cadastros da tabela 'cliente'...
        $registros = $conexao->query("select * from cliente");
 
        # Verificar se há registros na tabela "cliente"...
        if($registros->num_rows>0){
 
            # Tabela da listagem...
            echo'
            <table class="table table-striped table-hover">
                <thead>
                    <th><center>CÓDIGO</center></th>
                    <th>NOME</th>
                    <th><center>EMAIL</center></th>
                </thead>
                <tbody>';
 
                # Listar os clientes cadastrados...
                while($cliente = $registros->fetch_array(MYSQL_BOTH)){
                    echo '
                    <tr>
                        <td align="center">'.$cliente["codigo"].'</td>
                        <td>'.utf8_encode($cliente["nome"]).'</td>
                        <td align="center">'.$cliente["email"].'</td>
                    </tr>';
                }
 
                echo'
                </tbody>
            </table>';
 
        }else{
            echo "Nenhum registro encontrado na tabela 'cliente'.";
            exit;
        }
 
        # Encerrar conexão...
        $conexao->close();
        ?>
    </body>
</html>
