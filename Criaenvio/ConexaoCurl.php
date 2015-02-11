<?php

namespace Criaenvio;

class ConexaoCurl {

    private $_url;
    private $_urlComParametros;

    /**
     * @var array
     */
    private $_parametros;

    private $_curl;

    private $_retornoNormal;
    private $_retornoDecodificado;

    public function __construct($url, array $parametros = null) {
        $this->_url = $this->_urlComParametros = $url;

        if (count($parametros)) {
            $this->_parametros       = $parametros;
            $this->_urlComParametros = $this->_url . '&' . http_build_query($parametros);
        }
    }

    /**
     * Trata e decodifica retorno da requisição.
     *
     * @throws Excecao Quando requisição cURL é inválida ou para código HTTP acima de 300.
     * @return void
     */
    private function _trataRetorno() {

        // realiza comunicação
        $this->_retornoNormal = curl_exec($this->_curl);

        // fecha comunicação
        curl_close($this->_curl);

        // verifica por possíveis erros

        // erro relacionado ao cURL
        if ($this->_retornoNormal === false) {

            throw new Excecao(
                'Erro cURL: ' . print_r(curl_getinfo($this->_curl), true)
            );

        }

        // decodifica retorno da comunicação
        $this->_retornoDecodificado = json_decode($this->_retornoNormal);

        // erro da requisição a api
        if (isset($this->_retornoDecodificado->error)) {

            throw new Excecao(
                $this->_retornoDecodificado->error->message,
                (int)$this->_retornoDecodificado->error->code,
                $this->_retornoDecodificado->error->http_code
            );

        }

        return;
    }

    private function _iniciaSolicitacao() {
        $this->_curl = curl_init($this->_url);

        curl_setopt($this->_curl, CURLOPT_RETURNTRANSFER, true);
    }

    public function solicitacaoGet() {

        $this->_url = $this->_urlComParametros;

        $this->_iniciaSolicitacao();

        $this->_trataRetorno();

        return $this->_retornoDecodificado;
    }

    public function solicitacaoPost() {

        $this->_iniciaSolicitacao();

        curl_setopt($this->_curl, CURLOPT_POST, true);

        if (is_array($this->_parametros) && count($this->_parametros)) {
            curl_setopt($this->_curl, CURLOPT_POSTFIELDS, http_build_query($this->_parametros));
        }

        $this->_trataRetorno();

        return $this->_retornoDecodificado;
    }

    public function solicitacaoPut() {

        $this->_iniciaSolicitacao();

        curl_setopt($this->_curl, CURLOPT_CUSTOMREQUEST, 'PUT');

        if (is_array($this->_parametros) && !empty($this->_parametros)) {
            curl_setopt($this->_curl, CURLOPT_POSTFIELDS, http_build_query($this->_parametros));
        }

        $this->_trataRetorno();

        return $this->_retornoDecodificado;
    }

    public function solicitacaoDelete() {

        $this->_iniciaSolicitacao();

        curl_setopt($this->_curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
        if ($this->_parametros) {
            curl_setopt($this->_curl, CURLOPT_POSTFIELDS, $this->_parametros);
        }

        $this->_trataRetorno();

        return $this->_retornoDecodificado;
    }

} 