<?php

namespace Criaenvio;

class Envio extends Entidade {

    /**
     * Atributos próprios da entidade.
     */
    public  $codigo;

    /**
     * Configurações para entidade
     */
    const CAMINHO     = 'envios';
    const NOME_CLASSE = __CLASS__;



    public function embedsPermitidos() {
        return ['listas', 'mensagem', 'remetente'];
    }





} 