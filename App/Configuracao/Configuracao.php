<?php

namespace App;

/**
 * Classe de configuração da aplicação.
 * esta classe possui os dados de configuração da API do Itaú.
 * @version 1.0
 * @author Douglas
 */

class Configuracao
{
    private $ambiente;
    private $urlAutenticacao;
    private $urlBoletos;
    private $clientId;
    private $clientSecret;
    private $caminhoCertificado;
    private $caminhoChavePrivada;

    public function __construct()
    {
        $this->ambiente = 1; // 1 - Produção, 2 - Homologação
        $this->urlAutenticacao = $this->ambiente == 1 ? "https://sts.itau.com.br/api/oauth/token" : "https://oauthd.itau/identity/connect/token";
        $this->urlBoletos = $this->ambiente == 1 ? "https://api.itau.com.br/cash_management/v2/" : "https://sandbox.devportal.itau.com.br/itau-ep9-gtw-cash-management-ext-v2/v2";
        $this->clientId = $this->ambiente == 1 ? "24119e85-2cff-4a45-ba0d-37e0e120d244" : "2e5d1708-8b1d-3597-85a5-31768e7b0f67";
        $this->clientSecret = $this->ambiente == 1 ? "8b327bd9-f7bb-4507-a109-2d266fcbce02" : "cc27d880-30a8-4cac-9ef7-83caa7f8b9f8";
        $this->caminhoCertificado = "certificado/certificado.crt";
        $this->caminhoChavePrivada = "certificado/chavePrivada.key";
    }

    public function getAmbiente()
    {
        return $this->ambiente;
    }

    public function getUrlAutenticacao()
    {
        return $this->urlAutenticacao;
    }

    public function getUrlBoletos()
    {
        return $this->urlBoletos;
    }

    public function getClientId()
    {
        return $this->clientId;
    }

    public function getClientSecret()
    {
        return $this->clientSecret;
    }

    public function getCaminhoCertificado()
    {
        return $this->caminhoCertificado;
    }

    public function getCaminhoChavePrivada()
    {
        return $this->caminhoChavePrivada;
    }
}
