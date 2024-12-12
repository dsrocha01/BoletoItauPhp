<?php
namespace App;

/**
 * Entidade de modelo do boleto.
 *
 * @version 1.0
 * @author Douglas
 */

class Beneficiario
{
    public $id_beneficiario;
}

class Pessoa
{
    public $nome_pessoa;
    public $tipo_pessoa;
}

class TipoPessoa
{
    public $codigo_tipo_pessoa;
    public $numero_cadastro_pessoa_fisica;
    public $numero_cadastro_nacional_pessoa_juridica;
}

class Endereco
{
    public $nome_logradouro;
    public $nome_bairro;
    public $nome_cidade;
    public $sigla_UF;
    public $numero_CEP;
}

class Pagador
{
    public $pessoa;
    public $endereco;

    //Caso seja informado 'email' no campo dado_boleto > forma_envio, é obrigatório informar um e-mail válido no campo dado_boleto > pagador > texto_endereço_email. Máximo caracteres: 250. É possível informar até três e-mails sparados por um ";", o primeiro endereço informado será atribuído como destinatário e os demais como cópia oculta, desde que respeitado o limite de 250 caracteres.
    public $texto_endereco_email;

    public function __construct()
    {
        $this->pessoa = new Pessoa();
        $this->pessoa->tipo_pessoa = new TipoPessoa();
        $this->endereco = new Endereco();
    }
}

class SacadorAvalista{
    public $numero_cadastro_nacional_pessoa_juridica;
    public function __construct()
    {
        $this->endereco = new Endereco();
    }
}

class DadosIndividuaisBoleto
{
    public $numero_nosso_numero;
    public $data_vencimento;
    public $valor_titulo;
    public $texto_uso_beneficiario;
    public $texto_seu_numero;
}

class Multa
{
    public $codigo_tipo_multa;
    public $data_multa;
    public $percentual_multa;
    public $quantidade_dias_multa;
    public $valor_multa;
}

class Juros
{
    /**
      Tipo da cobrança dos juros no cálculo da cobrança. Para cada um dos valores informados, será impresso no boleto a notação referente ao valor correspondente em porcentagem mensal.
      '05' Quando não se deseja cobrar juros caso o pagamento seja feito após o vencimento (isento)
      '90' Percentual mensal (utilizando parâmetros do cadastro de beneficiário para dias úteis ou corridos)
      '91' - Percentual diário (utilizando parâmetros do cadastro de beneficiário para dias úteis ou corridos)
      '92' - Percentual anual (utilizando parâmetros do cadastro de beneficiário para dias úteis ou corridos)
      '93' - Valor diário (utilizando parâmetros do cadastro de beneficiário para dias úteis ou corridos)
     */
    public $codigo_tipo_juros;
    public $data_juros;
    public $percentual_juros;
    public $quantidade_dias_juros;
    public $valor_juros;
}

class RecebimentoDivergente
{
    public $codigo_tipo_autorizacao;
}

class InstrucaoCobranca
{
    public $codigo_instrucao_cobranca;
    public $quantidade_dias_apos_vencimento;
    public $dia_util;
}

class Protesto
{
    public $protesto;
    public $quantidade_dias_protesto;
}

class Desconto{
    public $codigo_tipo_desconto;
    public $descontos;
    public function __construct()
    {
        $this->descontos = new Descontos();
    }
}

class Descontos {
    public $percentual_desconto;
}

class Data{

    public $etapa_processo_boleto;
    public $codigo_canal_operacao;
    public $beneficiario;
    public $dado_boleto;

    public function __construct()
    {
        $this->beneficiario = new Beneficiario();
        $this->dado_boleto = new DadoBoleto();
    }
    
        
}

class DadoBoleto
{

    #region dado_boleto

    public $id_boleto;

    //public $id_beneficiario;
    public $descricao_instrumento_cobranca;
    public $tipo_boleto;
    public $codigo_carteira;

    //"Código de espécie do título Deve ser preenchido conforme os dominios abaixo: 01 - DM Duplicata Mercantil 02 - NP Nota Promissoria 03 - NS Nota de Seguro 04 - ME Mensalidade Escolar 05 - RC Recibo 06 - CT Contrato 07 - Cosseguros 08 - DS Duplicata de Serviço 09 - LC Letra de Câmbio 13 - Nota de débitos 15 - DD Documento de Dívida 16 - EC Encargos condominiais 17 - Prestação de Serviços 18 - BDP Boleto proposta 88 - CBI Cedula de credito Bancario por Indicacao 89 - CC Contrato de Cambio 90 - CCB Cedula de Credito Bancario 91 - CD Confissao de Divida apenas para falencia uma declaracao do devedor 92 - CH Cheque 93 - CM Contrato de Mutuo 94 - CPS Conta de Prestacao de Servicos de prof. liberal ou declaracao do profissional 95 - DMI Duplicata de venda Mercantil por Indicacao 96 - DSI Duplicata de prestacao de Servicos por Indicacao de comprovante 97 - RA Recibo de Aluguel para pessoa juridica (contrato aluguel e recibo) 98 - TA Termo de Acordo - Ex. acao trabalhista 99 - Diversos"
    public $codigo_especie;

    public $valor_abatimento;
    public $data_emissao;
    public $pagamento_parcial;
    public $quantidade_maximo_parcial;

    public $quantidade_parcelas;

    public $forma_envio;

    
    //O campo pode ser preenchido de forma personalizada. Máximo caracteres: 50
    public $assunto_email;
    //O campo pode ser preenchido de forma personalizada. Máximo caracteres: 200
    public $mensagem_email;

    public $numero_ddd;
    public $numero_telefone;
    public $desconto_expresso = false;

    //objetos
    public $pagador;
    public $dados_individuais_boleto;
    public $multa;
    public $juros;
    public $recebimento_divergente;
    public $instrucao_cobranca;
    public $protesto;
    public $sacador_avalista;
    public $desconto;
    #endregion

    public function __construct()
    {
        $this->pagador = new Pagador();
        $this->dados_individuais_boleto = new DadosIndividuaisBoleto();
        $this->multa = new Multa();
        $this->juros = new Juros();
        $this->recebimento_divergente = new RecebimentoDivergente();
        $this->instrucao_cobranca = new InstrucaoCobranca();
        $this->protesto = new Protesto();
        $this->sacador_avalista = new SacadorAvalista();
        $this->desconto = new Desconto();
    }
}

class BoletoViewModel
{
    public $data;

    public function __construct()
    {
        $this->data = new Data();
    }
}
