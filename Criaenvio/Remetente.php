<?php

namespace Criaenvio;

class Remetente extends Entidade {

    /**
     * Atributos próprios de CriaenvioRemetente.
     */
    public $nome;
    public $email;
    public $confirmado;
    public $principal;

    /**
     * Configurações para CriaenvioRemetente
     */
    const CAMINHO     = 'remetentes';
    const NOME_CLASSE = __CLASS__;

    /**
     *
     * @return array
     */
    protected function _parametrosPermitidos() {
        return array('nome', 'id', 'email');
    }

    public function embedsPermitidos() {
        return [];
    }

} 