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

    /**
     * Valida os parâmetros utilizados na criação da mensagem.
     *
     * @param $parametros array Informações usadas na criação do registro.
     * @return mixed Objeto salvo com dados preenchidos.
     * @throws \BadMethodCallException Caso o parâmetro nome informado seja inválido.
     */
    public function criar($parametros) {

        if (isset($parametros['assunto']) && is_bool($parametros['assunto'])) {
            throw new \BadMethodCallException('O parâmetro "parametros" deve ser um array com valores válidos.');
        }

        if (!isset($parametros['assunto']) || empty($parametros['assunto'])) {
            throw new \BadMethodCallException('O parâmetro "assunto" deve ser preenchido com uma string não nula.');
        }

        if (!isset($parametros['html']) || empty($parametros['html'])) {
            throw new \BadMethodCallException('O parâmetro "html" deve ser preenchido com uma string não nula.');
        }

        return parent::criar($parametros);
    }


    public function listaTeste() {

        if (is_null($this->id)) {
            throw new \BadMethodCallException('O identificador (id) do objeto não foi informado.');
        }

        //Configura variáveis necessárias para requisição.
        $this->_tipoSolicitacao = $this::TIPO_SOLICITACAO_GET;
        $this->_caminho = '/'.$this->id.'/lista_teste';

        $retorno = $this->_realizaSolicitacao();

        return (isset($retorno->data->OK) && $retorno->data->OK == 'OK');
    }

} 