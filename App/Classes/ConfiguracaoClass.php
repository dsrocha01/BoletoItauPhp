<?php

namespace App;

class Configuracao
{

    private $ambiente;
    private $urlAutenticacao;
    private $clientId;
    private $clientSecret;
    private $caminhoCertificado;
    private $caminhoChavePrivada;

    public function __construct()
    {
        $this->ambiente = 1; // 1 - Produção, 2 - Homologação
        $this->urlAutenticacao = $this->ambiente == 1 : "urlAutenticacaoProducao" : "urlAutenticacaoHomologacao";;
        $this->clientId = $this->ambiente == 1 ? "clientIdProducao" : "clientIdDeHomologacao";
        $this->clientSecret = $this->ambiente == 1 ? "clientSecretDeProducao" : "clientSecretDeHomologacao";
        $this->caminhoCertificado = "caminho/seu/certificado";
        $this->caminhoChavePrivada = "caminho/sua/chave/privada";
    }

    public function getAmbiente()
    {
        return $this->ambiente;
    }

    public function getUrlAutenticacao()
    {
        return $this->urlAutenticacao;
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
