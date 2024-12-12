<?php

/**
 * Classe de funções gerais utilizadas na API

 * @version 1.0
 * @author Douglas
 */
class FuncoesClass
{

    public function calcularDacModulo11($numero) {
        $fatores = [2, 3, 4, 5, 6, 7, 8, 9];
        $soma = 0;
        $fatorIndex = 0;

        // Percorre o número de trás para frente
        $tamanho = strlen($numero);

        for ($i = strlen($numero) - 1; $i >= 0; $i--) {
            $soma += intval($numero[$i]) * $fatores[$fatorIndex];
            $fatorIndex = ($fatorIndex + 1) % count($fatores);
        }

        $resto = $soma % 11;
        $dac = 11 - $resto;

        // Ajusta o DAC conforme as regras do módulo 11
        if ($dac == 0 || $dac == 10 || $dac == 11) {
            $dac = 1;
        }

        return $dac;
    }

    public function calcularDacModulo10($numero)
    {
        $soma = 0;
        $multiplicador = 2;

        // Percorre o número de trás para frente
        for ($i = strlen($numero) - 1; $i >= 0; $i--) {
            $digito = intval($numero[$i]) * $multiplicador;

            // Se o resultado da multiplicação for maior que 9, soma os dígitos do resultado
            if ($digito > 9) {
                $digito = ($digito % 10) + 1;
            }

            $soma += $digito;

            // Alterna o multiplicador entre 2 e 1
            $multiplicador = ($multiplicador == 2) ? 1 : 2;
        }

        $resto = $soma % 10;
        $dac = ($resto == 0) ? 0 : 10 - $resto;

        return $dac;
    }

    public function calcularDacModulo11AgenciaConta($agencia, $conta)
    {
        $numero = $agencia . $conta;
        $peso = [2, 3, 4, 5, 6, 7, 8, 9];
        $soma = 0;
        $pesoIndex = 0;

        // Percorre o número de trás para frente
        for ($i = strlen($numero) - 1; $i >= 0; $i--) {
            $soma += intval($numero[$i]) * $peso[$pesoIndex];
            $pesoIndex = ($pesoIndex + 1) % count($peso);
        }

        $resto = $soma % 11;
        $dac = 11 - $resto;

        if ($dac == 0 || $dac == 10 || $dac == 11) {
            $dac = 1;
        }

        return $dac;
    }

    // Função para converter todos os valores de um array ou objeto para UTF-8
    public function convertToUtf8($data)
    {
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                $data[$key] = $this->convertToUtf8($value);
            }
        } elseif (is_object($data)) {
            foreach ($data as $key => $value) {
                $data->$key = $this->convertToUtf8($value);
            }
        } elseif (is_string($data)) {
            return mb_convert_encoding($data, 'UTF-8', 'auto');
        }
        return $data;
    }

    public function generateUuidV4()
    {
        $data = random_bytes(16);
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // Versão 4
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // Variante 10xx

        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }
}

