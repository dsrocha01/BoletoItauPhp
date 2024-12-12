<?php
namespace App;

include 'Classes/BoletoClass.php';
include 'ViewModels/BoletoViewModel.php';

$itauBoleto = new BoletoItau();

$token = $itauBoleto->getToken();

$funcoes = $itauBoleto->funcoes;

//Calcula o DAC para o id_beneficiario (AG + CC + DAC)
$dac = $funcoes->calcularDacModulo11('05760655724');
$dac = $funcoes->calcularDacModulo10('05760655724');
$idBeneficiario = "05760655724". $dac;


//Dados do Boleto
$boletoData = new BoletoViewModel();
$boletoData->data->etapa_processo_boleto = "validacao";
$boletoData->data->codigo_canal_operacao = "API";
$boletoData->data->beneficiario->id_beneficiario = $idBeneficiario;

$boletoData->data->dado_boleto->id_boleto = $funcoes->generateUuidV4();
$boletoData->data->dado_boleto->id_beneficiario = $idBeneficiario;
$boletoData->data->dado_boleto->descricao_instrumento_cobranca = "boleto";
$boletoData->data->dado_boleto->forma_envio = "email";
$boletoData->data->dado_boleto->assunto_email = "Assunto do e-mail";
$boletoData->data->dado_boleto->mensagem_email = "Texto para enviar ao cliente";
$boletoData->data->dado_boleto->tipo_boleto = "a vista";
$boletoData->data->dado_boleto->codigo_carteira = "109";
$boletoData->data->dado_boleto->valor_titulo = "00000000000001000";
$boletoData->data->dado_boleto->codigo_especie = "99";
$boletoData->data->dado_boleto->data_emissao = "2024-12-09";
$boletoData->data->dado_boleto->numero_ddd = '21';
$boletoData->data->dado_boleto->numero_telefone = '964755068';

$boletoData->data->dado_boleto->pagador->pessoa->nome_pessoa = "Pessoa teste";
$boletoData->data->dado_boleto->pagador->pessoa->tipo_pessoa->codigo_tipo_pessoa = "F";
$boletoData->data->dado_boleto->pagador->pessoa->tipo_pessoa->numero_cadastro_pessoa_fisica = "88182279046";

$boletoData->data->dado_boleto->pagador->texto_endereco_email = "exemplo@itau.com.br";

if($boletoData->data->dado_boleto->pagador->pessoa->tipo_pessoa->codigo_tipo_pessoa == 'J'){

    //Preencher caso o Pagador seja PJ
    $boletoData->data->dado_boleto->pagador->pessoa->tipo_pessoa->numero_cadastro_nacional_pessoa_juridica = "numero_cnpj";
    $boletoData->data->dado_boleto->sacador_avalista->numero_cadastro_nacional_pessoa_juridica = "numero_cnpj";
    $boletoData->data->dado_boleto->sacador_avalista->endereco->nome_logradouro = "Rua endereço,71";
    $boletoData->data->dado_boleto->sacador_avalista->endereco->nome_bairro = "Bairro";
    $boletoData->data->dado_boleto->sacador_avalista->endereco->nome_cidade = "Cidade";
    $boletoData->data->dado_boleto->sacador_avalista->endereco->sigla_UF = "PE";
    $boletoData->data->dado_boleto->sacador_avalista->endereco->numero_CEP = "51340540";
}else{
    // Removendo o objeto sacador_avalista
    unset($boletoData->data->dado_boleto->sacador_avalista);
}
    

$boletoData->data->dado_boleto->pagador->endereco->nome_logradouro = "Rua endereço,71";
$boletoData->data->dado_boleto->pagador->endereco->nome_bairro = "Bairro";
$boletoData->data->dado_boleto->pagador->endereco->nome_cidade = "Cidade";
$boletoData->data->dado_boleto->pagador->endereco->sigla_UF = "PE";
$boletoData->data->dado_boleto->pagador->endereco->numero_CEP = "51340540";

// Adicionando dados individuais do boleto
$dadosIndividuaisBoleto = new DadosIndividuaisBoleto();
$dadosIndividuaisBoleto->numero_nosso_numero = "20000000";
$dadosIndividuaisBoleto->data_vencimento = "2024-12-25";
$dadosIndividuaisBoleto->valor_titulo = "00000000000119900";
$dadosIndividuaisBoleto->texto_uso_beneficiario = "2";
$dadosIndividuaisBoleto->texto_seu_numero = "2";

$boletoData->data->dado_boleto->dados_individuais_boleto = [];
$boletoData->data->dado_boleto->dados_individuais_boleto[] = $dadosIndividuaisBoleto;

$boletoData->data->dado_boleto->multa->codigo_tipo_multa = "02";

if($boletoData->data->dado_boleto->multa->codigo_tipo_multa == "01"){
    $dadosIndividuaisBoleto->data->dado_boleto->multa->valor_multa = 'valor_multa';
}

$boletoData->data->dado_boleto->multa->data_multa = "2024-12-21";
$boletoData->data->dado_boleto->multa->percentual_multa = "000000100000";
$boletoData->data->dado_boleto->multa->quantidade_dias_multa = 1;

$boletoData->data->dado_boleto->juros->codigo_tipo_juros = 90;

if($boletoData->data->dado_boleto->juros->codigo_tipo_juros == 93){
    $boletoData->data->dado_boleto->juros->valor_juros = 'valor_juros';
}else{
    unset($boletoData->data->dado_boleto->juros->valor_juros);
}
$boletoData->data->dado_boleto->juros->data_juros = "2024-12-21";
$boletoData->data->dado_boleto->juros->quantidade_dias_juros = 90;
$boletoData->data->dado_boleto->juros->percentual_juros = "000000100000";

$boletoData->data->dado_boleto->desconto->codigo_tipo_desconto = '00';

$desconto = new Descontos();
$desconto->percentual_desconto = "0.00000";
$boletoData->data->dado_boleto->desconto->descontos = [];
$boletoData->data->dado_boleto->desconto->descontos[] = $desconto;

$boletoData->data->dado_boleto->recebimento_divergente->codigo_tipo_autorizacao = "03";

// Adicionando instrucao de cobranca
$instrucaoCobranca = new InstrucaoCobranca();
$instrucaoCobranca->codigo_instrucao_cobranca = "2";
$instrucaoCobranca->quantidade_dias_apos_vencimento = 10;
$instrucaoCobranca->dia_util = false;

$boletoData->data->dado_boleto->instrucao_cobranca = [];
$boletoData->data->dado_boleto->instrucao_cobranca[] = $instrucaoCobranca;

$boletoData->data->dado_boleto->protesto->protesto = false;

$boletoData->data->dado_boleto->desconto_expresso = false;

// Convertendo todos os dados do boleto para UTF-8
$boletoData = $funcoes->convertToUtf8($boletoData);

$itauBoleto->criaBoleto($token, $boletoData);

