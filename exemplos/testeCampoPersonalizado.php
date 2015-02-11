<?php

include_once '../Criaenvio_loader.php';

// VOCÊ DEVE ALTERAR SUA CHAVE AQUI
define('NN_CHAVE', '--suachave--');

/**
 * Buscando campos personalizados
 */
//try {
//
//    $parametros = null; // sem parâmetros
////    $parametros = array('id'=>'Lo,Lq');      // filtrando pelo id
//    $parametros = array('nome' => 'campo');     // pelo nome
////    $parametros = array('nome' => 'campo','id' => 'Lo,Lq');  // nome e id
//
//    $campos = (new Criaenvio\CampoPersonalizado())->buscar($parametros);
//
//    echo '<pre>';
//    print_r($campos->getDados());
//
//} catch (Exception $e) {
//    var_dump($e); die;
//}

/**
 * Criando um campo personalizado
 */
//try {
//
//    $dados = array('nome' => 'nome do campo');
////    $dados = array('nome' => 'campo'); // nome ja existente
////    $dados = null;  // dados nulos
////    $dados = array();    // sem dados, sem nome
////    $dados = array('teste'=>'teste');  // campo não reconhecido
//
//    $campo = (new Criaenvio\CampoPersonalizado())->criar($dados);
//
//    echo '<pre>';
//    print_r($campo);
//
//} catch (Exception $e) {
//    var_dump($e); die;
//}

/**
 * Carregando um campo.
 */
//try {
//    $id = 'Ly';
////    $id = 'n0Ex1st3';
//
//    $campo = (new Criaenvio\CampoPersonalizado($id))->carregar();
//    echo '<pre>';
//    print_r($campo);
//} catch (Exception $e) {
//    var_dump($e);
//}

/**
 * Editando um campo.
 */
//try {
//    $id = 'Ly'; $dados = array('nome' => 'nome novamente');
////    $id = 'Ly'; $dados = array('nome' => 'camponggggg8vo999');
////    $id = 'Ly'; $dados = array('pasnome' => 'parametro errado');
////    $id = 'n0ex1st';    $dados = array('nome' => 'ssss');
//
//    $resultado = (new Criaenvio\CampoPersonalizado($id))->editar($dados);
//
//    if ($resultado) {
//        echo 'sucesso';
//    } else {
//        echo 'falha';
//
//    }
//
//} catch (Exception $e) {
//    var_dump($e);
//}

/**
 * Removendo um campo.
 */
//try {
//    $id = 'Ly';
////    $id = 'n0Ex1st3';
//
//    $resultado = (new Criaenvio\CampoPersonalizado($id))->remover();
//
//    if ($resultado) {
//        echo 'sucesso';
//    } else {
//        echo 'falha';
//    }
//
//} catch (Exception $e) {
//    var_dump($e);
//}