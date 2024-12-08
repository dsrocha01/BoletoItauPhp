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

    public function __construct()
    {
        $this->pessoa = new Pessoa();
        $this->pessoa->tipo_pessoa = new TipoPessoa();
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
}

class Juros
{
    public $codigo_tipo_juros;
    public $data_juros;
    public $percentual_juros;
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

class Data{

    public $etapa_processo_boleto;
    public $codigo_canal_operacao;
    public $beneficiario;

    public function __construct()
    {
        $this->beneficiario = new Beneficiario();
    }
    
        
}

class DadoBoleto
{

    #region dado_boleto

    public $id_boleto;

    public $id_beneficiario;
    public $descricao_instrumento_cobranca;
    public $tipo_boleto;
    public $codigo_carteira;

    //"Código de espécie do título Deve ser preenchido conforme os dominios abaixo: 01 - DM Duplicata Mercantil 02 - NP Nota Promissoria 03 - NS Nota de Seguro 04 - ME Mensalidade Escolar 05 - RC Recibo 06 - CT Contrato 07 - Cosseguros 08 - DS Duplicata de Serviço 09 - LC Letra de Câmbio 13 - Nota de débitos 15 - DD Documento de Dívida 16 - EC Encargos condominiais 17 - Prestação de Serviços 18 - BDP Boleto proposta 88 - CBI Cedula de credito Bancario por Indicacao 89 - CC Contrato de Cambio 90 - CCB Cedula de Credito Bancario 91 - CD Confissao de Divida apenas para falencia uma declaracao do devedor 92 - CH Cheque 93 - CM Contrato de Mutuo 94 - CPS Conta de Prestacao de Servicos de prof. liberal ou declaracao do profissional 95 - DMI Duplicata de venda Mercantil por Indicacao 96 - DSI Duplicata de prestacao de Servicos por Indicacao de comprovante 97 - RA Recibo de Aluguel para pessoa juridica (contrato aluguel e recibo) 98 - TA Termo de Acordo - Ex. acao trabalhista 99 - Diversos"
    public $codigo_especie;
    public $valor_abatimento;
    public $data_emissao;
    public $forma_envio;

    //Caso seja informado 'email' no campo dado_boleto > forma_envio, é obrigatório informar um e-mail válido no campo dado_boleto > pagador > texto_endereço_email. Máximo caracteres: 250. É possível informar até três e-mails sparados por um ";", o primeiro endereço informado será atribuído como destinatário e os demais como cópia oculta, desde que respeitado o limite de 250 caracteres.
    public $texto_endereco_email;
    //O campo pode ser preenchido de forma personalizada. Máximo caracteres: 50
    public $assunto_email;
    //O campo pode ser preenchido de forma personalizada. Máximo caracteres: 200
    public $mensagem_email;

    public $numero_ddd;
    public $numero_telefone;

    public $desconto_expresso = false;


    public $pagador;
    public $dados_individuais_boleto;
    public $multa;
    public $juros;
    public $recebimento_divergente;
    public $instrucao_cobranca;
    public $protesto;
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
    }
}

class BoletoViewModel
{
    public $dado_boleto;
    public $data;

    public function __construct()
    {
        $this->dado_boleto = new DadoBoleto();
        $this->data = new Data();
    }
}
