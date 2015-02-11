<?php

include_once '../Criaenvio_loader.php';

// VOCÊ DEVE ALTERAR SUA CHAVE AQUI
define('NN_CHAVE', '--suachave--');

echo '<pre>';

/**
 * Teste básico relação Contato x Campos
 */
//$id = '-'; $embeds = array('campos');//Id e embed válidos.
////$id = '-'; $embeds = array();//Id válido e embed vazio.
////$id = '-'; $embeds = 'campos';//Id válido e embed não array.
////$id = '-'; $embeds = null;//Id válido e embed null.
////$id = null; $embeds = array('campos');//Id nulo e embed válido.
////$id = 'naoExiste'; $embeds = array();//Id não existe e embed vazio.
//
//$contato = new Criaenvio\Contato($id);
//$contato = $contato->carregar($embeds);
//print_r($contato);

/**
 * Teste básico relação Contato x Grupos
 */
//$id = '-'; $embeds = array('grupos');//Id e embed válidos.
////$id = '-'; $embeds = array();//Id e embed vazio.
////$id = '-'; $embeds = 'grupos';//Id válido e embed não array.
////$id = '-'; $embeds = null;//Id válido e embed null.
////$id = null; $embeds = array('grupos');//Id nulo e embed válidos.
////$id = 'naoExiste'; $embeds = array();//Id e embed vazio.
//$contato = new Criaenvio\Contato($id);
//$contato = $contato->carregar($embeds);
//print_r($contato);

/**
 * Teste relação Contato, Grupo Campos
 */
//$id = '-'; $embeds = array('grupos', 'campos');//Id e embed válidos.
////$id = '-'; $embeds = array();//Id e embed vazio.
////$id = '-'; $embeds = 'grupos';//Id válido e embed não array.
////$id = '-'; $embeds = null;//Id válido e embed null.
////$id = null; $embeds = array('grupos', 'campos');//Id nulo e embed válidos.
////$id = 'naoExiste'; $embeds = array();//Id e embed vazio.
//$contato = new Criaenvio\Contato($id);
//$contato = $contato->carregar($embeds);
//print_r($contato);

/**
 * Teste básico relação Grupo x Contatos
 */
//$id = 'iy'; $embeds = array('contatos');//Id e embed válidos.
////$id = 'iy'; $embeds = array();//Id e embed vazio.
////$id = 'iy'; $embeds = 'contatos';//Id válido e embed não array.
////$id = 'iy'; $embeds = null;//Id válido e embed null.
////$id = null; $embeds = array('contatos');//Id nulo e embed válidos.
////$id = 'naoExiste'; $embeds = array();//Id e embed vazio.
//$grupo = new Criaenvio\Grupo($id);
//$grupo = $grupo->carregar($embeds);
//print_r($grupo);