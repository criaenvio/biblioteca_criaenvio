<?php

include_once '../Criaenvio_loader.php';

// VOCÊ DEVE ALTERAR SUA CHAVE AQUI
define('NN_CHAVE', '=chave=');

//try {
//
//    $parametros = null; // sem parâmetros
// //   $parametros = array('id'=>'-W, -y');      // filtrando pelo id
// //   $parametros = array('assunto' => 'as');     // pelo assunto
// //   $parametros = array('contador' => '93');     // pelo contador
// //   $parametros = array('datadecadastroinicio' => '2015-03-05', 'datadecadastrotermino' => '2019-03-05');     // pela data
//   // $parametros = array('nome' => 'tesste','id' => '-Q');  // nome e id
//
//    $mensagens = (new Criaenvio\Mensagem())->buscar($parametros);
//
//    echo '<pre>';
//    print_r($mensagens->getDados());
//
//} catch (Exception $e) {
//    var_dump($e); die;
//}

/**
 * Removendo uma mensagem.
 */
//try {
//    $id = 'i';
////    $id = 'n0Ex1st3';
//
//    $resultado = (new Criaenvio\Mensagem($id))->remover();
//
//    if ($resultado) {
//        echo 'sucesso';
//    } else {
//        echo 'falha';
//    }
//
//} catch (Exception $e) {
//    echo $e->getMessage();
//}

/**
 * Carregando uma mensagem.
 */
//try {
//    $id = '-y';
////    $id = 'n0Ex1st3';
//
//    $campo = (new Criaenvio\Mensagem($id))->carregar();
//    echo '<pre>';
//    print_r($campo);
//} catch (Exception $e) {
//    echo $e->getMessage();
//}

/**
 * Criação de mensagem.
 */
//try {
//
//    $dados = array('assunto' => 'Mensagem nóva', 'html' => 'Página de teste');
//    $dados = array('assunto' => 'Mensagem nóva ' . date('d/m/Y H:i:s'), 'html' => '<html> 	<head> 		<title></title> 	</head> 	<body> 		<h1 style="text-align: center;"> 	<img src="http://meioambiente.culturamix.com/blog/wp-content/gallery/papel-de-parede-de-luar/papel-de-parede-de-luar-6.jpg">		<span style="font-family:comic sans ms;">Atlas</span></h1> 		<p style="text-align: center;"> 			<a href="http://google.com">MAPA AMERICA</a></p> 		<p style="text-align: center;"> 			américa do sul & teste</p> 		<p> 			países: argentina, chile, uruguai, brasil, paraguai, colômbia, peru, venezuela, equador, guiana, guiana francesa, suriname</p> 	</body> </html>'); // nome ja existente
//    $dados = null;  // dados nulos
//    $dados = array(
//        'assunto'               => 'Assunto novo',
//        'html'                  => 'Só um texto',
//        'nome'                  => 'Nome secundário da newsletter',
//        'email_resposta'        => 'teste@teste2.com.br',
//        'mensagem_descadastro'  => 'Deseja sair da lista? Clique no link ao lado'
//    );
//
//    $grupo = (new Criaenvio\Mensagem())->criar($dados);
//
//    echo '<pre>';
//    print_r($grupo);
//
//} catch (Exception $e) {
//    echo $e->getMessage();
//    die;
//}