# BoletoItauPhp
Este projeto é uma implementação em PHP para a geração de boletos bancários utilizando a API do Itaú.

## Requisitos

- PHP 7.4 ou superior
- cURL para PHP

## Instalação

1. Clone o repositório para o seu ambiente local:

git clone https://github.com/seu-usuario/projeto-boleto-itau.git


2. Navegue até o diretório do projeto:

cd projeto-boleto-itau

3. Certifique-se de que as dependências estão instaladas e configuradas corretamente.

## Estrutura do Projeto

- `Classes/ConfiguracaoClass.php`: Contém a classe `Configuracao` que armazena os dados de configuração da API.
- `Classes/BoletoClass.php`: Contém a classe `BoletoItau` que interage com a API do Itaú para gerar boletos.
- `index.php`: Exemplo de uso da classe `BoletoItau`.

## Uso

### Configuração

A classe `Configuracao` armazena os dados necessários para a autenticação e comunicação com a API do Itaú.

### Geração de Boletos

1. Instancie a classe `BoletoItau`:

#<?php
namespace App;

include 'Classes/BoletoClass.php';

$itauBoleto = new BoletoItau();


2. Obtenha o token de autenticação:

$token = $itauBoleto->getToken();    


3. Crie um boleto utilizando o token obtido:

$itauBoleto->criaBoleto($token);   


## Licença

Este projeto está licenciado sob a [MIT License](LICENSE).

## Autor

Douglas Rocha



    
