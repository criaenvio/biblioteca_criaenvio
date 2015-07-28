<?php

namespace Criaenvio;

abstract class Entidade {

    const CAMINHO     = '';
    const NOME_CLASSE = '';

    const TIPO_INSERCAO    = 1;
    const TIPO_CONSULTA    = 2;
    const TIPO_ATUALIZACAO = 3;
    const TIPO_EXCLUSAO    = 4;

    /**
     * Constantes para definição do tipo de requisição.
     */
    const TIPO_SOLICITACAO_GET    = 1;
    const TIPO_SOLICITACAO_POST   = 2;
    const TIPO_SOLICITACAO_PUT    = 3;
    const TIPO_SOLICITACAO_DELETE = 4;

    /**
     * @var string Identificador do registro.
     */
    public $id;

    /**
     * Algumas variáveis de configuração para as requisições.
     */
    /**
     * @var int Tipo de solicitação que será feita para a API. GET por padrão.
     */
    protected $_tipoSolicitacao = Entidade::TIPO_SOLICITACAO_GET;
    /**
     * @var string
     */
    protected $_caminho         = '';
    /**
     * @var array Parâmetros usados nas requisições.
     */
    protected $_parametros      = array();
    /**
     * @var array Parâmetros embutidos na própria URL da requisição.
     */
    protected $_parametrosURL   = array();

    /**
     * Informa quais embeds podem ser inseridos na consulta.
     *
     * @return array
     */
    abstract function embedsPermitidos();   // TODO repassar isto para a API, e não na biblioteca

    /**
     * Verifica se a resposta da requisição foi "OK".
     * @param $resposta array Resposta da requisição para a API.
     * @return bool
     */
    protected function _isRespostaOk($resposta) {
        return (isset($resposta->data->OK) && $resposta->data->OK == 'OK');
    }

    /**
     * Cria o objeto para solicitação de acordo com as especificações deste objeto.
     * @return ConexaoCurl
     */
    protected function _montaSolicitacao() {
        return (new ConexaoCurl(
            Utils::montaURl(
                static::CAMINHO . $this->_caminho,
                $this->_parametrosURL
            ),
            $this->_parametros
        ));
    }

    /**
     * Decide qual solicitação será realizada para a API de acordo com o atributo _tipoSolicitacao do objeto e a dispara.
     * @return mixed
     * @throws \Exception
     */
    protected function _realizaSolicitacao() {
        //TODO - fazer testes e exceptions para existencia e validade dos dados necessários.
        switch ($this->_tipoSolicitacao) {
            case $this::TIPO_SOLICITACAO_POST:
                return $this->_montaSolicitacao()->solicitacaoPost();
            case $this::TIPO_SOLICITACAO_PUT:
                return $this->_montaSolicitacao()->solicitacaoPut();
            case $this::TIPO_SOLICITACAO_DELETE:
                return $this->_montaSolicitacao()->solicitacaoDelete();
            case $this::TIPO_SOLICITACAO_GET:
            default:
                return $this->_montaSolicitacao()->solicitacaoGet();
        }
    }

    /**
     * Transforma a resposta recebida da API em um objeto Resposta.
     * @param $resposta                   array  Informações vindas da API.
     * @param $parametros                 array  Parâmetros utilizados na requisiçãoi a API.
     * @param $relacoes                   array  Relações de dados requisitadas para a API.
     * @param $nomeDaClasse               string Nome da classe que fez a requisição.
     * @param bool $isEmbed               bool   Se é uma transformação de uma relação de dados.
     * @param null $referenciaObjetoBusca object Referência do objeto que fez a requisição.
     * @param null $nomeEmbed             string Nome da relação de dados, se for uma.
     * @return Resposta
     */
    private function _tranformaEmResposta($resposta, $parametros, $relacoes, $nomeDaClasse, $isEmbed = false, $referenciaObjetoBusca = null, $nomeEmbed = null) {
        $dados = array();
        foreach($resposta->data as $registro) {
            $dados[] = Utils::toObjeto($nomeDaClasse, $registro);
        }

        $paginacao = null;
        if (isset($resposta->pagination)) {
            $paginacao = new Paginacao(
                $resposta->pagination->per_page,
                $resposta->pagination->current_page,
                $resposta->pagination->total_pages,
                $resposta->pagination->total,
                $resposta->pagination->count
            );
        }

        return new Resposta($dados, $relacoes, $paginacao, $parametros, get_class($this), $isEmbed, $referenciaObjetoBusca, $nomeEmbed);
    }

    public function __construct($id = null) {
        if (!is_null($id)) {
            $this->id = $id;
        }
    }

    /**
     * Busca registros relativos a entidade que chamou o método.
     * @param null $parametros array Parâmetros para filtro da busca.
     * @return Resposta Objeto contendo informações do resultado da busca.
     * @throws \BadMethodCallException Caso o parâmetro seja inválido.
     */
    public function buscar($parametros = null) {

        if (!is_null($parametros) && !is_array($parametros)) {
            throw new \BadMethodCallException('O parâmetro "parametros" deve ser um array.');
        }

        //Configura variáveis necessárias para requisição.
        $this->_tipoSolicitacao = $this::TIPO_SOLICITACAO_GET;
        $this->_parametros = $parametros;

        $resposta = $this->_realizaSolicitacao();

        if (!isset($parametros['page'])) {
            $parametros['page'] = 1;
        }

        return $this->_tranformaEmResposta($resposta, $parametros, array(), get_class($this));
    }

    /**
     * Retorna um objeto da classe que o chamou com as informações chamadas se continer seu id.
     * @param array $relacoes   Dados relacionados que serão carregados juntos.
     * @param array $parametros Parâmetros que podem ser utilizados na requisição.
     * @return mixed Objeto da classe que o chamou com as informações carregadas.
     * @throws \BadMethodCallException Se possuir algum parâmetro ou identificador (id) inválido.
     */
    public function carregar($relacoes = null, $parametros = null) {

        if (is_null($this->id)) {
            throw new \BadMethodCallException('O identificador (id) do objeto não foi informado.');
        }

        if (!is_null($relacoes) && !is_array($relacoes)) {
            throw new \BadMethodCallException('O parâmetro "relacoes" deve ser um array.');
        }

        if (!is_null($parametros) && !is_array($parametros)) {
            throw new \BadMethodCallException('O parâmetro "parametros" deve ser um array.');
        }

        //Configura variáveis necessárias para requisição.
        $this->_tipoSolicitacao = $this::TIPO_SOLICITACAO_GET;
        $this->_parametros = $parametros;
        $this->_caminho = '/'.$this->id;
        $this->_parametrosURL = self::geraEmbeds($relacoes);

        $retorno = $this->_realizaSolicitacao();

        $embeds = array();
        if ($relacoes) {
            foreach ($relacoes as $relacao) {
                $embeds[$relacao] = $retorno->data->{$relacao};
                unset($retorno->data->$relacao);
            }
        }

        $retorno = Utils::toObjeto(static::NOME_CLASSE, $retorno->data);

        foreach ($embeds as $nomeEmbed => $valorEmbed) {
            $retorno->$nomeEmbed = $this->_tranformaEmResposta($valorEmbed, $parametros, $relacoes, Utils::defineClasse($nomeEmbed), true, $this, $nomeEmbed);
        }

        return $retorno;
    }

    /**
     * Cria um novo registro relativo a classe que o chamou.
     * @param $parametros array Informações usadas na criação do registro.
     * @return mixed Objeto salvo com dados preenchidos.
     * @throws \BadMethodCallException Caso os parâmetros informados sejam inválidos.
     */
    public function criar($parametros) {

        if (is_null($parametros) || !is_array($parametros) || !count($parametros)) {
            throw new \BadMethodCallException('O parâmetro "parametros" deve ser um array.');
        }

        //Configura variáveis necessárias para requisição.
        $this->_tipoSolicitacao = $this::TIPO_SOLICITACAO_POST;
        $this->_parametros = $parametros;

        $retorno = $this->_realizaSolicitacao();

        $retorno = Utils::toObjeto(static::NOME_CLASSE, $retorno->data);

        return $retorno;

    }

    /**
     * Edita informações do registro relativo ao objeto que chamou o método, com base em seu identificador (id).
     * @param $parametros array Parâmetros utiliozados na edição.
     * @return bool Sucesso na edição.
     * @throws \BadMethodCallException Caso o parêmtro seja inválido ou o identificador (id) não esteja setado.
     */
    public function editar($parametros) {

        if (is_null($this->id)) {
            throw new \BadMethodCallException('O identificador (id) do objeto não foi informado.');
        }

        if (is_null($parametros) || !is_array($parametros) || !count($parametros)) {
            throw new \BadMethodCallException('O parâmetro "parametros" deve ser um array.');
        }

        //Configura variáveis necessárias para requisição.
        $this->_tipoSolicitacao = $this::TIPO_SOLICITACAO_PUT;
        $this->_caminho = '/'.$this->id;
        $this->_parametros = $parametros;

        $retorno = $this->_realizaSolicitacao();

        $status = (isset($retorno->data->OK) && $retorno->data->OK == 'OK');

        if (isset($retorno->data->registro)) {

            $registro = Utils::toObjeto(static::NOME_CLASSE, $retorno->data->registro);

            return [$status, $registro];

        } else {
            return $status;
        }
    }

    /**
     * Processa os embeds para a consulta.
     *
     * @param array $relacoes Contém as relações permitidas.
     * @return array Formatado para ser utilizado na consulta à API.
     */
    public function geraEmbeds(array $relacoes = null) {

        $embeds = array();
        if (is_array($relacoes) && count($relacoes)) {
            foreach ($relacoes as $embed) {
                if (in_array($embed, $this->embedsPermitidos())) {
                    $embeds[] = $embed;
                }
            }
            if (count($embeds)) {
                $embeds = array('embeds=' . implode(',', $embeds));
            }
        }

        return $embeds;
    }

    /**
     * Remove o registro relativo ao objeto que o chamou, a partir de seu identificador (id).
     * @return bool Sucesso na operação.
     * @throws \BadMethodCallException Caso o identificador (id) não seja informado.
     */
    public function remover() {

        if (is_null($this->id)) {
            throw new \BadMethodCallException('O identificador (id) do objeto não foi informado.');
        }

        //Configura variáveis necessárias para requisição.
        $this->_tipoSolicitacao = $this::TIPO_SOLICITACAO_DELETE;
        $this->_caminho = '/'.$this->id;

        $retorno = $this->_realizaSolicitacao();

        return (isset($retorno->data->OK) && $retorno->data->OK == 'OK');
    }

}
