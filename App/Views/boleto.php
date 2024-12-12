<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boleto Itaú</title>
    <style>
        .pagina {
            width: 210mm;
            font-family: Helvetica,
                Arial,
                "Lucida Grande",
                sans-serif;
            font-size: 8pt;
            font-weight: bold;
            margin: 5mm auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            border: 1pt black solid;
            padding-left: 2pt;
            padding-right: 2pt;
            font-weight: normal;
        }

        td.center {
            text-align: center;
            vertical-align: super;
        }

        td.left {
            text-align: left;
            vertical-align: super;
        }

        td.right {
            text-align: right;
            vertical-align: super;
        }

        p {
            font-weight: bold;
            text-align: left;
            white-space: nowrap;
            margin-top: 2pt;
        }

        td.sem-borda {
            border: none;
        }

        td.borda-left {
            border: none;
            border-right: 1pt solid;
            vertical-align: bottom;
        }

        td.cabecalho {
            padding: 0 2mm 0 2mm;
            font-weight: bolder;
            font-size: 10pt;
            vertical-align: bottom;
        }

        td.logo {
            font-size: 8pt;
        }

        hr {
            border-top: 1pt dashed
        }

        p.lb-autenticacao {
            text-align: right;
            margin-right: 5mm;
        }

        .codigo-barras {
            width: 116mm;
            height: 60px;
        }

        @media print {
            .noprint {
                display: none;
            }

            .pagina {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="pagina">
        <table>
            <tr>
                <td class="borda-left logo cabecalho">
                    <img src="../Assets/Imagens/itau-logo.svg" width="32">
                    Banco Itaú S.A.
                </td>
                <td class="borda-left cabecalho center">341-7</td>
                <td class="sem-borda cabecalho center" colspan="5">
                    Recibo do Pagador<br>
                    12345.12345 12345.121212 12345.121212 8 12345678901112
                </td>
            </tr>
            <tr>
                <td class="left" colspan="6">
                    <p style="">Local de Pagamento  Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam officia doloribus ut porro.</p>
                </td>
                <td class="center">
                    <p>Data de Vencimento</p>
                    20/12/2024
                </td>
            </tr>
            <tr>
                <td class="left" colspan="6">
                    <span>Beneficiário</span> <br />
                    <span style="text-transform: uppercase; font-weight: bold; font-size:1.2em">Fulano de Tal  <span style="font-weight:bold; margin-left:20px;">CNPJ/CPF:</span> 123.456.789.10</span>
                    <br>
                    Rua Xyz, 9 - Niteroi - Rio de Janeiro - RJ - 69060-000
                </td>
                <td class="center">
                    <p>Agência/Código Beneficiário</p>
                    123/54321-01
                </td>
            </tr>
            <tr>
                <td class="center">
                    <p>Data do documento</p>
                    01/01/2001
                </td>
                <td class="center" colspan="2">
                    <p>Núm. do documento</p>
                    123
                </td>
                <td class="center">
                    <p>Espécie doc</p>
                    DM
                </td>
                <td class="center">
                    <p>Aceite</p>
                    N
                </td>
                <td class="center">
                    <p>Data Processamento</p>
                    01/01/2001
                </td>
                <td class="center">
                    <p>Nosso Número</p>123456789
                </td>
            </tr>
            <tr>
                <td class="center">
                    <p>Uso do Banco</p>
                    <br>
                </td>
                <td class="center">
                    <p>Carteira</p>
                    157
                </td>
                <td class="center">
                    <p>Espécie</p>
                    R$
                </td>
                <td class="center" colspan="2">
                    <p>Quantidade</p>
                    <br>
                </td>
                <td class="center">
                    <p>Valor</p>
                    <br>
                </td>
                <td class="center">
                    <p>(=) Valor do Documento</p>
                    10,99
                </td>
            </tr>
            <tr>
                <td class="left" colspan="6" rowspan="3">
                    <p>Instruções</p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam officia labore reprehenderit numquam
                    doloribus ut porro laboriosam itaque ipsa ratione.
                </td>
                <td class="center">
                    <p>(-) Descontos/Abatimentos</p>
                    02/01/2001
                </td>
            </tr>
            <tr>
                <td class="center">
                    <p>(+) Juros/Multa</p>
                    02/01/2001
                </td>
            </tr>
            <tr>
                <td class="center">
                    <p>(=) Valor Pago</p>
                    <br>
                </td>
            </tr>
            <tr>
                <td colspan="7">
                    <table>
                        <tr>
                            <td class="sem-borda"><b>Nome do Pagador: </b> Fulano de Tal 2</td>
                            <td class="sem-borda"><b>CPF/CNPJ: </b> 123.123.123-00</td>
                        </tr>
                        <tr>
                            <td class="sem-borda"><b>Endereço: </b> Av. André Araujo, 999 - Aleixo - Amazonas - AM -
                                69060-000
                            </td>
                        </tr>
                        <tr>
                            <td class="sem-borda"><b>Sacador/Avalista: </b> Fulano de Tal 2</td>
                            <td class="sem-borda"><b>CPF/CNPJ: </b> 123.123.123-00</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <p class="lb-autenticacao"><b>Autenticação Mecânica</b></p>
        <hr><br>
        <table>
            <tr>
                <td class="borda-left logo cabecalho ">
                    <img src="../Assets/Imagens/itau-logo.svg" width="32">
                    Banco Itaú S.A.
                </td>
                <td class="borda-left cabecalho center">341-7</td>
                <td class="sem-borda cabecalho right" colspan="5">
                    12345.12345 12345.121212 12345.121212 8 12345678901112
                </td>
            </tr>
            <tr>
                <td class="left" colspan="6">
                    <p>Local de Pagamento</p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam officia labore reprehenderit numquam
                    doloribus ut porro laboriosam itaque ipsa ratione.
                </td>
                <td class="center">
                    <p>Data de Vencimento</p>
                    02/01/2001
                </td>
            </tr>
            <tr>
                <td class="left" colspan="6">
                    <p>Nome do Beneficiário / CNPJ / CPF / Endereço:</p>
                    Fulano de Tal CPF: 123.456.789.10 <br>
                    Rua Suvaco da Cobra, 9 - Narnia - Amazonas - AM - 69060-000
                </td>
                <td class="center">
                    <p>Agência/Código Beneficiário</p>
                    123/54321-01
                </td>
            </tr>
            <tr>
                <td class="center">
                    <p>Data do documento</p>
                    01/01/2001
                </td>
                <td class="center" colspan="2">
                    <p>Núm. do documento</p>
                    123
                </td>
                <td class="center">
                    <p>Espécie doc</p>
                    DM
                </td>
                <td class="center">
                    <p>Aceite</p>
                    N
                </td>
                <td class="center">
                    <p>Data Processamento</p>
                    01/01/2001
                </td>
                <td class="center">
                    <p>Nosso Número</p>123456789
                </td>
            </tr>
            <tr>
                <td class="center">
                    <p>Uso do Banco</p>
                    <br>
                </td>
                <td class="center">
                    <p>Carteira</p>
                    157
                </td>
                <td class="center">
                    <p>Espécie</p>
                    R$
                </td>
                <td class="center" colspan="2">
                    <p>Quantidade</p>
                    <br>
                </td>
                <td class="center">
                    <p>Valor</p>
                    <br>
                </td>
                <td class="center">
                    <p>(=) Valor do Documento</p>
                    10,99
                </td>
            </tr>
            <tr>
                <td class="left" colspan="6" rowspan="3">
                    <p>Instruções</p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam officia labore reprehenderit numquam
                    doloribus ut porro laboriosam itaque ipsa ratione.
                </td>
                <td class="center">
                    <p>(-) Descontos/Abatimentos</p>
                    02/01/2001
                </td>
            </tr>
            <tr>
                <td class="center">
                    <p>(+) Juros/Multa</p>
                    02/01/2001
                </td>
            </tr>
            <tr>
                <td class="center">
                    <p>(=) Valor Pago</p>
                    <br>
                </td>
            </tr>
            <tr>
                <td colspan="7">
                    <table>
                        <tr>
                            <td class="sem-borda"><b>Pagador: </b> Fulano de Tal 2</td>
                            <td class="sem-borda"><b>CPF/CNPJ: </b> 123.123.123-00</td>
                        </tr>
                        <tr>
                            <td class="sem-borda"><b>Endereço: </b> Av. André Araujo, 999 - Aleixo - Amazonas - AM -
                                69060-000
                            </td>
                        </tr>
                        <tr>
                            <td class="sem-borda"><b>Beneficiario Final: </b> Fulano de Tal 2</td>
                            <td class="sem-borda"><b>CPF/CNPJ: </b> 123.123.123-00</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <br>
        <table>
            <tr>
                <td class="sem-borda" rowspan="2">
                    <img class="codigo-barras" src="../Assets/Imagens/codigo-barras.png">
                </td>
                <td class="sem-borda cabecalho right">
                    Ficha de Compensação
                </td>
            </tr>
            <tr>
                <td class="sem-borda right">
                    <p class="lb-autenticacao"><b>Autenticação Mecânica</b></p>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>