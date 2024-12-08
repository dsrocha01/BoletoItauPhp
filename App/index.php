<?php
namespace App;

include 'Classes/BoletoClass.php';
include 'ViewModels/BoletoViewModel.php';

$itauBoleto = new BoletoItau();

$token = $itauBoleto->getToken();


//    {
//  "data": {
//    "etapa_processo_boleto": "efetivacao",
//    "codigo_canal_operacao": "API",
//    "beneficiario": {
//      "id_beneficiario": "id_beneficiario"
//    },
//    "dado_boleto": {
//      "descricao_instrumento_cobranca": "boleto",
//      "forma_envio": "email",
//      "texto_endereco_email": "exemplo@itau.com.br",
//      "assunto_email": "Assunto do e-mail",
//      "mensagem_email": "Texto para enviar ao cliente",
//      "tipo_boleto": "a vista",
//      "codigo_carteira": "109",
//      "valor_titulo": "00000000000001000",
//      "codigo_especie": "01",
//      "valor_abatimento": "000",
//      "data_emissao": "2022-12-21",
//      "pagamento_parcial": true,
//      "quantidade_maximo_parcial": 2,
//      "pagador": {
//        "pessoa": {
//          "nome_pessoa": "Pessoa teste",
//          "tipo_pessoa": {
//            "codigo_tipo_pessoa": "F",
//            "numero_cadastro_pessoa_fisica": "cpf_cnpj_pagador"
//          }
//        },
//        "endereco": {
//          "nome_logradouro": "Rua endereço,71",
//          "nome_bairro": "Bairro",
//          "nome_cidade": "Cidade",
//          "sigla_UF": "PE",
//          "numero_CEP": "51340540"
//        }
//      },
//      "dados_individuais_boleto": [
//        {
//          "numero_nosso_numero": "20000000",
//          "data_vencimento": "2023-01-14",
//          "valor_titulo": "00000000000119900",
//          "texto_uso_beneficiario": "2",
//          "texto_seu_numero": "2"
//        }
//      ],
//      "multa": {
//        "codigo_tipo_multa": "02",
//        "data_multa": "2024-09-21",
//        "percentual_multa": "000000100000"
//      },
//      "juros": {
//        "codigo_tipo_juros": 90,
//        "data_juros": "2024-09-21",
//        "percentual_juros": "000000100000"
//      },
//      "recebimento_divergente": {
//        "codigo_tipo_autorizacao": "01"
//      },
//      "instrucao_cobranca": [
//        {
//          "codigo_instrucao_cobranca": "2",
//          "quantidade_dias_apos_vencimento": 10,
//          "dia_util": false
//        }
//      ],
//      "protesto": {
//        "protesto": true,
//        "quantidade_dias_protesto": 10
//      },
//      "desconto_expresso": false
//    }
//  }
//}

//Dados do Boleto
$boletoData = new BoletoViewModel();
$boletoData->data->etapa_processo_boleto = "validacao";
$boletoData->data->codigo_canal_operacao = "API";
$boletoData->data->beneficiario->id_beneficiario = "id_beneficiario";
$boletoData->dado_boleto->descricao_instrumento_cobranca = "boleto";
$boletoData->dado_boleto->forma_envio = "email";
$boletoData->dado_boleto->texto_endereco_email = "exemplo@itau.com.br";
$boletoData->dado_boleto->assunto_email = "Assunto do e-mail";
$boletoData->dado_boleto->mensagem_email = "Texto para enviar ao cliente";
$boletoData->dado_boleto->tipo_boleto = "a vista";
$boletoData->dado_boleto->codigo_carteira = "109";
$boletoData->dado_boleto->valor_titulo = "00000000000001000";
$boletoData->dado_boleto->codigo_especie = "01";
$boletoData->dado_boleto->valor_abatimento = "000";
$boletoData->dado_boleto->data_emissao = "2024-12-09";
$boletoData->dado_boleto->pagamento_parcial = false;
$boletoData->dado_boleto->pagador->pessoa->nome_pessoa = "Pessoa teste";
$boletoData->dado_boleto->pagador->pessoa->tipo_pessoa->codigo_tipo_pessoa = "F";
$boletoData->dado_boleto->pagador->pessoa->tipo_pessoa->numero_cadastro_pessoa_fisica = "cpf_cnpj_pagador";
$boletoData->dado_boleto->pagador->endereco->nome_logradouro = "Rua endereço,71";
$boletoData->dado_boleto->pagador->endereco->nome_bairro = "Bairro";
$boletoData->dado_boleto->pagador->endereco->nome_cidade = "Cidade";
$boletoData->dado_boleto->pagador->endereco->sigla_UF = "PE";
$boletoData->dado_boleto->pagador->endereco->numero_CEP = "51340540";

// Adicionando dados individuais do boleto
$dadosIndividuaisBoleto = new DadosIndividuaisBoleto();
$dadosIndividuaisBoleto->numero_nosso_numero = "20000000";
$dadosIndividuaisBoleto->data_vencimento = "2023-01-14";
$dadosIndividuaisBoleto->valor_titulo = "00000000000119900";
$dadosIndividuaisBoleto->texto_uso_beneficiario = "2";
$dadosIndividuaisBoleto->texto_seu_numero = "2";

$boletoData->dado_boleto->dados_individuais_boleto = [];
$boletoData->dado_boleto->dados_individuais_boleto[] = $dadosIndividuaisBoleto;

$boletoData->dado_boleto->multa->codigo_tipo_multa = "02";
$boletoData->dado_boleto->multa->data_multa = "2024-09-21";
$boletoData->dado_boleto->multa->percentual_multa = "000000100000";
$boletoData->dado_boleto->juros->codigo_tipo_juros = 90;
$boletoData->dado_boleto->juros->data_juros = "2024-09-21";
$boletoData->dado_boleto->juros->percentual_juros = "000000100000";
$boletoData->dado_boleto->recebimento_divergente->codigo_tipo_autorizacao = "01";



// Adicionando instrucao de cobranca
$instrucaoCobranca = new InstrucaoCobranca();
$instrucaoCobranca->codigo_instrucao_cobranca = "2";
$instrucaoCobranca->quantidade_dias_apos_vencimento = 10;
$instrucaoCobranca->dia_util = false;

$boletoData->dado_boleto->instrucao_cobranca = [];
$boletoData->dado_boleto->instrucao_cobranca[] = $instrucaoCobranca;

$boletoData->dado_boleto->protesto->protesto = false;
$boletoData->dado_boleto->desconto_expresso = false;


$itauBoleto->criaBoleto($token, $boletoData);

