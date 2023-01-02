<?php

function idConta($nome){
	$servidor = "134.209.114.247";
	$usuario = "sc-dev";
	$senha = "SC-db@065";
	$dbname = "basantana";
	$port = "33354";

	$conexao = mysqli_connect($servidor,$usuario,$senha,$dbname,$port);
	if(!$conexao){
		die("Houve um problema: ".mysqli_connect_error());
	}

	$sql = "SELECT idContaCorrente from contaCorrente where nomeConta = '$nome'";
	$resDB = mysqli_query($conexao,$sql);

	$id = "";
	while($row = mysqli_fetch_array($resDB)){
		$id .= $row['idContaCorrente'];
	}

	return $id;

}

function idMina($nome){
	$servidor = "134.209.114.247";
	$usuario = "sc-dev";
	$senha = "SC-db@065";
	$dbname = "basantana";
	$port = "33354";

	$conexao = mysqli_connect($servidor,$usuario,$senha,$dbname,$port);
	if(!$conexao){
		die("Houve um problema: ".mysqli_connect_error());
	}

	$sql = "SELECT idMina from mina where nomeMina = '$nome'";
	$resDB = mysqli_query($conexao,$sql);

	$id = "";
	while($row = mysqli_fetch_array($resDB)){
		$id .= $row['idMina'];
	}

	return $id;

}

function estrato($datadb,$nomeMina,$nomeConta,$formaPagamentoDB,$sinalMina,$sinalConta){
	$servidor = "134.209.114.247";
	$usuario = "sc-dev";
	$senha = "SC-db@065";
	$dbname = "basantana";
	$port = "33354";

	$conexao = mysqli_connect($servidor,$usuario,$senha,$dbname,$port);
	if(!$conexao){
		die("Houve um problema: ".mysqli_connect_error());
	}

	$id_MinaDB = idMina($nomeMina);
	$id_contadb = idConta($nomeConta);

    if($formaPagamentoDB == "E"){

        if($sinalMina == "diferente"){

            if($sinalConta == "diferente"){

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where formaPagamento = 'E' and $datadb and idMina != $id_MinaDB and idConta != $id_contadb";

            }else if($sinalConta == "igual") {

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where formaPagamento = 'E' and $datadb and idMina != $id_MinaDB and idConta = $id_contadb";

            }else {

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where formaPagamento = 'E' and $datadb and idMina != $id_MinaDB";

            }

        }else if($sinalMina == "igual"){

            if($sinalConta == "diferente"){

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where formaPagamento = 'E' and $datadb and idMina = $id_MinaDB and idConta != $id_contadb";

            }else if($sinalConta == "igual") {

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where formaPagamento = 'E' and $datadb and idMina = $id_MinaDB and idConta = $id_contadb";

            }else {

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where formaPagamento = 'E' and $datadb and idMina = $id_MinaDB";

            }

        }else {

            if($sinalConta == "diferente"){

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where formaPagamento = 'E' and $datadb  and idConta != $id_contadb";

            }else if($sinalConta == "igual") {

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where formaPagamento = 'E' and $datadb  and idConta = $id_contadb";

            }else {

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where formaPagamento = 'E' and $datadb ";

            }

        }

    }else if($formaPagamentoDB == "P"){

        if($sinalMina == "diferente"){

            if($sinalConta == "diferente"){

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where formaPagamento = 'P' and $datadb and idMina != $id_MinaDB and idConta != $id_contadb";

            }else if($sinalConta == "igual") {

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where formaPagamento = 'P' and $datadb and idMina != $id_MinaDB and idConta = $id_contadb";

            }else {

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where formaPagamento = 'P' and $datadb and idMina != $id_MinaDB";

            }

        }else if($sinalMina == "igual"){

            if($sinalConta == "diferente"){

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where formaPagamento = 'P' and $datadb and idMina = $id_MinaDB and idConta != $id_contadb";

            }else if($sinalConta == "igual") {

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where formaPagamento = 'P' and $datadb and idMina = $id_MinaDB and idConta = $id_contadb";

            }else {

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where formaPagamento = 'P' and $datadb and idMina = $id_MinaDB";

            }

        }else {

            if($sinalConta == "diferente"){

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where formaPagamento = 'P' and $datadb  and idConta != $id_contadb";

            }else if($sinalConta == "igual") {

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where formaPagamento = 'P' and $datadb  and idConta = $id_contadb";

            }else {

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where formaPagamento = 'P' and $datadb ";

            }

        }

    }else if($formaPagamentoDB == "V"){

        if($sinalMina == "diferente"){

            if($sinalConta == "diferente"){

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where formaPagamento = 'V' and $datadb and idMina != $id_MinaDB and idConta != $id_contadb";

            }else if($sinalConta == "igual") {

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where formaPagamento = 'V' and $datadb and idMina != $id_MinaDB and idConta = $id_contadb";

            }else {

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where formaPagamento = 'V' and $datadb and idMina != $id_MinaDB";

            }

        }else if($sinalMina == "igual"){

            if($sinalConta == "diferente"){

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where formaPagamento = 'V' and $datadb and idMina = $id_MinaDB and idConta != $id_contadb";

            }else if($sinalConta == "igual") {

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where formaPagamento = 'V' and $datadb and idMina = $id_MinaDB and idConta = $id_contadb";

            }else {

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where formaPagamento = 'V' and $datadb and idMina = $id_MinaDB";

            }

        }else {

            if($sinalConta == "diferente"){

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where formaPagamento = 'V' and $datadb  and idConta != $id_contadb";

            }else if($sinalConta == "igual") {

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where formaPagamento = 'V' and $datadb  and idConta = $id_contadb";

            }else {

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where formaPagamento = 'V' and $datadb ";

            }

        }

    }else {

        if($sinalMina == "diferente"){

            if($sinalConta == "diferente"){

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where $datadb and idMina != $id_MinaDB and idConta != $id_contadb";

            }else if($sinalConta == "igual") {

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where $datadb and idMina != $id_MinaDB and idConta = $id_contadb";

            }else {

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where $datadb and idMina != $id_MinaDB";

            }

        }else if($sinalMina == "igual"){

            if($sinalConta == "diferente"){

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where $datadb and idMina = $id_MinaDB and idConta != $id_contadb";

            }else if($sinalConta == "igual") {

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where $datadb and idMina = $id_MinaDB and idConta = $id_contadb";

            }else {

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where $datadb and idMina = $id_MinaDB";

            }

        }else {

            if($sinalConta == "diferente"){

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where $datadb  and idConta != $id_contadb";

            }else if($sinalConta == "igual") {

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where $datadb  and idConta = $id_contadb";

            }else {

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where $datadb";

            }

        }

    }



	$resDB = mysqli_query($conexao,$sql);

	$credito = "";
	$debito = "";
	$saldo = "";
	while($row = mysqli_fetch_array($resDB)){
		$debito = $row['debito'];
		$credito = $row['credito'];
		$saldo = $row['saldo'];
	}

	$json = array(
		'debito' => $debito,
		'credito' => $credito,
		'saldo' => $saldo
	);

	return $json;
	mysqli_close($conexao);
}

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

    $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where dataContabil < '$datadb' and formaPagamento = 'E'";

    $resDB = mysqli_query($conexao,$sql);

	$saldo = "";
	while($row = mysqli_fetch_array($resDB)){
		$saldo = $row['saldo'];
	}

    return $saldo;
    mysqli_close($conexao);
}

function sinal($str){
    $format_data = "";
    if (strpos($str, 'menorigual') !== false) {
        $format_data .= str_replace('menorigual','<=',$str);
    }else if(strpos($str, 'igual') !== false) {
	
		$format_data .= str_replace('igual','=',$str);
		
	}else if(strpos($str, 'maior') !== false) {
	
		$format_data .= str_replace('maior','>',$str);
		
	}else if(strpos($str, 'menor') !== false) {
	
		$format_data .= str_replace('menor','<',$str);
	}else{
		$format_data .= $str;
	}

    return $format_data;
}



$datadb_js = sinal($_GET['data']);
$nomeMina_js = $_GET['mina'];
$nomeConta_js = $_GET['conta'];
$formaPagamentoDB = $_GET['formaPagamento'];
$sinalMina = $_GET['sinalMina'];
$sinalConta = $_GET['sinalConta'];


$obj = estrato($datadb_js,$nomeMina_js,$nomeConta_js,$formaPagamentoDB,$sinalMina,$sinalConta);


$saldoInicial = saldoInicial($datadb_js) != "" ? saldoInicial($datadb_js) : 0;
$debito = $obj['debito'] != "" ? $obj['debito'] : 0;
$credito = $obj['credito'] != "" ? $obj['credito'] : 0;
$saldoFinal = $saldoInicial + $credito - $debito;


echo "$datadb_js, $nomeMina_js, $nomeConta_js, $formaPagamentoDB, $sinalMina, $sinalConta. dados : debito(R$ ".number_format($debito,2,",",".")."), credito(R$ ".number_format($credito,2,",",".")."), saldo final(R$ ".number_format($saldoFinal,2,",",".")."), saldo inicial(R$ ".number_format($saldoInicial,2,",",".").")";




function extrato($condicao) {
    $servidor = "134.209.114.247";
	$usuario = "sc-dev";
	$senha = "SC-db@065";
	$dbname = "basantana";
	$port = "33354";

	$conexao = mysqli_connect($servidor,$usuario,$senha,$dbname,$port);
	if(!$conexao){
		die("Houve um problema: ".mysqli_connect_error());
	}

    $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao $condicao";

    $resDB = mysqli_query($conexao,$sql);

	$credito = "";
	$debito = "";
	$saldo = "";
	while($row = mysqli_fetch_array($resDB)){
		$debito = $row['debito'];
		$credito = $row['credito'];
		$saldo = $row['saldo'];
	}

	$json = array(
		'debito' => $debito,
		'credito' => $credito,
		'saldo' => $saldo
	);

	return $json;
	mysqli_close($conexao);

}

$saldoInicial = saldoInicial($datadb_js,$nomeConta_js,$nomeMina_js) != "" ? saldoInicial($datadb_js,$nomeConta_js,$nomeMina_js) : 0;
$debito = $obj['debito'] != "" ? $obj['debito'] : 0;
$credito = $obj['credito'] != "" ? $obj['credito'] : 0;
$saldoFinal = $saldoInicial + $credito - $debito





















?>