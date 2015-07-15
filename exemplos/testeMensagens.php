<?php

include_once '../Criaenvio_loader.php';

// VOCÊ DEVE ALTERAR SUA CHAVE AQUI
define('NN_CHAVE', '=sua chave=');

try {

    $parametros = null; // sem parâmetros
 //   $parametros = array('id'=>'-W, -y');      // filtrando pelo id
 //   $parametros = array('assunto' => 'as');     // pelo assunto
 //   $parametros = array('contador' => '93');     // pelo contador
 //   $parametros = array('datadecadastroinicio' => '2015-03-05', 'datadecadastrotermino' => '2019-03-05');     // pela data
   // $parametros = array('nome' => 'tesste','id' => '-Q');  // nome e id

    $mensagens = (new Criaenvio\Mensagem())->buscar($parametros);

    echo '<pre>';
    print_r($mensagens->getDados());

} catch (Exception $e) {
    var_dump($e); die;
}