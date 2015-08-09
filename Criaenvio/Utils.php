<?php

namespace Criaenvio;

abstract class Utils {

    /**
     * Monta a URL para requisição de acordo com os parâmetros, URL da API e sua versão.
     * @param $caminho string Caminho para a requisição.
     * @param null $parametros array Parâmetros para requisição.
     * @return string
     */
    public static function montaURl($caminho, $parametros = null) {
        $url = NN_URL_API.NN_VERSAO.'/'.$caminho.'?chave='.NN_CHAVE;
        if (is_array($parametros) && !empty($parametros)) {
            $url .= '&'.implode('&', $parametros);
        }
        return $url;
    }

    /**
     * Transforma um objeto genérico no objeto solicitado.
     * @param $className string Nome da classe.
     * @param $instance Object Instância do objeto para transofmração.
     * @return mixed
     */
    public static function toObjeto($className, $instance) {

        return unserialize(sprintf(
            'O:%d:"%s"%s',
            strlen($className),
            $className,
            strstr(strstr(serialize($instance), '"'), ':')
        ));

    }

    /**
     * De acordo com o atributo passado, define uma classe equivalente.
     * @param $nome string Nome equivalente pré-definido (embeds).
     * @return string Nome da classe equivalente.
     */
    public static function defineClasse($nome) {
        switch ($nome) {
            case 'grupos':
            case 'listas':
                return Grupo::NOME_CLASSE;
                break;
            case 'campos':
                return CampoPersonalizado::NOME_CLASSE;
                break;
            case 'contatos':
                return Contato::NOME_CLASSE;
                break;
            case 'remetente':
                return Remetente::NOME_CLASSE;
                break;
            case 'mensagem':
                return Mensagem::NOME_CLASSE;
                break;
            default:
                die('Relacionamento não identificado.');
                break;
        }
    }
} 