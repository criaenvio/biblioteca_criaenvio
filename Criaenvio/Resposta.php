<?php

namespace Criaenvio;

class Resposta {
    /**
     * @var array Array de objetos do dado solicitado.
     */
    private $_dados;
    /**
     * @var array Array de objetos CriaenvioResposta, um para cada embed solicitado.
     */
    private $_embeds;
    /**
     * @var array Parâmetros da busca que originou este objeto.
     */
    private $_parametrosBusca;
    /**
     * @var Paginacao Paginação para a busca.
     */
    private $_paginacao;
    /**
     * @var string Nome da classe que realizou a busca originalmente.
     */
    private $_classeBuscada;
    /**
     * @var bool Informa se esse objeto foi gerada a partir de um embed.
     */
    private $_isEmbed;
    /**
     * @var object Objeto que fez uma busca usando carregar com seu respectivo id.
     */
    private $_referenciaObjetoBusca;
    /**
     * @var string String nome do embed caso este objeto tenha sido originado de um embed.
     */
    private $_nomeEmbed;

    function __construct($dados, $embeds, $paginacao, $parametrosBusca, $classeBuscada, $isEmbed = false, $referenciaObjetoBusca = null, $nomeEmbed = null)
    {
        $this->_dados = $dados;
        $this->_embeds = $embeds;
        $this->_paginacao = $paginacao;
        $this->_parametrosBusca = $parametrosBusca;
        $this->_classeBuscada = $classeBuscada;
        $this->_isEmbed = $isEmbed;
        $this->_referenciaObjetoBusca = $referenciaObjetoBusca;
        $this->_nomeEmbed = $nomeEmbed;
    }

    /**
     * Atualiza este objeto com as informações do objeto passado por parâmetro.
     * @param $novoObjeto Resposta Objeto com atributos atualizados.
     */
    private function _atualizaObjeto($novoObjeto) {
        $this->_dados                 = $novoObjeto->_dados;
        $this->_embeds                = $novoObjeto->_embeds;
        $this->_paginacao             = $novoObjeto->_paginacao;
        $this->_parametrosBusca       = $novoObjeto->_parametrosBusca;
        $this->_classeBuscada         = $novoObjeto->_classeBuscada;
        $this->_isEmbed               = $novoObjeto->_isEmbed;
        $this->_referenciaObjetoBusca = $novoObjeto->_referenciaObjetoBusca;
        $this->_nomeEmbed             = $novoObjeto->_nomeEmbed;
    }

    /**
     * Retorna um array de objetos do dado solicitado.
     * @return array
     */
    public function getDados() {
        return $this->_dados;
    }

    /**
     * Retorna a página atual da busca.
     * TODO - implementar tratamento de erro?
     * @return bool|int False para erro ou int com o número da página atual.
     */
    public function getPaginaAtual() {
        if (!$this->isPaginado()) return false;
        return $this->_paginacao->getPaginaAtual();
    }

    /**
     * Retorna o número de itens por página configurados para a busca.
     * TODO - implementar tratamento de erro?
     * @return bool|int False para erro ou int com o número de itens por página configurado.
     */
    public function getItensPorPagina() {
        if (!$this->isPaginado()) return false;
        return $this->_paginacao->getItensPorPagina();
    }

    /**
     * Retorna o total de páginas para a busca realizada.
     * TODO - implementar tratamento de erro?
     * @return bool|int False para erro ou int com o número total de páginas da consulta.
     */
    public function getTotalDePaginas() {
        if (!$this->isPaginado()) return false;
        return $this->_paginacao->getTotalDePaginas();
    }

    /**
     * Retorna o número total de itens da consulta, de todas as páginas.
     * TODO - implementar tratamento de erro?
     * @return bool|int False para erro ou int com o número total de itens retornados da consulta.
     */
    public function getTotalDeItens() {
        if (!$this->isPaginado()) return false;
        return $this->_paginacao->getTotalItens();
    }

    /**
     * Retorna o número de itens da página atual.
     * TODO - implementar tratamento de erro?
     * @return bool|int False para erro ou int com o número de itens da página atual.
     */
    public function getTotalItensNaPaginaAtual() {
        if (!$this->isPaginado()) return false;
        return $this->_paginacao->getTotalItensPagina();
    }

    /**
     * Verifica se o objeto é paginado, ou seja, tem objeto paginação e é válido.
     * @return bool
     */
    public function isPaginado() {
        return isset($this->_paginacao) && $this->_paginacao != null && ($this->_paginacao instanceof Paginacao);
    }

    /**
     * Realiza a busca para a pŕoxima página.
     * @return bool
     */
    public function proximaPagina() {
        if (!$this->isPaginado()) {
            return false;
        }
        return $this->irParaPagina($this->_paginacao->proximaPagina());
    }

    /**
     * Realiza a busca para a página anterior.
     * @return bool
     */
    public function paginaAnterior() {
        if (!$this->isPaginado()) {
            return false;
        }
        return $this->irParaPagina($this->_paginacao->paginaAnterior());
    }

    /**
     * Realiza a busca para a página passada por parâmetro
     * TODO - implementar tratamento de erro?
     * @param $pagina int Número da página para busca.
     * @return bool
     */
    public function irParaPagina($pagina) {
        if (!$this->isPaginado()) {
            return false;
        }
        if (!$this->_paginacao->isPaginaValida($pagina)) {
            return false;
        }
        if (!$this->_parametrosBusca) {
            $this->_parametrosBusca = array();
        }

        $this->_parametrosBusca['page'] = $pagina;

        if ($this->_isEmbed) {
            $relacoes = array();
            foreach ($this->_embeds as $embed) {
                $relacoes[] = $embed;
            }
            $parametros = $this->_parametrosBusca;
            $this->_atualizaObjeto($this->_referenciaObjetoBusca->carregar($relacoes, $parametros)->{$this->_nomeEmbed});
        } else {
            $this->_atualizaObjeto((new $this->_classeBuscada)->buscar($this->_parametrosBusca));
        }
        return true;
    }
} 