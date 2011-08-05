<?php
class Sql{
	/*
	* Método que faz uma pesquisa no banco e retorna um objeto com os valores de cada coluna de uma tabela
	*/
	public function QueryPesquisa($sql) {
		$result = mysql_query("$sql");
		return mysql_fetch_object($result);
	}
	
	/*
	* Método que faz uma pesquisa e retorna mais de um valor
	*/
	public function QueryPesquisas($sql) {
		$result = mysql_query("$sql");
		while ($object = mysql_fetch_object($result)){
				$objects[]=Func::htmlspecialcharsObject($object); 
			}
		return $objects;
	}
	
	/*
	* Método que insere registros em tabelas no banco de dados
	*/
	public function QueryInsert($sql) {
		$result = mysql_query("$sql");
		if ($result==true){
		return true;
		}
	}
	
	/*
	* Método que faz update de registros em tabelas no banco de dados
	*/
	public function QueryUpdate($sql) {
		$result = mysql_query("$sql");
		if (mysql_affected_rows()>0){
			return true;
		}
	}
	
	/*
	* Método que faz deleta registros em tabelas no banco de dados
	*/
	public function QueryDelete($sql) {
		$result = mysql_query("$sql");
		if (mysql_affected_rows()>0){
			return true;
		}
	}
}
?>