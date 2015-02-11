<?php

namespace Criaenvio;

class Contato extends Entidade {

    /**
     * Atributos especificos da classe CriaenvioContato.
     */
    public $nome;
    public $email;
    public $qualidade;
    public $ativo;
    public $descadastrado;
    public $sexo;
    public $dataNascimento;

    /**
     * Configurações para a classe CriaenvioContato
     */
    const CAMINHO     = 'contatos';
    const NOME_CLASSE = __CLASS__;

    /**
     * @param int $tipo
     * @return array
     */
    protected function _parametrosPermitidos($tipo = self::TIPO_CONSULTA) {
        return array('email', 'nome', 'id');
    }

    /**
     * Ativa o contato este contato.
     * @return bool Sucesso na ativação.
     * @throws \BadMethodCallException Caso o identificador (id) não seja informado.
     */
    public function ativar() {

        if (is_null($this->id)) {
            throw new \BadMethodCallException('O identificador (id) do objeto não foi informado.');
        }

        //Configurações para a solicitação.
        $this->_tipoSolicitacao = $this::TIPO_SOLICITACAO_PUT;
        $this->_caminho         = '/' . $this->id . '/ativar';

        return $this->_isRespostaOk($this->_realizaSolicitacao());
    }

    /**
     * Atualiza os campos personalizados para este contato.
     * @param $campos array Contendo identificador (id) do campo e novo valor como chave x valor, respectivamente.
     * @return bool Sucesso na atualização.
     * @throws \BadMethodCallException Caso o identificador (id) não seja setado ou caso o parâmetro seja inválido;
     */
    public function atualizarCamposPersonalizados($campos) {

        if (is_null($this->id)) {
            throw new \BadMethodCallException('O identificador (id) do objeto não foi informado.');
        }

        if (!is_array($campos) || !count($campos)) {
            throw new \BadMethodCallException('O parâmetro "campos" deve ser um array e conter infomações.');
        }

        $parametros = array();
        if (is_array($campos) && reset($campos) instanceof CampoPersonalizado) {
            foreach($campos as $camposPersonalizado) {
                $parametros[$camposPersonalizado->id] = $camposPersonalizado->valor;
            }
        } else {
            foreach($campos as $key => $valor) {
                $parametros[$key] = $valor;
            }
        }

        //Configurações para a solicitação.
        $this->_tipoSolicitacao = $this::TIPO_SOLICITACAO_PUT;
        $this->_caminho         = '/' . $this->id . '/campos';
        $this->_parametros      = array('campos' => $parametros);

        return $this->_isRespostaOk($this->_realizaSolicitacao());
    }

    /**
     * Desativa este contato.
     * @return bool Sucesso na desativação.
     * @throws \BadMethodCallException Caso o identificador (id) não esteja setado.
     */
    public function desativar() {

        if (is_null($this->id)) {
            throw new \BadMethodCallException('O identificador (id) do objeto não foi informado.');
        }

        //Configurações para a solicitação.
        $this->_tipoSolicitacao = $this::TIPO_SOLICITACAO_PUT;
        $this->_caminho         = '/' . $this->id . '/desativar';

        return $this->_isRespostaOk($this->_realizaSolicitacao());
    }

    /**
     * Desiscreve este contato dos grupos informados por parâmetro.
     * @param $grupos array contendo os identificadores (ids) dos grupos para desiscrição do contato.
     * @return bool Sucesso da desiscrição.
     * @throws \BadMethodCallException Caso o identificador (id) não tenha sido setado ou o parâmetro seja inválido.
     */
    public function desinscrever($grupos) {

        if (is_null($this->id)) {
            throw new \BadMethodCallException('O identificador (id) do objeto não foi informado.');
        }

        if (!is_array($grupos) || !count($grupos)) {
            throw new \BadMethodCallException('O parâmetro "grupos" deve ser um array e conter infomações.');
        }

        $this->_caminho         = '/' . $this->id . '/desinscrever';
        $this->_tipoSolicitacao = $this::TIPO_SOLICITACAO_POST;
        $this->_parametros      = array('idGrupos' => implode(',', $grupos));

        return $this->_isRespostaOk($this->_realizaSolicitacao());
    }

    /**
     * Informa nome das relações de dados permitidas para esta classe.
     * @return array Relação de dados permitidas para esta classe.
     */
    public function embedsPermitidos() {
        return array('grupos', 'campos');
    }

    /**
     * Inscreve este contato nos grupos informados por parâmetro.
     * @param $grupos array contendo os identificadores (ids) dos grupos para inscrição.
     * @return bool Sucesso na inscrição.
     * @throws \BadMethodCallException Caso o identificador (id) não tenha sido setado ou o parâmetro seja inválido.
     */
    public function inscrever($grupos) {

        if (is_null($this->id)) {
            throw new \BadMethodCallException('O identificador (id) do objeto não foi informado.');
        }

        if (!is_array($grupos) || !count($grupos)) {
            throw new \BadMethodCallException('O parâmetro "grupos" deve ser um array e conter infomações.');
        }

        //Configurações para a solicitação.
        $this->_caminho         = '/' . $this->id . '/inscrever';
        $this->_tipoSolicitacao = $this::TIPO_SOLICITACAO_POST;
        $this->_parametros      = array('idGrupos' => implode(',', $grupos));

        return $this->_isRespostaOk($this->_realizaSolicitacao());
    }

} 