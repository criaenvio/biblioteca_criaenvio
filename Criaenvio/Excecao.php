<?php

namespace Criaenvio;

class Excecao extends \Exception {

    protected $httpCode;

    public function __construct($mensagem, $codigo = null, $codigoHttp = null) {

        parent::__construct($mensagem, $codigo);

        $this->httpCode = $codigoHttp;
    }

}