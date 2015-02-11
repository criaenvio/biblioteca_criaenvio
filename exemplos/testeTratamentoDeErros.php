<?php

include_once '../Criaenvio_loader.php';

// VOCÊ DEVE ALTERAR SUA CHAVE AQUI
define('NN_CHAVE', '--suachave--');

echo '<pre>';
$idContato = '-';
$idGrupo = 'T6';
$idCampo = 'Ly';
$contPassou = $contNaoPassou = 0;

/**
 * Ativando contato sem id.
 */
$contato = new Criaenvio\Contato();
try {
    $contato->ativar();

    $contNaoPassou++;
    echo 'Erro: ativou contato sem id.<br>';
} catch (BadMethodCallException $e) {
    $contPassou++;
} catch (Exception $e) {
    $contNaoPassou++;
    echo 'Erro ao ativar contato sem id: excpetion inexperada.<br>';
}

/**
 * Desativando contato sem id.
 */
$contato = new Criaenvio\Contato();
try {
    $contato->desativar();

    $contNaoPassou++;
    echo 'Erro: desativou contato sem id.<br>';
} catch (BadMethodCallException $e) {
    $contPassou++;
} catch (Exception $e) {
    $contNaoPassou++;
    echo 'Erro ao desativar contato sem id: exceeption inexperada.<br>';
}

/**
 * Inscrevendo contato sem id.
 */
$contato = new Criaenvio\Contato();
try {
    $contato->inscrever(array($idGrupo));

    $contNaoPassou++;
    echo 'Erro: inscreveu contato sem id.<br>';
} catch (BadMethodCallException $e) {
    $contPassou++;
} catch (Exception $e) {
    $contNaoPassou++;
    echo 'Erro ao inscrever contato sem id: exception inesperada.<br>';
}


/**
 * Inscrevendo contato sem passar grupos.
 */
$contato = new Criaenvio\Contato($idContato);
try {
    $contato->inscrever(array());

    $contNaoPassou++;
    echo 'Erro: inscreveu contato em array de grupos vazio.<br>';
} catch (BadMethodCallException $e) {
    $contPassou++;
} catch (Exception $e) {
    $contNaoPassou++;
    echo 'Erro ao inscrever contato em array de grupos vazio: excepetion inesperada.<br>';
}

/**
 * Inscrevendo contato passando um não array.
 */
$contato = new Criaenvio\Contato($idContato);
try {
    $contato->inscrever($idGrupo);

    $contNaoPassou++;
    echo 'Erro: inscreveu contato em um não array.<br>';
} catch (BadMethodCallException $e) {
    $contPassou++;
} catch (Exception $e) {
    $contNaoPassou++;
    echo 'Erro ao inscrever contato em um não array: exception inesparada.<br>';
}

/**
 * Desinscrevendo contato sem id.
 */
$contato = new Criaenvio\Contato();
try {
    $contato->desinscrever(array($idGrupo));

    $contNaoPassou++;
    echo 'Erro: desiscreveu contato sem id.<br>';
} catch (BadMethodCallException $e) {
    $contPassou++;
} catch (Exception $e) {
    $contNaoPassou++;
    echo 'Erro ao desiscrever contato sem id: exception não esparada.<br>';
}


/**
 * Desinscrevendo contato sem passar grupos.
 */
$contato = new Criaenvio\Contato($idContato);
try {
    $contato->desinscrever(array());

    $contNaoPassou++;
    echo 'Erro: desiscreveu contato de array de grupos vazio.<br>';
} catch (BadMethodCallException $e) {
    $contPassou++;
} catch (Exception $e) {
    $contNaoPassou++;
    echo 'Erro ao desiscrever contato de array de grupos vazio: exception inesperada.<br>';
}

/**
 * Desinscrevendo contato passando um não array.
 */
$contato = new Criaenvio\Contato($idContato);
try {
    $contato->desinscrever($idGrupo);

    $contNaoPassou++;
    echo 'Erro: desiscreveu contato de um não array.<br>';
} catch (BadMethodCallException $e) {
    $contPassou++;
} catch (Exception $e) {
    $contNaoPassou++;
    echo 'Erro ao desiscrever contato de um não array: exception não esperada.<br>';
}

/**
 * Atualizar campos do contato sem id.
 */
$contato = new Criaenvio\Contato();
try {
    $contato->atualizarCamposPersonalizados(array($idCampo));

    $contNaoPassou++;
    echo 'Erro: atualizou campos de um contato sem id.<br>';
} catch (BadMethodCallException $e) {
    $contPassou++;
} catch (Exception $e) {
    $contNaoPassou++;
    echo 'Erro ao atualizar os campos de um contato sem id: exception não esperada.<br>';
}


/**
 * Atualizar campos do contato sem passar campos.
 */
$contato = new Criaenvio\Contato($idContato);
try {
    $contato->atualizarCamposPersonalizados(array());

    $contNaoPassou++;
    echo 'Erro: atualizou campos de um contato passando array sem campos.<br>';
} catch (BadMethodCallException $e) {
    $contPassou++;
} catch (Exception $e) {
    $contNaoPassou++;
    echo 'Erro ao atualizar campos de um contato passando array sem campos.<br>';
}

/**
 * Atualizar campos do contato passando um não array.
 */
$contato = new Criaenvio\Contato($idContato);
try {
    $contato->atualizarCamposPersonalizados($idCampo);

    $contNaoPassou++;
    echo 'Erro: atualizou campo de um contato passando um não array.<br>';
} catch (BadMethodCallException $e) {
    $contPassou++;
} catch (Exception $e) {
    $contNaoPassou++;
    echo 'Erro ao atualizar campo de um contato passando um não array: excepetion não esperada.<br>';
}

/**
 * Ativar grupos passando um não array.
 */
try {
    (new Criaenvio\Grupo())->ativarGrupos($idGrupo);
    $contNaoPassou++;
    echo 'Erro: ativou grupos passando um não array.<br>';
} catch (BadMethodCallException $e) {
    $contPassou++;
} catch (Exception $e) {
    $contNaoPassou++;
    echo 'Erro ao ativar grupos passando um não array: exception não esparada.<br>';
}

/**
 * Ativar grupos passando um array vazio.
 */
try {
    (new Criaenvio\Grupo)->ativarGrupos(array());
    $contNaoPassou++;
    echo 'Erro: ativou grupo passando array sem elementos.<br>';
} catch (BadMethodCallException $e) {
    $contPassou++;
} catch (Exception $e) {
    $contNaoPassou++;
    echo 'Erro ao ativar grupos passando array sem elementos: exception não esperada.<br>';
    print_r($e);
}

/**
 * Desativar grupos passando um não array.
 */
try {
    (new Criaenvio\Grupo())->desativarGrupos($idGrupo);
    $contNaoPassou++;
    echo 'Erro: desativou grupo passando um não array.<br>';
} catch (BadMethodCallException $e) {
    $contPassou++;
} catch (Exception $e) {
    $contNaoPassou++;
    echo 'Erro ao desativar grupo passando um não array: exception não esperada.<br>';
}

/**
 * Desativar grupos passando um array vazio.
 */
try {
    (new Criaenvio\Grupo())->desativarGrupos(array());
    $contNaoPassou++;
    echo 'Erro: desativou grupos passando array sem elementos.<br>';
} catch (BadMethodCallException $e) {
    $contPassou++;
} catch (Exception $e) {
    $contNaoPassou++;
    echo 'Erro ao desativar grupos passando array sem elementos: excepetion não esparada.<br>';
    print_r($e);
}

/**
 * Ativar grupo sem id.
 */
try {
    $grupo = new Criaenvio\Grupo();
    $grupo->ativar();
    $contNaoPassou++;
    echo 'Erro: ativou grupo sem id.<br>';
} catch (BadMethodCallException $e) {
    $contPassou++;
} catch (Exception $e) {
    $contNaoPassou++;
    echo 'Erro ao ativar grupo sem id: excepetion não esparada.<br>';
    print_r($e);
}

/**
 * Desativar grupo sem id.
 */
try {
    $grupo = new Criaenvio\Grupo();
    $grupo->desativar();
    $contNaoPassou++;
    echo 'Erro: desativou grupo sem id.<br>';
} catch (BadMethodCallException $e) {
    $contPassou++;
} catch (Exception $e) {
    $contNaoPassou++;
    echo 'Erro ao desativar grupo sem id: exception não esparada.<br>';
    print_r($e);
}

/**
 * Fazendo busca utilizando utilizando parâmetro inválido (um não nulo e não array)
 */
try {
    $grupo = new Criaenvio\Contato();
    $grupo->buscar('oi');
    $contNaoPassou++;
    echo 'Erro: buscou contato utilizando parâmetro inválido.<br>';
} catch (BadMethodCallException $e) {
    $contPassou++;
} catch (Exception $e) {
    $contNaoPassou++;
    echo 'Erro ao buscar com parâmetro inválido: exception não esperada<br>';
    print_r($e);
}

/**
 * Criando grupo utilizando parâmetro inválido (null).
 */
try {
    $grupo = new Criaenvio\Grupo();
    $grupo->criar(null);
    $contNaoPassou++;
    echo 'Erro: criou grupo utilizando parâmetro null<br>';
} catch (BadMethodCallException $e) {
    $contPassou++;
} catch (Exception $e) {
    $contNaoPassou++;
    echo 'Erro ao criar grupo com parâmetro inválido (null): exception não esperada.<br>';
    print_r($e);
}

/**
 * Criando campo utilizando parâmetro inválido (não array).
 */
try {
    $campo = new Criaenvio\CampoPersonalizado();
    $campo->criar('teste');
    $contNaoPassou++;
    echo 'Erro: criou campo utilizando parâmetro não array<br>';
} catch (BadMethodCallException $e) {
    $contPassou++;
} catch (Exception $e) {
    $contNaoPassou++;
    echo 'Erro ao criar campo com parâmetro inválido (não array): exception não esperada.<br>';
    print_r($e);
}

/**
 * Criando contato utilizando parâmetro inválido (array vazio).
 */
try {
    $contato = new Criaenvio\Contato();
    $contato->criar(array());
    $contNaoPassou++;
    echo 'Erro: criou contato utilizando parâmetro inválido (array vazio)<br>';
} catch (BadMethodCallException $e) {
    $contPassou++;
} catch (Exception $e) {
    $contNaoPassou++;
    echo 'Erro ao criar contato com parâmetro inválido (array vazio): exception não esperada.<br>';
    print_r($e);
}

/**
 * Editando grupo sem id
 */
try {
    $grupo = new Criaenvio\Grupo();
    $grupo->editar(array('nome' => 'Editado'));
    $contNaoPassou++;
    echo 'Erro: editou grupo sem id.<br>';
} catch (BadMethodCallException $e) {
    $contPassou++;
} catch (Exception $e) {
    $contNaoPassou++;
    echo 'Erro ao editar grupo sem id: exception não esparada.<br>';
    print_r($e);
}

/**
 * Editando campo passando parâmetro inválido: null
 */
try {
    $campo = new Criaenvio\CampoPersonalizado($idCampo);
    $campo->editar(null);
    $contNaoPassou++;
    echo 'Erro: editou campo com parâmetro nulo.<br>';
} catch (BadMethodCallException $e) {
    $contPassou++;
} catch (Exception $e) {
    $contNaoPassou++;
    echo 'Erro ao editar campo usando parâmetro nulo: exception não esperada.<br>';
    print_r($e);
}

/**
 * Editando contato passando parâmetro inválido: não array
 */
try {
    $contato = new Criaenvio\Contato($idContato);
    $contato->editar('teste');
    $contNaoPassou++;
    echo 'Erro: editou contato com parâmetro não array.<br>';
} catch (BadMethodCallException $e) {
    $contPassou++;
} catch (Exception $e) {
    $contNaoPassou++;
    echo 'Erro ao editar contato usando parâmetro não array: exception não esperada.<br>';
    print_r($e);
}

/**
 * Editando grupo passando parâmetro inválido: array vazio
 */
try {
    $grupo = new Criaenvio\Grupo($idGrupo);
    $grupo->editar(array());
    $contNaoPassou++;
    echo 'Erro: editou grupo com parâmetro array vazio.<br>';
} catch (BadMethodCallException $e) {
    $contPassou++;
} catch (Exception $e) {
    $contNaoPassou++;
    echo 'Erro ao editar grupo usando parâmetro como array vazio: exception não esperada.<br>';
    print_r($e);
}

/**
 * Removendo campo sem id.
 */
try {
    $campo = new Criaenvio\CampoPersonalizado();
    $campo->remover();
    $contNaoPassou++;
    echo 'Erro: removeu campo sem id.<br>';
} catch (BadMethodCallException $e) {
    $contPassou++;
} catch (Exception $e) {
    $contNaoPassou++;
    echo 'Erro ao remover campo sem id: exception não esperada.<br>';
    print_r($e);
}

/**
 * Carregando contato sem id.
 */
try {
    $contato = new Criaenvio\Contato();
    $contato->carregar();
    $contNaoPassou++;
    echo 'Erro: carregou contato sem id.<br>';
} catch (BadMethodCallException $e) {
    $contPassou++;
} catch (Exception $e) {
    $contNaoPassou++;
    echo 'Erro ao carregar contato sem id: exception não esperada.<br>';
}

/**
 * Carrega grupo passando parâmetro inválido: $relacoes não array.
 */
try {
    $grupo = new Criaenvio\Grupo($idGrupo);
    $grupo->carregar('relacao', null);
    $contNaoPassou++;
    echo 'Erro: carregou grupo usando parâmetro inválido: $relacoes não array.<br>';
} catch (BadMethodCallException $e) {
    $contPassou++;
} catch (Exception $e) {
    $contNaoPassou++;
    echo 'Erro ao carregar grupo com parâmetro $relacoes não array: exception não esparada.<br>';
}

/**
 * Carrega campo passando parâmetro inválido: $parametros não array.
 */
try {
    $campo = new Criaenvio\CampoPersonalizado($idCampo);
    $campo->carregar(null, 'parametros');
    $contNaoPassou++;
    echo 'Erro: carregou campo usando parâmetro inválido: $parametros não array.<br>';
} catch (BadMethodCallException $e) {
    $contPassou++;
} catch (Exception $e) {
    $contNaoPassou++;
    echo 'Erro ao carregar campo com parâmetro $parametros não array: exception não esparada.<br>';
}

/**
 * Carrega contato que não existe.
 */
try {
    $contato = new Criaenvio\Contato('abc');
    $contato->carregar();
    $contNaoPassou++;
    'Erro: carregou contato que não existe.<br>';
} catch (Criaenvio\Excecao $e) {
    $contPassou++;
} catch (Exception $e) {
    $contNaoPassou++;
    echo 'Erro ao carregar contato que não existe: exception não esperada.<br>';
}

/**
 * Carrega contato que existe.
 */
try {
    $contato = new Criaenvio\Contato($idContato);
    $contato->carregar();
    $contPassou++;
} catch (Criaenvio\Excecao $e) {
    $contNaoPassou++;
    'Erro: não carregou contato que existe.<br>';
} catch (Exception $e) {
    $contNaoPassou++;
    echo 'Erro ao carregar contato que existe: exception não esperada.<br>';
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
