<?php

include_once '../Criaenvio_loader.php';

// VOCÊ DEVE ALTERAR SUA CHAVE AQUI
define('NN_CHAVE', '--suachave--');

/**
 * Buscando contatos
 *
 **/
//
//try {
//
////    $parametros = null; // sem parâmetros, busca todos os campos
////    $parametros = array('status' => 'inativos');
////    $parametros = array('id'=>'Lo,Lq');      // filtrando pelo id
//    $parametros = array('email' => 'contatinho');     // pelo nome
////    $parametros = array('qualidade' => 2, 'datadecadastroinicio'=> '2013-03-22');  // outros parâmetros
////    $parametros = 'seila';  // parametro inválido
//
//    $contatos = (new Criaenvio\Contato())->buscar($parametros);
//
//    echo '<pre>';
//    print_r($contatos);
//
//} catch (Exception $e) {
//    var_dump($e); die;
//}

/**
 * Criando um novo contato
 *
 */

//try {
//
//    $dados = array('nome' => 'nóme do contato', 'email' => 'contatinho002@cecez.com.br');  // inserindo contato novo
////    $dados = array('nome' => 'nome do contato', 'email' => 'bi@Contato.com');  // email ja existente
////    $dados = null;  // dados nulos
////    $dados = array();    // sem dados, sem nome
////    $dados = array('teste'=>'teste');  // campo não reconhecido
////    $dados = array('email' => 'ze@teste.com', 'data_de_nascimento' => '01/01/2000', 'sexo' => 'm');     // outros campos
//
//    $contato = (new Criaenvio\Contato())->criar($dados);
//
//    echo '<pre>';
//    print_r($contato);
//
//} catch (Exception $e) {
//    var_dump($e); die;
//}

/**
 * Carregando um contato.
 */

//try {
////    $id = '-';  $embeds = array('grupos', 'campos');    // com embeds
////    $id = null; $embeds = array('grupos');      // sem id
////    $id = '-';  $embeds = null; // sem embed
////    $id = 'naoexiste'; $embeds = array();
//    $id = 'L0Sx'; $embeds = array('grupos');
//
//    $contato = (new Criaenvio\Contato($id))->carregar($embeds);
//
//    echo '<pre>';
//    print_r($contato);
//} catch (Exception $e) {
//    var_dump($e);
//}

/**
 * Editando um contato
 */

//try {
//
//    $id = '-'; $dados = array('nome' => 'editado Nóvamente', 'email' => 'nexisteaind@teste.com');
////    $id = '-'; $dados = array('email' => 'Contato@Contato.com');     // email ja existente
////    $id = 'OB'; $dados = array('email' => 'asd@Contato.com');     // nao pode alterar e-mail
////    $id = 'n0ex1st';    $dados = array('nome' => 'nome de tessste');   // contato não existente
////    $id = '-'; $dados = array('sexo' => 'f');
//
//    $resultado = (new Criaenvio\Contato($id))->editar($dados);
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
 * Ativando e desativando um contato
 */

//try {
//
//    $id = 'OB';
////    $id = 'n0ex1st';    // contato não existente
//
//    $resultado = (new Criaenvio\Contato($id))->ativar();
////    $resultado = (new Criaenvio\Contato($id))->desativar();
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
 * Atualizando campos personalizados
 */

//try {
//
//    $id = 'OB';     $campos = array();
//
//    // campos do tipo objeto CriaenvioCampoPersonalizado
//    $campo1 = new Criaenvio\CampoPersonalizado('Lo');
//    $campo1->valor = 'valor do campo Lo no objeto';
//    $campos[] = $campo1;
//
//    $campo2 = new Criaenvio\CampoPersonalizado('Lq');
//    $campo2->valor = 'valor do campo Lq no objeto';
//    $campos[] = $campo2;
//
////    $id = 'OB';
//
//    // campos como array
////    $id = 'OB';     $campos = array('Lo' => 'c1', 'Lq' => 'c2', 'L9' => 'c3', 'LZ' => 'c4', 'LJ' => 'camposmimimi');
////    $id = 'n0ex1st';    // contato não existente
//
////    $id = 'OB';     $campos = array('noExiste'=>'asd'); // campo nao existente
//
//    $resultado = (new Criaenvio\Contato($id))->atualizarCamposPersonalizados($campos);
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
 * inscrevendo e desinscrevendo contato em grupos
 */

//try {
//
////    $id = 'OB';     $grupos = null;
////    $id = null;     $grupos = array('te');
////    $id = 'n0ex1st';    $grupos = array('asd');     // contato não existente
//    $id = 'OB';     $grupos = array('iy');
//
//    $resultado = (new Criaenvio\Contato($id))->inscrever($grupos);
////    $resultado = (new Criaenvio\Contato($id))->desinscrever($grupos);
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


///**
// * Criando contato e inserindo em grupo
// */
//try {
//
//    $contato = (new Criaenvio\Contato())->criar(
//                    array(
//                        'nome' => 'nóme do contato',
//                        'email' => 'contatinho004@contato.com.br'
//                    )
//                )->inscrever(
//                        array('ID_G1','ID_G2')
//                   );
//
//    echo '<pre>';
//    print_r($contato);
//
//} catch (Exception $e) {
//    var_dump($e); die;
//}
