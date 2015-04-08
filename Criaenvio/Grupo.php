<?php

namespace Criaenvio;

class Grupo extends Entidade {

    /**
     * Atributos próprios de CriaenvioGrupo.
     */
    public $nome;
    public $ativo;
    public $contatos_ativos;

    /**
     * Configurações para CriaenvioGrupo
     */
    const CAMINHO     = 'grupos';
    const NOME_CLASSE = __CLASS__;

    /**
     * @param int $tipo
     * @return array
     */
    protected function _parametrosPermitidos($tipo = self::TIPO_CONSULTA) {
        return array('nome', 'id');
    }

    /**
     * Ativa o grupo que chamou o método.
     * @return bool Sucesso na ativação.
     * @throws \BadMethodCallException Caso o identificador (id) não tenha sido setado.
     */
    public function ativar() {

        if (is_null($this->id)) {
            throw new \BadMethodCallException('O identificador (id) do objeto não foi informado.');
        }

        return self::ativarGrupos(array($this->id));
    }

    /**
     * Ativa os grupos cujo ids foram passados por parâmetro.
     * @param $parametros array Ids dos grupos a serem ativados.
     * @return bool Sucesso na ativação.
     * @throws \BadMethodCallException Caso o parâmetro passado seja inválido.
     */
    public function ativarGrupos($parametros) {

        if (!is_array($parametros) || !count($parametros)) {
            throw new \BadMethodCallException('O parâmetro "parametros" deve ser um array.');
        }

        //Configura solicitação.
        $this->_tipoSolicitacao = $this::TIPO_SOLICITACAO_PUT;
        $this->_caminho         = '/ativar';
        $this->_parametros      =  array('id' => implode(',', $parametros));

        return $this->_isRespostaOk($this->_realizaSolicitacao());
    }

    /**
     * Desativa o grupo que chamou o método.
     * @return bool Sucesso na desativação.
     * @throws \BadMethodCallException Caso o identificador (id) do grupo não tenha sido setado.
     */
    public function desativar() {

        if (is_null($this->id)) {
            throw new \BadMethodCallException('O identificador (id) do objeto não foi informado.');
        }

        return self::desativarGrupos(array($this->id));
    }

    /**
     * Desativa grupos cujos ids foram passados no array do parâmetro.
     * @param $parametros array Ids dos grupos para desativação.
     * @return bool Sucesso na desativação.
     * @throws \BadMethodCallException caso o parâmetro passado seja inválido.
     */
    public function desativarGrupos($parametros) {

        if (!is_array($parametros) || !count($parametros)) {
            throw new \BadMethodCallException('O parâmetro "parametros" deve ser um array.');
        }

        //Configurando solicitação.
        $this->_tipoSolicitacao = $this::TIPO_SOLICITACAO_PUT;
        $this->_caminho         = '/desativar';
        $this->_parametros      = array('id' => implode(',', $parametros));

        return $this->_isRespostaOk($this->_realizaSolicitacao());
    }

    /**
     * Informa nome das relações de dados permitidas para esta classe.
     * @return array Relação de dados permitidas para esta classe.
     */
    public function embedsPermitidos() {
        return array('contatos');
    }


    /**
     * Valida os parâmetros utilizados na criação do grupo.
     * @param $parametros array Informações usadas na criação do registro.
     * @return mixed Objeto salvo com dados preenchidos.
     * @throws \BadMethodCallException Caso o parâmetro nome informado seja inválido.
     */
    public function criar($parametros){

        if (isset($parametros['nome']) && is_bool($parametros['nome'])) {
            throw new \BadMethodCallException('O parâmetro "parametros" deve ser um array com valores válidos.');
        }

        return parent::criar($parametros);
    }

} 