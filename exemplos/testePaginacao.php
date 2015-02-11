<?php

include_once '../Criaenvio_loader.php';

// VOCÊ DEVE ALTERAR SUA CHAVE AQUI
define('NN_CHAVE', '--suachave--');

echo '<pre>';
$idContato = '-';
$idGrupo = 'T6';
$contPassou = $contNaoPassou = 0;

/**
 * Consultar contatos sem parâmetros.
 * Buscar:
 * 0 - Verificar se é paginado.
 * 1 - página anterior (inválido)
 * 2 - próxima página
 * 3 - próxima página novamente
 * 4 - página anterior.
 * 5 - ir até uma página
 * 6 - ir até a última página
 * 7 - ir até uma página posterior a última (inválida)
 */
echo '<h2>Teste de paginação com busca de contatos sem parâmetros</h2>';
$contatos = (new Criaenvio\Contato())->buscar();
if (!$contatos || !($contatos instanceof Criaenvio\Resposta) || !$contatos->getDados() ) {
    echo 'Contatos sem parâmetros: Falha ao buscar contatos sem parâmetro<br>';
    print_r($contatos);
    die;
}

if (!$contatos->isPaginado()) {
    echo 'Contatos sem parâmetros: Erro ao verificar se contatos são paginados.';
    print_r($contatos);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if ($contatos->paginaAnterior() || $contatos->getPaginaAtual() != 1) {
    echo 'Contatos sem parâmetros: Erro ao carregar página anterior da primeira página (inválida).<br>';
    print_r($contatos);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if(!$contatos->proximaPagina() || $contatos->getPaginaAtual() != 2) {
    echo 'Contatos sem parâmetros: Erro ao carregar próxima página (2)<br>';
    print_r($contatos);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if (!$contatos->proximaPagina() || $contatos->getPaginaAtual() != 3) {
    echo 'Contatos sem parâmetros: Erro ao carregar próxima página (3)<br>';
    print_r($contatos);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if (!$contatos->paginaAnterior() || $contatos->getPaginaAtual() != 2) {
    echo 'Contatos sem parâmetros: Erro ao carregar página anterior (2)<br>';
    print_r($contatos);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if (!$contatos->irParaPagina(10) || $contatos->getPaginaAtual() != 10) {
    echo 'Contatos sem parâmetros: Erro ao ir para página 10<br>';
    print_r($contatos);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if (!$contatos->irParaPagina(3248) || $contatos->getPaginaAtual() != 3248) {
    echo 'Contatos sem parâmetros: Erro ao ir para página 3248 (última)<br>';
    print_r($contatos);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if ($contatos->proximaPagina() || $contatos->getPaginaAtual() != 3248) {
    echo 'Contatos sem parâmetros: Erro ao ir para próxima página  após a final (inválida)<br>';
    print_r($contatos);
    $contNaoPassou++;
} else {
    $contPassou++;
}

/**
 * Consultar contatos com parâmetros.
 * Buscar:
 * 0 - Verificar se é paginado.
 * 1 - página anterior (inválido)
 * 2 - próxima página
 * 3 - próxima página novamente
 * 4 - página anterior.
 * 5 - ir até uma página
 * 6 - ir até a última página
 * 7 - ir até uma página posterior a última (inválida)
 */
echo '<h2>Teste de paginação com busca de contatos com parâmetros</h2>';
$contatos = (new Criaenvio\Contato())->buscar(['email'=>'elia']);
if (!$contatos || !($contatos instanceof Criaenvio\Resposta) || !$contatos->getDados() ) {
    echo 'Contatos com parâmetros: Falha ao buscar contatos sem parâmetro<br>';
    print_r($contatos);
    die;
}

if (!$contatos->isPaginado()) {
    echo 'Contatos com parâmetros: Erro ao verificar se contatos são paginados.';
    print_r($contatos);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if ($contatos->paginaAnterior() || $contatos->getPaginaAtual() != 1) {
    echo 'Contatos com parâmetros: Erro ao carregar página anterior da primeira página (inválida).<br>';
    print_r($contatos);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if(!$contatos->proximaPagina() || $contatos->getPaginaAtual() != 2) {
    echo 'Contatos com parâmetros: Erro ao carregar próxima página (2)<br>';
    print_r($contatos);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if (!$contatos->proximaPagina() || $contatos->getPaginaAtual() != 3) {
    echo 'Contatos com parâmetros: Erro ao carregar próxima página (3)<br>';
    print_r($contatos);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if (!$contatos->paginaAnterior() || $contatos->getPaginaAtual() != 2) {
    echo 'Contatos com parâmetros: Erro ao carregar página anterior (2)<br>';
    print_r($contatos);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if (!$contatos->irParaPagina(10) || $contatos->getPaginaAtual() != 10) {
    echo 'Contatos com parâmetros: Erro ao ir para página 10<br>';
    print_r($contatos);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if (!$contatos->irParaPagina(17) || $contatos->getPaginaAtual() != 17) {
    echo 'Contatos com parâmetros: Erro ao ir para página 3246 (última)<br>';
    print_r($contatos);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if ($contatos->proximaPagina() || $contatos->getPaginaAtual() != 17) {
    echo 'Contatos com parâmetros: Erro ao ir para próxima página  após a final (inválida)<br>';
    print_r($contatos);
    $contNaoPassou++;
} else {
    $contPassou++;
}

/**
 * Carregar contato sem embeds.
 * Testar:
 * 1 - Carrega sem embeds.
 */
echo '<h2>Teste no carregamento do contato sem embeds</h2>';
$contato = (new Criaenvio\Contato($idContato))->carregar();
if (!$contato || $contato == null || !($contato instanceof Criaenvio\Contato)) {
    echo 'Contatos sem embeds: Contatos sem embeds: Falha ao carregar contato sem embeds<br>';
    print_r($contato);
    die;
}

if (isset($contato->grupos) || isset($contato->campos)) {
    echo 'Contatos sem embeds: Erro ao verificar se contato não possui embeds<br>';
    print_r($contato);
    $contNaoPassou++;
} else {
    $contPassou++;
}

/**
 * Carregar contato com embed grupos.
 * Testar:
 * 1 - Carrega com grupos.
 * 2 - Grupos são paginados.
 * 3 - Página anterior (inválido)
 * 4 - próxima página
 * 5 - próxima página novamente
 * 6 - página anterior.
 * 7 - ir até uma página
 * 8 - ir até a última página
 * 9 - ir até uma página posterior a última (inválida)
 */
echo '<h2>Teste no carregamento do contato com embed grupos</h2>';
$contato = (new Criaenvio\Contato($idContato))->carregar(array('grupos'));
if (!$contato || $contato == null || !($contato instanceof Criaenvio\Contato)) {
    echo 'Contatos com grupos: Falha ao carregar contato sem embeds<br>';
    print_r($contato);
    die;
}

if (!isset($contato->grupos)) {
    echo 'Contatos com grupos: Erro ao verificar se contato possui embeds<br>';
    print_r($contato);
    die;
} else {
    $contPassou++;
}

if (!$contato->grupos->isPaginado()) {
    echo 'Contatos com grupos: Erro ao verificar se grupos do contato são paginados.<br>';
    print_r($contato);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if ($contato->grupos->paginaAnterior() || $contato->grupos->getPaginaAtual() != 1) {
    echo 'Contatos com grupos: Erro ao carregar página anterior da primeira página (inválida).<br>';
    print_r($contato);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if(!$contato->grupos->proximaPagina() || $contato->grupos->getPaginaAtual() != 2) {
    echo 'Contatos com grupos: Erro ao carregar próxima página (2)<br>';
    print_r($contato);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if (!$contato->grupos->proximaPagina() || $contato->grupos->getPaginaAtual() != 3) {
    echo 'Contatos com grupos: Erro ao carregar próxima página (3)<br>';
    print_r($contato);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if (!$contato->grupos->paginaAnterior() || $contato->grupos->getPaginaAtual() != 2) {
    echo 'Contatos com grupos: Erro ao carregar página anterior (2)<br>';
    print_r($contato);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if (!$contato->grupos->irParaPagina(3) || $contato->grupos->getPaginaAtual() != 3) {
    echo 'Contatos com grupos: Erro ao ir para página 10<br>';
    print_r($contato);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if (!$contato->grupos->irParaPagina(4) || $contato->grupos->getPaginaAtual() != 4) {
    echo 'Contatos com grupos: Erro ao ir para página 3246 (última)<br>';
    print_r($contato);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if ($contato->grupos->proximaPagina() || $contato->grupos->getPaginaAtual() != 4) {
    echo 'Contatos com grupos: Erro ao ir para próxima página  após a final (inválida)<br>';
    print_r($contato);
    $contNaoPassou++;
} else {
    $contPassou++;
}

/**
 * Carregar contato com embed grupos e campos.
 * Testar:
 * 1  - Carrega com grupos e campos.
 * 2  - Grupos são paginados.
 * 3  - Campos não são paginados.
 * 4  - Página anterior (inválido)
 * 5  - próxima página
 * 6  - próxima página novamente
 * 7  - página anterior.
 * 8  - ir até uma página
 * 9  - ir até a última página
 * 10 - ir até uma página posterior a última (inválida)
 * 11 - continua com campos
 */
echo '<h2>Teste no carregamento do contato com embeds grupos e campos</h2>';
$contato = (new Criaenvio\Contato($idContato))->carregar(array('grupos', 'campos'));
if (!$contato || $contato == null || !($contato instanceof Criaenvio\Contato)) {
    echo 'Contatos com campos e grupos: Falha ao carregar contato sem embeds<br>';
    print_r($contato);
    die;
}

if (!isset($contato->grupos)) {
    echo 'Contatos com campos e grupos: Erro ao verificar se contato possui embed grupos<br>';
    print_r($contato);
    die;
} else {
    $contPassou++;
}

if (!isset($contato->campos)) {
    echo 'Contatos com campos e grupos: Erro ao verificar se contato possui embed campos<br>';
    print_r($contato);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if (!$contato->grupos->isPaginado()) {
    echo 'Contatos com campos e grupos: Erro ao verificar se grupos do contato são paginados.<br>';
    print_r($contato);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if ($contato->campos->isPaginado()) {
    echo 'Contatos com campos e grupos: Erro ao verificar se campos do contato são paginados.<br>';
    print_r($contato);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if ($contato->grupos->paginaAnterior() || $contato->grupos->getPaginaAtual() != 1) {
    echo 'Contatos com campos e grupos: Erro ao carregar página anterior da primeira página (inválida).<br>';
    print_r($contato);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if(!$contato->grupos->proximaPagina() || $contato->grupos->getPaginaAtual() != 2) {
    echo 'Contatos com campos e grupos: Erro ao carregar próxima página (2)<br>';
    print_r($contato);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if (!$contato->grupos->proximaPagina() || $contato->grupos->getPaginaAtual() != 3) {
    echo 'Contatos com campos e grupos: Erro ao carregar próxima página (3)<br>';
    print_r($contato);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if (!$contato->grupos->paginaAnterior() || $contato->grupos->getPaginaAtual() != 2) {
    echo 'Contatos com campos e grupos: Erro ao carregar página anterior (2)<br>';
    print_r($contato);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if (!$contato->grupos->irParaPagina(3) || $contato->grupos->getPaginaAtual() != 3) {
    echo 'Contatos com campos e grupos: Erro ao ir para página 10<br>';
    print_r($contato);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if (!$contato->grupos->irParaPagina(4) || $contato->grupos->getPaginaAtual() != 4) {
    echo 'Contatos com campos e grupos: Erro ao ir para página 3246 (última)<br>';
    print_r($contato);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if ($contato->grupos->proximaPagina() || $contato->grupos->getPaginaAtual() != 4) {
    echo 'Contatos com campos e grupos: Erro ao ir para próxima página  após a final (inválida)<br>';
    print_r($contato);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if (!isset($contato->campos)) {
    echo 'Contatos com campos e grupos: Erro ao verificar se contato possui embed campos<br>';
    print_r($contato);
    $contNaoPassou++;
} else {
    $contPassou++;
}

/**
 * Carregar contato com embed campos.
 * Testar:
 * 1  - Carrega com campos.
 * 2  - Carrega sem grupos.
 * 3  - Campos não são paginados.
 */
echo '<h2>Teste no carregamento do contato com embed campos</h2>';
$contato = (new Criaenvio\Contato($idContato))->carregar(array('campos'));
if (!$contato || $contato == null || !($contato instanceof Criaenvio\Contato)) {
    echo 'Contatos com campos: Falha ao carregar contato sem embeds<br>';
    print_r($contato);
    die;
}

if (isset($contato->grupos)) {
    echo 'Contatos com campos: Erro ao verificar se contato não possui embed grupos<br>';
    print_r($contato);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if (!isset($contato->campos)) {
    echo 'Contatos com campos: Erro ao verificar se contato possui embed campos<br>';
    print_r($contato);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if ($contato->campos->isPaginado()) {
    echo 'Contatos com campos: Erro ao verificar se campos do contato são paginados.<br>';
    print_r($contato);
    $contNaoPassou++;
} else {
    $contPassou++;
}

/**
 * Buscar campos sem parâmetros.
 * Testar:
 * 1 - Verificar se é paginado.
 * 2 - página anterior (inválido)
 * 3 - próxima página
 * 4 - próxima página novamente
 * 5 - página anterior.
 * 6 - ir até uma página
 * 7 - ir até a última página
 * 8 - ir até uma página posterior a última (inválida)
 */
echo '<h2>Teste de paginação com busca de campos sem parâmetros</h2>';
$campos = (new Criaenvio\CampoPersonalizado())->buscar();
if (!$campos || !($campos instanceof Criaenvio\Resposta) || !$campos->getDados() ) {
    echo 'Campos sem parâmetro: Falha ao buscar campos sem parâmetro<br>';
    print_r($campos);
    die;
}

if (!$campos->isPaginado()) {
    echo 'Campos sem parâmetro: Erro ao verificar se campos são paginados.';
    print_r($campos);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if ($campos->paginaAnterior() || $campos->getPaginaAtual() != 1) {
    echo 'Campos sem parâmetro: Erro ao carregar página anterior da primeira página (inválida).<br>';
    print_r($campos);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if(!$campos->proximaPagina() || $campos->getPaginaAtual() != 2) {
    echo 'Campos sem parâmetro: Erro ao carregar próxima página (2)<br>';
    print_r($campos);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if ($campos->proximaPagina() || $campos->getPaginaAtual() != 2) {
    echo 'Campos sem parâmetro: Erro ao carregar próxima página (3)<br>';
    print_r($campos);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if (!$campos->paginaAnterior() || $campos->getPaginaAtual() != 1) {
    echo 'Campos sem parâmetro: Erro ao carregar página anterior (2)<br>';
    print_r($campos);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if (!$campos->irParaPagina(2) || $campos->getPaginaAtual() != 2) {
    echo 'Campos sem parâmetro: Erro ao ir para página 10<br>';
    print_r($campos);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if (!$campos->irParaPagina(2) || $campos->getPaginaAtual() != 2) {
    echo 'Campos sem parâmetro: Erro ao ir para página 3246 (última)<br>';
    print_r($campos);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if ($campos->proximaPagina() || $campos->getPaginaAtual() != 2) {
    echo 'Campos sem parâmetro: Erro ao ir para próxima página  após a final (inválida)<br>';
    print_r($campos);
    $contNaoPassou++;
} else {
    $contPassou++;
}

/**
 * Consultar campos com parâmetros.
 * Buscar:
 * 1 - Verificar se é paginado.
 * 2 - página anterior (inválido)
 * 3 - próxima página
 * 4 - próxima página novamente
 * 5 - página anterior.
 * 6 - ir até uma página
 * 7 - ir até a última página
 * 8 - ir até uma página posterior a última (inválida)
 */
echo '<h2>Teste de paginação com busca de campos com parâmetros</h2>';
$campos = (new Criaenvio\CampoPersonalizado())->buscar(['nome'=>'teste']);
if (!$campos || !($campos instanceof Criaenvio\Resposta) || !$campos->getDados() ) {
    echo 'Campos com parâmetro: Falha ao buscar campos com parâmetro<br>';
    print_r($campos);
    die;
}

if (!$campos->isPaginado()) {
    echo 'Campos com parâmetro: Erro ao verificar se campos são paginados.';
    print_r($campos);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if ($campos->paginaAnterior() || $campos->getPaginaAtual() != 1) {
    echo 'Campos com parâmetro: Erro ao carregar página anterior da primeira página (inválida).<br>';
    print_r($campos);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if(!$campos->proximaPagina() || $campos->getPaginaAtual() != 2) {
    echo 'Campos com parâmetro: Erro ao carregar próxima página (2)<br>';
    print_r($campos);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if ($campos->proximaPagina() || $campos->getPaginaAtual() != 2) {
    echo 'Campos com parâmetro: Erro ao carregar próxima página (2)<br>';
    print_r($campos);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if (!$campos->paginaAnterior() || $campos->getPaginaAtual() != 1) {
    echo 'Campos com parâmetro: Erro ao carregar página anterior (1)<br>';
    print_r($campos);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if (!$campos->irParaPagina(2) || $campos->getPaginaAtual() != 2) {
    echo 'Campos com parâmetro: Erro ao ir para página 2<br>';
    print_r($campos);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if (!$campos->irParaPagina(2) || $campos->getPaginaAtual() != 2) {
    echo 'Campos com parâmetro: Erro ao ir para página 3246 (última)<br>';
    print_r($campos);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if ($campos->proximaPagina() || $campos->getPaginaAtual() != 2) {
    echo 'Campos com parâmetro: Erro ao ir para próxima página  após a final (inválida)<br>';
    print_r($campos);
    $contNaoPassou++;
} else {
    $contPassou++;
}

/**
 * Consultar grupos sem parâmetros.
 * Buscar:
 * 0 - Verificar se é paginado.
 * 1 - página anterior (inválido)
 * 2 - próxima página
 * 3 - próxima página novamente
 * 4 - página anterior.
 * 5 - ir até uma página
 * 6 - ir até a última página
 * 7 - ir até uma página posterior a última (inválida)
 */
echo '<h2>Teste de paginação com busca de grupos sem parâmetros</h2>';
$grupos = (new Criaenvio\Grupo())->buscar();
if (!$grupos || !($grupos instanceof Criaenvio\Resposta) || !$grupos->getDados() ) {
    echo 'Grupos sem parâmetro: Falha ao buscar grupos sem parâmetro<br>';
    print_r($grupos);
    die;
}

if (!$grupos->isPaginado()) {
    echo 'Grupos sem parâmetro: Erro ao verificar se grupos são paginados.';
    print_r($grupos);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if ($grupos->paginaAnterior() || $grupos->getPaginaAtual() != 1) {
    echo 'Grupos sem parâmetro: Erro ao carregar página anterior da primeira página (inválida).<br>';
    print_r($grupos);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if(!$grupos->proximaPagina() || $grupos->getPaginaAtual() != 2) {
    echo 'Grupos sem parâmetro: Erro ao carregar próxima página (2)<br>';
    print_r($grupos);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if (!$grupos->proximaPagina() || $grupos->getPaginaAtual() != 3) {
    echo 'Grupos sem parâmetro: Erro ao carregar próxima página (3)<br>';
    print_r($grupos);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if (!$grupos->paginaAnterior() || $grupos->getPaginaAtual() != 2) {
    echo 'Grupos sem parâmetro: Erro ao carregar página anterior (2)<br>';
    print_r($grupos);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if (!$grupos->irParaPagina(3) || $grupos->getPaginaAtual() != 3) {
    echo 'Grupos sem parâmetro: Erro ao ir para página 3<br>';
    print_r($grupos);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if (!$grupos->irParaPagina(4) || $grupos->getPaginaAtual() != 4) {
    echo 'Grupos sem parâmetro: Erro ao ir para página 4 (última)<br>';
    print_r($grupos);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if ($grupos->proximaPagina() || $grupos->getPaginaAtual() != 4) {
    echo 'Grupos sem parâmetro: Erro ao ir para próxima página  após a final (inválida)<br>';
    print_r($grupos);
    $contNaoPassou++;
} else {
    $contPassou++;
}

/**
 * Consultar grupos com parâmetros.
 * Buscar:
 * 0 - Verificar se é paginado.
 * 1 - página anterior (inválido)
 * 2 - próxima página
 * 3 - próxima página novamente
 * 4 - página anterior.
 * 5 - ir até uma página
 * 6 - ir até a última página
 * 7 - ir até uma página posterior a última (inválida)
 */
echo '<h2>Teste de paginação com busca de grupos com parâmetros</h2>';
$grupos = (new Criaenvio\Grupo())->buscar(['nome'=>'grupo']);
if (!$grupos || !($grupos instanceof Criaenvio\Resposta) || !$grupos->getDados() ) {
    echo 'Grupos com parâmetro: Falha ao buscar grupos sem parâmetro<br>';
    print_r($grupos);
    die;
}

if (!$grupos->isPaginado()) {
    echo 'Grupos com parâmetro: Erro ao verificar se grupos são paginados.';
    print_r($grupos);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if ($grupos->paginaAnterior() || $grupos->getPaginaAtual() != 1) {
    echo 'Grupos com parâmetro: Erro ao carregar página anterior da primeira página (inválida).<br>';
    print_r($grupos);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if(!$grupos->proximaPagina() || $grupos->getPaginaAtual() != 2) {
    echo 'Grupos com parâmetro: Erro ao carregar próxima página (2)<br>';
    print_r($grupos);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if ($grupos->proximaPagina() || $grupos->getPaginaAtual() != 2) {
    echo 'Grupos com parâmetro: Erro ao carregar próxima página (3)<br>';
    print_r($grupos);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if (!$grupos->paginaAnterior() || $grupos->getPaginaAtual() != 1) {
    echo 'Grupos com parâmetro: Erro ao carregar página anterior (2)<br>';
    print_r($grupos);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if (!$grupos->irParaPagina(2) || $grupos->getPaginaAtual() != 2) {
    echo 'Grupos com parâmetro: Erro ao ir para página 2<br>';
    print_r($grupos);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if (!$grupos->irParaPagina(2) || $grupos->getPaginaAtual() != 2) {
    echo 'Grupos com parâmetro: Erro ao ir para página 2 (última)<br>';
    print_r($grupos);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if ($grupos->proximaPagina() || $grupos->getPaginaAtual() != 2) {
    echo 'Grupos com parâmetro: Erro ao ir para próxima página  após a final (inválida)<br>';
    print_r($grupos);
    $contNaoPassou++;
} else {
    $contPassou++;
}

/**
 * Carregar grupo sem embeds.
 * Testar:
 * 1 - Carrega sem embeds.
 */
echo '<h2>Teste no carregamento do contato sem embeds</h2>';
$grupo = (new Criaenvio\Grupo($idGrupo))->carregar();
if (!$grupo || $grupo == null || !($grupo instanceof Criaenvio\Grupo)) {
    echo 'Grupo se embds: Falha ao carregar contato sem embeds<br>';
    print_r($grupo);
    die;
}

if (isset($grupo->contatos)) {
    echo 'Grupo se embds: Erro ao verificar se contato não possui embeds<br>';
    print_r($contato);
    $contNaoPassou++;
} else {
    $contPassou++;
}

/**
 * Carregar grupo com embed contatos.
 * Testar:
 * 1 - Carrega com contatos.
 * 2 - Contatos são paginados.
 * 3 - Página anterior (inválido)
 * 4 - próxima página
 * 5 - próxima página novamente
 * 6 - página anterior.
 * 7 - ir até uma página
 * 8 - ir até a última página
 * 9 - ir até uma página posterior a última (inválida)
 */
echo '<h2>Teste no carregamento do grupos com embed contatos</h2>';
$grupo = (new Criaenvio\Grupo($idGrupo))->carregar(array('contatos'));
if (!$grupo || $grupo == null || !($grupo instanceof Criaenvio\Grupo)) {
    echo 'Grupos com contato: Falha ao carregar grupo com embeds<br>';
    print_r($grupo);
    die;
}

if (!isset($grupo->contatos)) {
    echo 'Grupos com contato: Erro ao verificar se grupo possui embeds<br>';
    print_r($grupo);
    die;
} else {
    $contPassou++;
}

if (!$grupo->contatos->isPaginado()) {
    echo 'Grupos com contato: Erro ao verificar se contatos do grupo são paginados.<br>';
    print_r($grupo);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if ($grupo->contatos->paginaAnterior() || $grupo->contatos->getPaginaAtual() != 1) {
    echo 'Grupos com contato: Erro ao carregar página anterior da primeira página (inválida).<br>';
    print_r($grupo);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if(!$grupo->contatos->proximaPagina() || $grupo->contatos->getPaginaAtual() != 2) {
    echo 'Grupos com contato: Erro ao carregar próxima página (2)<br>';
    print_r($grupo);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if (!$grupo->contatos->proximaPagina() || $grupo->contatos->getPaginaAtual() != 3) {
    echo 'Grupos com contato: Erro ao carregar próxima página (3)<br>';
    print_r($grupo);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if (!$grupo->contatos->paginaAnterior() || $grupo->contatos->getPaginaAtual() != 2) {
    echo 'Grupos com contato: Erro ao carregar página anterior (2)<br>';
    print_r($grupo);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if (!$grupo->contatos->irParaPagina(10) || $grupo->contatos->getPaginaAtual() != 10) {
    echo 'Grupos com contato: Erro ao ir para página 10<br>';
    print_r($grupo);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if (!$grupo->contatos->irParaPagina(15) || $grupo->contatos->getPaginaAtual() != 15) {
    echo 'Grupos com contato: Erro ao ir para página 15 (última)<br>';
    print_r($grupo);
    $contNaoPassou++;
} else {
    $contPassou++;
}

if ($grupo->contatos->proximaPagina() || $grupo->contatos->getPaginaAtual() != 15) {
    echo 'Grupos com contatos: Erro ao ir para próxima página  após a final (inválida)<br>';
    print_r($grupo);
    $contNaoPassou++;
} else {
    $contPassou++;
}

/**
 * Resultado final dos testes.
 */
if ($contNaoPassou == 0) {
    echo "Todos $contPassou testes passaram";
} else {
    echo "$contPassou testes passaram<br>";
    echo "$contNaoPassou testes não passaram<br>";
}