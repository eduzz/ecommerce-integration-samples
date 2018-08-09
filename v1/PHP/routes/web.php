<?php

$router->get('/', ["uses" => "HomeController@index", "as" => "home"]);
//$router->get('/login', ["uses" => "LoginController@index", "as" => "login"]);
//$router->post('/login', ["uses" => "LoginController@signin", "as" => "signin"]);

$router->get('/cliente', ["uses" => "ClienteController@index", "as" => "clientes.index"]);
$router->post('/cliente', ["uses" => "ClienteController@create", "as" => "clientes.create"]);

$router->get('/produto', ["uses" => "ProdutoController@index", "as" => "produtos.index"]);
$router->post('/produto', ["uses" => "ProdutoController@create", "as" => "produtos.create"]);

$router->get('/venda', ["uses" => "VendaController@index", "as" => "vendas.index"]);
$router->post('/venda', ["uses" => "VendaController@create", "as" => "vendas.create"]);