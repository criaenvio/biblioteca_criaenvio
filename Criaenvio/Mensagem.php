<?php

namespace Criaenvio;

class Mensagem extends Entidade {

    /**
     * Atributos próprios da entidade.
     */
    public  $assunto,
            $contador,
            $dataCadastro,
            $emailResposta,
            $jaEnviada,
            $mensagemDescadastro,
            $nome;

    /**
     * Configurações para CriaenvioRemetente
     */
    const CAMINHO     = 'mensagens';
    const NOME_CLASSE = __CLASS__;



    public function embedsPermitidos() {
        return [];
    }

} 