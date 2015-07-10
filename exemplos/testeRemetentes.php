<?php

include_once '../Criaenvio_loader.php';

// VOCÊ DEVE ALTERAR SUA CHAVE AQUI
define('NN_CHAVE', '=sua chave=');

try {

    $parametros = null; // sem parâmetros
//    $parametros = array('id'=>'E0s');      // filtrando pelo id
//    $parametros = array('email' => 'z');     // pelo email
//    $parametros = array('nome' => 'z','id' => 'EX');  // nome e id

    $remetentes = (new Criaenvio\Remetente())->buscar($parametros);

    echo '<pre>';
    print_r($remetentes->getDados());

} catch (Exception $e) {
    var_dump($e); die;
}