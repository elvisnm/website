<?php
/*
* Classe de configurações do website
*/

class Config {
	/*
	* Configurações do Banco de Dados
	*/
	const DBHOST = 'localhost';
	const DBUSER = 'root';
	const DBSENHA = 'root';
	const DBBANCO = 'website';
	
	/*
	* Caminho do site
	*/
	const ROOTURL = 'http://localhost:8888/website';
	const SITE_NAME = 'Website';

	/*
	* Determina o caminho das pastas do Smarty
	*/
	const LIBS = 'libs/Smarty-2.6.26/libs/Smarty.class.php'; // Caminho da biblioteca Smarty
	const TEMPLATE_DIR = 'templates/'; //Caminho da pasta templates
	const COMPILE_DIR = 'templates_c/'; //Caminho da pasta templates_c
	const CACHE_DIR = 'cache/'; //Caminho da pasta cache
	const CONFIG_DIR = 'configs/'; //Caminho da pasta configs
	
	/*
	* Determina o tempo de cache
	*/
	const CACHE = 'true';
	const CACHE_LIFETIME = '0';

}
?>