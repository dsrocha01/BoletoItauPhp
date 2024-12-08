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
        $this->urlAutenticacao = $this->ambiente == 1 ? "https://sts.itau.com.br/api/oauth/token" : "https://sts.itau.com.br/api/oauth/token";
        $this->urlBoletos = $this->ambiente == 1 ? "https://api.itau.com.br/cash_management/v2/" : "https://devportal.itau.com.br/sandboxapi/cash_management_ext_v2/v2";
        $this->clientId = $this->ambiente == 1 ? "" : "";
        $this->clientSecret = $this->ambiente == 1 ? "" : "";
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
