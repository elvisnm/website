<?php
/**
* Cria a conexão com o banco de dados
*/
$con = @mysql_connect(constant("Config::DBHOST") , constant("Config::DBUSER") , constant("Config::DBSENHA"));
if($con===FALSE) {
	echo "Não foi possivel conectar ao MySQL " .
	mysql_error();
	exit;
}
mysql_select_db(constant("Config::DBBANCO") , $con);
if($con===FALSE) {
	echo "Não foi possivel conectar ao Banco de Dados" .
	mysql_error();
	exit;
}

?>