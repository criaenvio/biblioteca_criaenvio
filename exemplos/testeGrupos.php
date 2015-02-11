<?php

include_once '../Criaenvio_loader.php';

// VOCÊ DEVE ALTERAR SUA CHAVE AQUI
define('NN_CHAVE', '--suachave--');

/**
 * Busca de grupos.
 */
try {

    $parametros = null; // sem parâmetros
//    $parametros = array('id'=>'Lo,Lq');      // filtrando pelo id
//    $parametros = array('nome' => '0000');     // pelo nome
//    $parametros = array('nome' => '000','id' => 'io,-r');  // nome e id
//    $parametros = array('ativo'=>false);    // filtrando pelo status

    $grupos = (new Criaenvio\Grupo())->buscar($parametros);

    echo '<pre>';
    print_r($grupos->getDados());

} catch (Exception $e) {
    var_dump($e); die;
}

/**
 * Criação de grupo.
 */
//try {
//
//    $dados = array('nome' => 'grupo22211');
////    $dados = array('nome' => '00000correcao'); // nome ja existente
////    $dados = null;  // dados nulos
////    $dados = array();    // sem dados, sem nome
////    $dados = array('teste'=>'teste');  // campo não reconhecido
//
//    $grupo = (new Criaenvio\Grupo())->criar($dados);
//
//    echo '<pre>';
//    print_r($grupo);
//
//} catch (Exception $e) {
//    var_dump($e); die;
//}


/**
 * Editando um grupo.
 */
//try {
//
//    $id = '-r'; $dados = array('nome' => 'editado1 Nóvamente');
////    $id = '-r'; $dados = array('pasnome' => 'param errado');     // sem parâmetro necessário
////    $id = 'n0ex1st';    $dados = array('nome' => 'ssss');   // grupo não existente
//
//    $resultado = (new Criaenvio\Grupo($id))->editar($dados);
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

/**
 * Carregando um grupo.
 */
//try {
//    $id = '-e';   $embeds = null; $parametros = null;
////    $id = 'iy';   $embeds = array('contatos');  $parametros = array('status'=>'inativos');
////    $id = 'n0Ex1st3';
//
//    $grupo = (new Criaenvio\Grupo($id))->carregar($embeds, $parametros);
//    echo '<pre>';
//    print_r($grupo);
//} catch (Exception $e) {
//    var_dump($e);
//}

/**
 * Ativando e desativando um grupo.
 */
//try {
//
//    $id = '-e';
////    $id = 'n0ex1st';    // grupo não existente
//
//    $resultado = (new Criaenvio\Grupo($id))->ativar();
//    //$resultado = (new Criaenvio\Grupo($id))->desativar();
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

/**
 * Ativando e desativando mais de um grupo.
 */
//try {
////    $ids = null;
////    $ids = '-e';
//    $ids = array('-e', 'io');
////    $ids = array('n0ex1st', 'io');    // grupo não existente
//
////    $resultado = (new Criaenvio\Grupo)->ativarGrupos($ids);
//    $resultado = (new Criaenvio\Grupo)->desativarGrupos($ids);
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
