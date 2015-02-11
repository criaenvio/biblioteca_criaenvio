<?php

namespace Criaenvio;

class Paginacao {
    /**
     * @var int Número da página atual da requisição.
     */
    private $_paginaAtual;
    /**
     * @var int Número total de páginas da requisição.
     */
    private $_totalDePaginas;
    /**
     * @var int Número total de itens dessa página da requisição.
     */
    private $_totalItensPagina;
    /**
     * @var int Número total de itens encontrados na requisição.
     */
    private $_totalItens;
    /**
     * @var int Número de itens por página.
     */
    private $_itensPorPagina;

    function __construct($_itensPorPagina, $_paginaAtual, $_totalDePaginas, $_totalItens, $_totalItensPagina)
    {
        $this->_itensPorPagina = $_itensPorPagina;
        $this->_paginaAtual = $_paginaAtual;
        $this->_totalDePaginas = $_totalDePaginas;
        $this->_totalItens = $_totalItens;
        $this->_totalItensPagina = $_totalItensPagina;
    }

    /**
     * Retorna o número da página atual.
     * @return int Número da página atual.
     */
    public function getPaginaAtual() {
        return $this->_paginaAtual;
    }

    /**
     * Retorna o número total de páginas da busca.
     * @return int Número total de páginas da busca.
     */
    public function getTotalDePaginas() {
        return $this->_totalDePaginas;
    }

    /**
     * Retorna o número total de itens na página atual.
     * @return int Número total de itens na página atual.
     */
    public function getTotalItensPagina() {
        return $this->_totalItensPagina;
    }

    /**
     * Retorna o número total de itens da busca.
     * @return int Número total de itens da busca.
     */
    public function getTotalItens() {
        return $this->_totalItens;
    }

    /**
     * Retorna o número de itens por página.
     * @return int Número de itens por página.
     */
    public function getItensPorPagina() {
        return $this->_itensPorPagina;
    }

    /**
     * Verifica se o número passado é uma página válida para essa busca.
     * @param $pagina int Número para verificação.
     * @return bool
     */
    public function isPaginaValida($pagina) {
        return ($pagina >= 1 && $pagina <= $this->_totalDePaginas);
    }

    /**
     * Retorna o número da página anterior da atual.
     * TODO - implementar tratamento de erro?
     * @return int Número da página anterior a atual. Retorna 1 caso a página atual seja inválida e 0 caso não exista página anterior.
     */
    public function paginaAnterior() {
        if (!isset($this->_paginaAtual) || !$this->_paginaAtual || $this->_paginaAtual < 0) {
            return 1;
        }
        if ($this->_paginaAtual - 1 > 0) {
            return $this->_paginaAtual - 1;
        }
        return 0;
    }

    /**
     * Retorna o número da próxima página, após a atual.
     * TODO - implementar tratamento de erro?
     * @return int Número da próxima página, após a atual. Retorna 1 caso a página atual seja inválida e 0 caso não exista próxima página.
     */
    public function proximaPagina() {
        if (!isset($this->_paginaAtual) || !$this->_paginaAtual || $this->_paginaAtual < 0) {
            return 1;
        }
        if ($this->_paginaAtual + 1 <= $this->_totalDePaginas) {
            return $this->_paginaAtual + 1;
        }
        return 0;
    }
}