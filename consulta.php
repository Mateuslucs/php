<?php
function saldoInicial($datadb_js){

    $servidor = "134.209.114.247";
	$usuario = "sc-dev";
	$senha = "SC-db@065";
	$dbname = "basantana";
	$port = "33354";

	$conexao = mysqli_connect($servidor,$usuario,$senha,$dbname,$port);
	if(!$conexao){
		die("Houve um problema: ".mysqli_connect_error());
	}


    $regex = '~([0-9][0-9]|[0-9])\d\d[-/]([0-9][0-9]|[0-9][0-9]|[0-9])[-/]([0-9][1-9]|[0-9][0-9])~';

    preg_match_all($regex, $datadb_js, $matches);

    $datadb = $matches[0][0];

    $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where dataContabil < '$datadb' and formaPagamento = 'D'";

    $resDB = mysqli_query($conexao,$sql);

	$saldo = "";
	while($row = mysqli_fetch_array($resDB)){
		$saldo = $row['saldo'];
	}

    return $saldo;
    mysqli_close($conexao);
}

echo saldoInicial("dataContabil <= '2022-12-19'");

?>