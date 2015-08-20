<?php

include_once '../Criaenvio_loader.php';

// VOCÊ DEVE ALTERAR SUA CHAVE AQUI
define('NN_CHAVE', '-chave-=');

/*
 * Consulta de envios
 */
//try {
//
//    $parametros = null; // sem parâmetros
//    $parametros = array('codigo' => '11');     // pelo contador
// //   $parametros = array('status' => 1);  // nome e id
//
//    $envios = (new Criaenvio\Envio())->buscar($parametros);
//
//    echo '<pre>';
//    //print_r($envios->getDados());
//
//    foreach ($envios->getDados() as $e) {
//        echo '#' . $e->codigo . ' ' . $e->id_mensagem . ': ' . $e->data_de_inicio. ' ('. $e->status . ') Contatos/Conclusão: '.$e->total_de_contatos.'/'.$e->porcentagem_de_conclusao.'%<br>';
//    }
//
//} catch (Exception $e) {
//    echo $e->getMessage(); die;
//}

/**
 * Carregando um envio.
 */

//try {
////    $id = 'Lz';  $embeds = array('listas', 'mensagem');    // com embeds
////    $id = null; $embeds = array('grupos');      // sem id
//    $id = 'f';  $embeds = null; // sem embed
////    $id = 'naoexiste'; $embeds = array();
////    $id = 'Lz'; $embeds = array('listas','mensagem', 'remetente');
//
//    $envio = (new Criaenvio\Envio($id))->carregar($embeds);
//
//    echo '<pre>';
//    print_r($envio);
//} catch (Exception $e) {
//    echo $e->getMessage(); die;
//}

/**
 * Criando um envio.
 */

//try {
//
//    $dados = [
//        'mensagem'  => 'TI',
//        'listas'    => '3a,3s,3,34',
//        //'data_de_inicio'    => '02/10/2015 20:22',
//        'data_de_inicio'    => 'agora',
//        'remetente' => 'E'
//    ];
//
//    $envio = (new Criaenvio\Envio())->criar($dados);
//
//    echo '<pre>';
//    print_r($envio);
//
//} catch (Exception $e) {
//    echo $e->getMessage();
//}


///**
// * Pausando um envio.
// */
//
//try {
//
//    $id = 'JG';
////    $id = null;
//
//    $envio = (new Criaenvio\Envio($id))->pausar();
//
//    if ($envio) {
//        echo 'Envio pausado com sucesso.';
//    } else {
//        echo 'Falha ao pausar envio.';
//    }
//
//} catch (Exception $e) {
//    echo $e->getMessage();
//}

///**
// * Cancelando um envio.
// */
//
//try {
//
//    $id = 'JG';
////    $id = null;
//
//    $envio = (new Criaenvio\Envio($id))->cancelar();
//
//    if ($envio) {
//        echo 'Envio cancelado com sucesso.';
//    } else {
//        echo 'Falha ao cancelar envio.';
//    }
//
//} catch (Exception $e) {
//    echo $e->getMessage();
//}

///**
// * Retomando um envio.
// */
//
//try {
//
//    $id = 'J5'; $dados = ['data' => 'agora'];
//    $id = 'J5'; $dados = ['data' => '21/08/2015 12:12'];
////    $id = null;
//
//    $envio = (new Criaenvio\Envio($id))->retomar($dados);
//
//    if ($envio) {
//        echo 'Envio retomado/agendado com sucesso.';
//    } else {
//        echo 'Falha ao retomar/agendar envio.';
//    }
//
//} catch (Exception $e) {
//    echo $e->getMessage();
//}