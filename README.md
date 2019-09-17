# biblioteca_criaenvio
Biblioteca em PHP para utilização da API Criaenvio. Permite realizar uma série de operações para gerenciar contatos, grupos e campos personalizados de sua conta.

# Instalação/Utilização

Inclua o arquivo loader em seu script, bem como a criação da constante "NN_CHAVE" com a chave gerada no sistema (localizada na seção "Chaves da API").

    include_once 'Criaenvio_loader.php';
    
    // configure sua chave
    define('NN_CHAVE', '==chave-gerada==');

# Exemplos

Você pode acessar a [documentação da API][1] para visualizar todas as funções da API, as quais são chamadas por esta biblioteca. O diretório "exemplos" contém diversos códigos de exemplo de utilização da biblioteca.
  
Criando um contato e inserindo em um grupo:

    include_once 'Criaenvio_loader.php';
        
    // configure sua chave
    define('NN_CHAVE', '==chave-gerada==');
    
    try {
    
        $resultado = (new Criaenvio\Contato())->criar(
                        array(
                            'nome' => 'Nome Teste',
                            'email' => 'nome_teste@testes.com.br'
                        )
                    )->inscrever(
                            array('ID_GRUPO1','ID_GRUPO2')
                       );
    
        if ($resultado) echo "OK";
    
    } catch (Exception $e) {
        // trata exceção
    }
   

[1]: http://static.criaenvio.com/api_documentacao/
