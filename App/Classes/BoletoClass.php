<?php
namespace App;

include 'Configuracao/Configuracao.php';
include 'FuncoesClass.php';
class BoletoItau
{

    private $configuracao;
    public $funcoes;

    public function __construct()
    {
        $this->configuracao = new Configuracao();
        $this->funcoes = new \FuncoesClass();
    }

    public function getToken()
    {

        $url = $this->configuracao->getUrlAutenticacao();

        $headers = [
            "Content-Type: application/x-www-form-urlencoded",
            'x-itau-flowID: 1',
            'x-itau-correlationID: 2'
        ];

        $data = "grant_type=client_credentials&client_id=" . $this->configuracao->getClientId() . "&client_secret=" . $this->configuracao->getClientSecret();

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
        curl_setopt($ch, CURLOPT_TIMEOUT, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, '');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_SSLCERT, $this->configuracao->getCaminhoCertificado());
        curl_setopt($ch, CURLOPT_SSLKEY, $this->configuracao->getCaminhoChavePrivada());

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            return 'Erro cURL: ' . curl_error($ch);
        } else {
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if ($httpCode != 200) {
                echo "HTTP Code: $httpCode\n";
                echo "Resposta: $response\n";
            }
        }

        curl_close($ch);

        $responseData = json_decode($response, true);
        return $responseData['access_token'];


    }

    public function getScopo()
    {

        $url = $this->configuracao->getUrlAutenticacao();

        $headers = [
            "Content-Type: application/x-www-form-urlencoded",
            'x-itau-flowID: 1',
            'x-itau-correlationID: 2'
        ];

        $data = "grant_type=client_credentials&client_id=" . $this->configuracao->getClientId() . "&client_secret=" . $this->configuracao->getClientSecret();

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
        curl_setopt($ch, CURLOPT_TIMEOUT, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, '');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_SSLCERT, $this->configuracao->getCaminhoCertificado());
        curl_setopt($ch, CURLOPT_SSLKEY, $this->configuracao->getCaminhoChavePrivada());

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            return 'Erro cURL: ' . curl_error($ch);
        } else {
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if ($httpCode != 200) {
                echo "HTTP Code: $httpCode\n";
                echo "Resposta: $response\n";
            }
        }

        curl_close($ch);

        $responseData = json_decode($response, true);
        return $responseData['scope'];


    }

    public function criaBoleto($token, $boletoData)
    {
        $url = $this->configuracao->getUrlBoletos() .'boletos';

        $headers = [
            'x-itau-flowID: ' .$this->funcoes->generateUuidV4(),
            'x-itau-correlationID: ' . $this->funcoes->generateUuidV4(),
            'x-itau-apikey: ' . $this->configuracao->getClientId(),
            "Content-Type: application/json",
            "Authorization: Bearer $token"
        ];


        // Convertendo $boletoData para JSON
        $data = json_encode($boletoData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        // Verificando se houve erro na conversão para JSON
        if ($data === false) {
            echo "Erro ao converter boletoData para JSON: " . json_last_error_msg();
            return;
        }

        


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_ENCODING, '');
        curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
        curl_setopt($ch, CURLOPT_TIMEOUT, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_SSLCERT, $this->configuracao->getCaminhoCertificado());
        curl_setopt($ch, CURLOPT_SSLKEY, $this->configuracao->getCaminhoChavePrivada());


        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            return 'Erro cURL: ' . curl_error($ch);
        } else {
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if ($httpCode != 200) {
                echo "HTTP Code: $httpCode\n";
                echo "Resposta: $response\n";
            }
        }

        curl_close($ch);

        echo  $response;


        echo ('<pre>');
        print_r($data);
        echo ('</pre>');
        echo '<br><br><br><br>';

        //echo "Boleto criado com sucesso: " . $response;
    }
}


?>