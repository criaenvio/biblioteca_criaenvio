<?php

namespace Criaenvio;

class CampoPersonalizado extends Entidade {

    //public $nome_campo;//TODO - ajuste para identificar automaticamente a relação entre este atributo e o resultado da busca embed.

    const CAMINHO     = 'campos';
    const NOME_CLASSE = __CLASS__;

    public function embedsPermitidos() {
        return array('');
    }

} 