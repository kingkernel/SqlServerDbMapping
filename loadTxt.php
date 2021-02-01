<?php
function loadFile($filename)
	{
		$linhas = [];
		$file = fopen($filename, "r");
		while (!feof($file)) {
			$line = fgets($file);
			array_push($linhas, $line);
		}
	fclose($file);
	return $linhas;
	}
function decompile($string, $start, $end)
	{
		$part = substr($string ,$start,$end);
		return $part;
	};
function getValue($string)
	{
		$value = decompile($string, 120, 12);
		return $value;
	};
function getManifest($string)
{
	$value = decompile($linhasfile[1], 1, 16);
	return $value;
}
$linhasfile = loadFile("21122020150756_ExploreBanco_20201218T1201 Items (129).txt");
//print_r($linhasfile);
echo decompile($linhasfile[1], 120, 12);
echo "<br/>";
echo getManifest($linhasfile[1]);

?>