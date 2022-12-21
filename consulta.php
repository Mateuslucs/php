<?php
function idConta($nome){
	$servidor = "142.93.112.180";
	$usuario = "webHook";
	$senha = "Cronos@065-V8";
	$dbname = "basantana";

	$conexao = mysqli_connect($servidor,$usuario,$senha,$dbname);
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
	$servidor = "142.93.112.180";
	$usuario = "webHook";
	$senha = "Cronos@065-V8";
	$dbname = "basantana";

	$conexao = mysqli_connect($servidor,$usuario,$senha,$dbname);
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

function estrato($data,$nomeMina,$nomeConta,$formaPagamento,$sinalMina,$sinalConta){
	$servidor = "142.93.112.180";
	$usuario = "webHook";
	$senha = "Cronos@065-V8";
	$dbname = "basantana";

	$conexao = mysqli_connect($servidor,$usuario,$senha,$dbname);
	if(!$conexao){
		die("Houve um problema: ".mysqli_connect_error());
	}

	$id_Mina = idMina($nomeMina);
	$id_conta = idConta($nomeConta);

    if($formaPagamento == "D"){

        if($sinalMina == "diferente"){

            if($sinalConta == "diferente"){

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where formaPagamento = 'D' and $data and idMina != $id_Mina and idConta != $id_conta";

            }else if($sinalConta == "igual") {

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where formaPagamento = 'D' and $data and idMina != $id_Mina and idConta = $id_conta";

            }else {

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where formaPagamento = 'D' and $data and idMina != $id_Mina";

            }

        }else if($sinalMina == "igual"){

            if($sinalConta == "diferente"){

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where formaPagamento = 'D' and $data and idMina = $id_Mina and idConta != $id_conta";

            }else if($sinalConta == "igual") {

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where formaPagamento = 'D' and $data and idMina = $id_Mina and idConta = $id_conta";

            }else {

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where formaPagamento = 'D' and $data and idMina = $id_Mina";

            }

        }else {

            if($sinalConta == "diferente"){

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where formaPagamento = 'D' and $data  and idConta != $id_conta";

            }else if($sinalConta == "igual") {

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where formaPagamento = 'D' and $data  and idConta = $id_conta";

            }else {

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where formaPagamento = 'D' and $data ";

            }

        }

    }else if($formaPagamento == "P"){

        if($sinalMina == "diferente"){

            if($sinalConta == "diferente"){

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where formaPagamento = 'P' and $data and idMina != $id_Mina and idConta != $id_conta";

            }else if($sinalConta == "igual") {

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where formaPagamento = 'P' and $data and idMina != $id_Mina and idConta = $id_conta";

            }else {

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where formaPagamento = 'P' and $data and idMina != $id_Mina";

            }

        }else if($sinalMina == "igual"){

            if($sinalConta == "diferente"){

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where formaPagamento = 'P' and $data and idMina = $id_Mina and idConta != $id_conta";

            }else if($sinalConta == "igual") {

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where formaPagamento = 'P' and $data and idMina = $id_Mina and idConta = $id_conta";

            }else {

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where formaPagamento = 'P' and $data and idMina = $id_Mina";

            }

        }else {

            if($sinalConta == "diferente"){

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where formaPagamento = 'P' and $data  and idConta != $id_conta";

            }else if($sinalConta == "igual") {

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where formaPagamento = 'P' and $data  and idConta = $id_conta";

            }else {

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where formaPagamento = 'P' and $data ";

            }

        }

    }else if($formaPagamento == "V"){

        if($sinalMina == "diferente"){

            if($sinalConta == "diferente"){

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where formaPagamento = 'V' and $data and idMina != $id_Mina and idConta != $id_conta";

            }else if($sinalConta == "igual") {

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where formaPagamento = 'V' and $data and idMina != $id_Mina and idConta = $id_conta";

            }else {

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where formaPagamento = 'V' and $data and idMina != $id_Mina";

            }

        }else if($sinalMina == "igual"){

            if($sinalConta == "diferente"){

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where formaPagamento = 'V' and $data and idMina = $id_Mina and idConta != $id_conta";

            }else if($sinalConta == "igual") {

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where formaPagamento = 'V' and $data and idMina = $id_Mina and idConta = $id_conta";

            }else {

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where formaPagamento = 'V' and $data and idMina = $id_Mina";

            }

        }else {

            if($sinalConta == "diferente"){

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where formaPagamento = 'V' and $data  and idConta != $id_conta";

            }else if($sinalConta == "igual") {

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where formaPagamento = 'V' and $data  and idConta = $id_conta";

            }else {

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where formaPagamento = 'V' and $data ";

            }

        }

    }else {

        if($sinalMina == "diferente"){

            if($sinalConta == "diferente"){

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where $data and idMina != $id_Mina and idConta != $id_conta";

            }else if($sinalConta == "igual") {

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where $data and idMina != $id_Mina and idConta = $id_conta";

            }else {

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where $data and idMina != $id_Mina";

            }

        }else if($sinalMina == "igual"){

            if($sinalConta == "diferente"){

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where $data and idMina = $id_Mina and idConta != $id_conta";

            }else if($sinalConta == "igual") {

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where $data and idMina = $id_Mina and idConta = $id_conta";

            }else {

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where $data and idMina = $id_Mina";

            }

        }else {

            if($sinalConta == "diferente"){

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where $data  and idConta != $id_conta";

            }else if($sinalConta == "igual") {

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where $data  and idConta = $id_conta";

            }else {

                $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where $data";

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


$data_js = $_GET['data'];
$nomeMina_js = $_GET['mina'];
$nomeConta_js = $_GET['conta'];
$formaPagamento = $_GET['formaPagamento'];
$sinalMina = $_GET['sinalMina'];
$sinalConta = $_GET['sinalConta'];


$obj = estrato($data_js,$nomeMina_js,$nomeConta_js,$formaPagamento,$sinalMina,$sinalConta);

$debito = $obj['debito'];
$credito = $obj['credito'];
$saldo = $obj['saldo'];

$json = json_encode($obj);

echo $json;

?>