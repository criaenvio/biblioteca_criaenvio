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

    public function pausar() {

        if (is_null($this->id)) {
            throw new \BadMethodCallException('O identificador (id) do objeto não foi informado.');
        }

        //Configura variáveis necessárias para requisição.
        $this->_tipoSolicitacao = $this::TIPO_SOLICITACAO_GET;
        $this->_caminho = '/'.$this->id.'/pausar';

        $retorno = $this->_realizaSolicitacao();

        return (isset($retorno->data->OK) && $retorno->data->OK == 'OK');
    }

    public function cancelar() {

        if (is_null($this->id)) {
            throw new \BadMethodCallException('O identificador (id) do objeto não foi informado.');
        }

        //Configura variáveis necessárias para requisição.
        $this->_tipoSolicitacao = $this::TIPO_SOLICITACAO_GET;
        $this->_caminho = '/'.$this->id.'/cancelar';

        $retorno = $this->_realizaSolicitacao();

        return (isset($retorno->data->OK) && $retorno->data->OK == 'OK');
    }

    public function retomar($parametros) {

        if (is_null($this->id)) {
            throw new \BadMethodCallException('O identificador (id) do objeto não foi informado.');
        }

        if (!isset($parametros['data']) || empty($parametros['data'])) {
            throw new \BadMethodCallException('O parâmetro "data" deve ser preenchido.');
        }

        //Configura variáveis necessárias para requisição.
        $this->_tipoSolicitacao = $this::TIPO_SOLICITACAO_POST;
        $this->_caminho = '/'.$this->id.'/retomar';
        $this->_parametros = $parametros;

        $retorno = $this->_realizaSolicitacao();

        return (isset($retorno->data->OK) && $retorno->data->OK == 'OK');
    }



} 