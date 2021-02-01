<?php
/*
	funcção para preencher com o caracter informado, pelo numeor de vezes da quanrtidade
*/
	//Definindo áreas fixas na remessa
define("TIPO", "REC300");
define("EMPRESA", "PHOENEX CARGO A. CARGA AEREO  ");
define("EMPRESA2", "PHOENEX CARGO AGENCIAMENTO DE ");
define("CNPJ", "10257602000182");
define("PRENOME", "0001BRASIL");
define("DATAREM", date("Ymd"));
define("CONVEN", "526975");
define("MCI", "211002276");
define("INDICADOR", "2");
define("CHAVEJ", "J10257602");
define("APLICATIVO", "PHX40000");
define("RECINTO", "008176000");
 function fill($palavra, $char, $quant, $lado = STR_PAD_LEFT)
 /*
 	Função para preencher com o caracter informado
 */
	 {
	 	$nome = str_pad($palavra, $quant, $char, $lado);
	 	return $nome;
	 };

function cfile($nomefile, $conteudo)
 /*
 	Função que coloca dados no arquivo
 */
	{
		$arquivo = fopen($nomefile, 'w');
		fwrite($arquivo, $conteudo);
		fclose($arquivo);

		return $arquivo;
	}
function validSize($string)
 /*
 	Função testa o tamanho da linha
 */
	{
		$message = "";
		if(!strlen($string) == 300){
			$message = "Tamanho errado";
		} else {
			$message = strlen($string);
		};
		return $message;
	};
function datePattern($date)
	{
		$explode = explode("/", $date);
		$pattern = implode("", $explode);
		return $pattern;
	};
function valuePattern($value)
	{
		$money = str_replace([",", "."], "", $value);
		$money = fill($money, "0",17);
		return $money;
	};
function segA($numeroremessa)
/*
 	Função que monta o segmento A
 	Status: CONCLUÍDA
 */
	{
		//$linhaA = implode("", $array);
		$segA = "A".TIPO."0001".DATAREM.$numeroremessa.CONVEN.MCI.EMPRESA
			.fill("0", "0", 27).fill(" ", " ", 173).$numeroremessa
			.fill(" ", " ", 11).APLICATIVO.fill("1", "0", 5);
			
		return $segA;
	};
function segD($dataarec, $manifesto, $valor)
/*
 	Função que monta o segmento D
 	Status: INCOMPLETA
 */
	{
		$periodo = datePattern($dataarec);
		$codReceita= "1587";
		$convenente = "1";
		$vencimento = "00000000";
		$datapagamento = "00000000";
		$tiporecibo = " ";
		$referencia = fill("0", "0", 17);
		$valorprincipal = fill(valuePattern($valor), "0", "17");
		$valormulta = fill("0", "0", 17);
		$valorjuros = fill("0", "0", 17);
		$segD = "D".$periodo.INDICADOR.CNPJ.$codReceita."00000000".RECINTO.date("Ymd").$valorprincipal
		.$valormulta.$valorjuros.valuePattern($valor).$tiporecibo.EMPRESA2.$convenente.$vencimento."80249"
		.$manifesto."    ".CHAVEJ.CNPJ.fill(" ", " ", 86).fill("2", "0", 5);
		return $segD;
	};
function segZ()
/*
 	Função que monta o segmento Z
 	Status: CONCLUÍDA
 */
	{
		$segZ = "Z".fill("1", "0", 6).fill(" ", " ", 288).fill("3", "0", 5);
		return $segZ;
	};
function geraDarf($segA, $segD, $segZ)
	{
		$darf = $segA."\n".$segD."\n".$segZ;
		return $darf;
	};
function extractValue()
	{
		
	};

$load = cfile("001BRASIL9124.REM", geraDarf(segA("009124"), segD("2020/12/17", "PEX2020000626262", "7.3650,00"), segZ()));
echo datePattern("2020/12/17");
echo "<br/>";
echo date("Ymd");
echo "<br/>";
echo "<br/>";
echo "<br/>";
?>