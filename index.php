<?php
include_once ("class/config.php"); //Configurações básicas do website
include_once ("class/connect.php"); //Conecxão com o banco de dados
include_once ("class/sql.php"); //Funções de consulta MySQL
include_once ("class/func.php"); //Funções padrões

//Retorna a URL digitada pelo usuário
$page = Func::getUrl();

//Verifica se a URL existe no banco de dados
$dados = Sql::QueryPesquisa("SELECT * FROM website_pages WHERE '/$page' regexp concat('^',url,'$') ");

//Se a Url não existir no banco de dados, redireciona para home
if (!$dados){
    header ("Location: ".constant ("Config::ROOTURL") ."/");
}

//Inclui a biblioteca do Smarty
require(constant("Config::LIBS"));
//Cria uma nova instância no smarty
$template = new Smarty();

//Configurações do cache
$template->caching = constant ("Config::CACHE"); //Defini caching true
$template->cache_lifetime = constant ("Config::CACHE_LIFETIME"); //Defini tempo do cache

$template->template_dir = constant ("Config::TEMPLATE_DIR");
$template->compile_dir = constant ("Config::COMPILE_DIR");
$template->cache_dir = constant ("Config::CACHE_DIR");
$template->config_dir = constant ("Config::CONFIG_DIR");

//Seta os dados da página
$template->assign('page', "$page"); //URL da página
$template->assign('action', "$dados->action"); //Action.php da página
$template->assign('template', "$dados->template"); //Template.html da página
$template->assign('h1', utf8_encode($dados->h1)); //H1 da página
$template->assign('description', utf8_encode($dados->description)); //Descrição da página
$template->assign('keywords', "$dados->keywords"); //Palavras chave da página
$template->assign('rootUrl', constant("Config::ROOTURL")); //URL base do website
$template->assign('siteName', constant("Config::SITE_NAME")); //Nome do website

// Inclui a Action da página
require("actions/$dados->action.php");

//Obtem o nome da Action da página solicitada
$action = "$dados->action";
//Cria uma nova instância na Action
$action = new $action;

//Verifica se há valores no $_POST
if (count($_POST)>0){
    $action->post($dados->template, $template, $_POST);
//Verifica se há valores no $_GET
} else if (count($_GET)>0){
    $action->get($dados->template, $template, $_GET);
//Se não há $_POST ou $_GET entra no método Acess
} else {
    $action->access($dados->template, $template);
}

?>