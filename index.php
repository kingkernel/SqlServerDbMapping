<?php
define('DB_HOST'        , "PHX-028\MSSQLSERVERDAN");
define('DB_USER'        , "sa");
define('DB_PASSWORD'    , "root");
define('DB_NAME'        , "IntegrationHarpia");
define('DB_DRIVER'      , "sqlsrv");

require_once "Conexao.php";
try{

    $Conexao    = Conexao::getConnection();
    $query      = $Conexao->query('SELECT TABLE_NAME FROM IntegrationHarpia.INFORMATION_SCHEMA.TABLES WHERE TABLE_TYPE = \'BASE TABLE\'');
    $tabelas   = $query->fetchAll();

 }catch(Exception $e){

    echo $e->getMessage();
    exit;

 }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Describe banco SQLSERVER 2014</title>
</head>
<body>
  <form>
        <table border=1>
            <tr>
               <td>nome da tabela</td>
               <td>descrições</td>
            </tr>
            <?php
               foreach($tabelas as $tabela) {
            ?>
            <tr>
                <td><?php echo $tabela['TABLE_NAME']; ?></td>
                <td>
                <?php
                $query2      = $Conexao->query('exec sp_columns '."'". $tabela['TABLE_NAME']."'");
                $result   = $query2->fetchAll();
                print_r($result);
                 
                 ?></td>
            </tr>
            <?php
               }
            ?>
        </table>
    </form>
</body>
</html>