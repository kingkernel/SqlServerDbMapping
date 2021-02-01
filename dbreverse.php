<?php

/**
 * 
 */
define('DB_HOST'        , "PHX-028\MSSQLSERVERDAN");
define('DB_USER'        , "sa");
define('DB_PASSWORD'    , "root");
define('DB_NAME'        , "IntegrationHarpia");
define('DB_DRIVER'      , "sqlsrv");

require_once "Conexao.php";
try{

    $Conexao = Conexao::getConnection();
    $query = $Conexao->query('SELECT TABLE_NAME FROM IntegrationHarpia.INFORMATION_SCHEMA.TABLES WHERE TABLE_TYPE = \'BASE TABLE\'');
    $tabelas = $query->fetchAll();

 }catch(Exception $e){

    echo $e->getMessage();
    exit;

 }
	class dbReverse
	{
		public $db;
		public $table;
		function __construct(argument)
		{
			# code...
		}
		public function loadAll()
		{
			$sql = 'show tables';
			$query = $

		}

	}

?>