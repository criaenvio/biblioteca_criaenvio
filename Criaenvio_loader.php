<?php

define('NN_URL_API', 'http://api.criaenvio.com/');
define('NN_VERSAO', 'v1');

spl_autoload_register(
    function ($classe) {
        if (preg_match("/Criaenvio/", $classe)) {
            $arquivo = __dir__ . '/' . str_replace('\\', '/', $classe) . '.php';

            if (file_exists($arquivo)) {
                require $arquivo;
            }

        }
    }
);