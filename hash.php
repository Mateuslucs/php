<?php 
function nomeMina($idMina){

	$servidor = "134.209.114.247";
	$usuario = "sc-dev";
	$senha = "SC-db@065";
	$dbname = "basantana";
	$port = "33354";

	$conexao = mysqli_connect($servidor,$usuario,$senha,$dbname,$port);
	if(!$conexao){
		die("Houve um problema: ".mysqli_connect_error());
	}

	$sql = "SELECT nomeMina FROM mina WHERE idMina = $idMina";

	$resDB = mysqli_query($conexao,$sql);

	$nome = "";
	while($row = mysqli_fetch_array($resDB)){
		$nome = $row['nomeMina'];
	}

	return $nome;
	mysqli_close($conexao);

}

function saldo() {
	$servidor = "134.209.114.247";
	$usuario = "sc-dev";
	$senha = "SC-db@065";
	$dbname = "basantana";
	$port = "33354";

	$conexao = mysqli_connect($servidor,$usuario,$senha,$dbname,$port);
	if(!$conexao){
		die("Houve um problema: ".mysqli_connect_error());
	}
	$data = date('Y-m-d');

	$sql = "SELECT valor FROM movimentacao WHERE tipoMovimentacao = 'V' and inserted_at like '$data%'";

	$resDB = mysqli_query($conexao,$sql);

	$total = 0;
	while($row = mysqli_fetch_array($resDB)){
		$total += $row['valor'];
	}

	return $total;

}

function extrato_geral($condicao, $id_mina) {
    $servidor = "134.209.114.247";
	$usuario = "sc-dev";
	$senha = "SC-db@065";
	$dbname = "basantana";
	$port = "33354";

	$conexao = mysqli_connect($servidor,$usuario,$senha,$dbname,$port);
	if(!$conexao){
		die("Houve um problema: ".mysqli_connect_error());
	}

    /* pegando condição */

    $cond = str_replace("(","",str_replace(")","",$condicao));

    $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao $cond and formaPagamento = 'E'";

    $resDB = mysqli_query($conexao,$sql);

	$credito = "";
	$debito = "";
	$saldo = "";
	while($row = mysqli_fetch_array($resDB)){
		$debito = $row['debito'];
		$credito = $row['credito'];
		$saldo = $row['saldo'];
	}

    /* cofre */

    $sql2 = "SELECT idContaCofre from mina where idMina = $id_mina";

    $resDB2 = mysqli_query($conexao,$sql2);

    
    $id_contaCofre = "";
    while($x = mysqli_fetch_array($resDB2)){
        $id_contaCofre .= $x['idContaCofre'];
    }
    
    $filtro = str_replace("idMina = 1 and idConta = 9","idConta = '$id_contaCofre'",$cond);

    $sql3 = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao $filtro";

    $resDB3 = mysqli_query($conexao,$sql3);

	$credito_cofre = "";
	$debito_cofre = "";
	$saldo_cofre = "";
	while($row = mysqli_fetch_array($resDB3)){
		$debito_cofre = $row['debito'];
		$credito_cofre = $row['credito'];
		$saldo_cofre = $row['saldo'];
	}

	$json = array(
		'debito' => $debito,
		'credito' => $credito,
		'saldo' => $saldo,
        'debito_cofre' => $debito_cofre,
        'credito_cofre' => $credito_cofre,
        'saldo_cofre' => $saldo_cofre
	);

	return $json;
	mysqli_close($conexao);

}

function saldoInicial_cofre($datadb_js, $id_mina){

    $servidor = "134.209.114.247";
	$usuario = "sc-dev";
	$senha = "SC-db@065";
	$dbname = "basantana";
	$port = "33354";

	$conexao = mysqli_connect($servidor,$usuario,$senha,$dbname,$port);
	if(!$conexao){
		die("Houve um problema: ".mysqli_connect_error());
	}


    $regex = '~([0-9][0-9]|[0-9])\d\d-([0-9][0-9]|[0-9][0-9]|[0-9])-([0-9][1-9]|[0-9][0-9])~';

    preg_match_all($regex, $datadb_js, $matches);

    $datadb = $matches[0][0];

    $sql1 = "SELECT idContaCofre from mina where idMina = $id_mina";

    $resDB1 = mysqli_query($conexao,$sql1);

    //idConta = '$id_contaCofre'
    
    $id_contaCofre = "";
    while($x = mysqli_fetch_array($resDB1)){
        $id_contaCofre .= $x['idContaCofre'];
    }
    

    $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where dataContabil < '$datadb' and idConta = '$id_contaCofre'";

    $resDB = mysqli_query($conexao,$sql);

	$saldo = "";
	while($row = mysqli_fetch_array($resDB)){
		$saldo = $row['saldo'];
	}

    return $saldo;
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


    $regex = '~([0-9][0-9]|[0-9])\d\d-([0-9][0-9]|[0-9][0-9]|[0-9])-([0-9][1-9]|[0-9][0-9])~';

    preg_match_all($regex, $datadb_js, $matches);

    $datadb = $matches[0][0];

    $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where dataContabil < '$datadb'";

    $resDB = mysqli_query($conexao,$sql);

	$saldo = "";
	while($row = mysqli_fetch_array($resDB)){
		$saldo = $row['saldo'];
	}

    return $saldo;
    mysqli_close($conexao);
}




/* INICIO DO CODIGO */

{grid_NomedaMina} = [usuario_idMina] == "" ? 0 : [usuario_idMina];

$usuario_idMina_nome = nomeMina({grid_NomedaMina});


{grid_NomedaMina} = $usuario_idMina_nome;


$dataNow = date('d/m/Y');

{grid_datahj} = $dataNow;
{grid_saldohj} = saldo();

$minaDaConta = mina({idConta});

$condicao = {sc_where_current};

$obj = extrato_geral($condicao,$minaDaConta);


$saldoInicial = saldoInicial($condicao) != "" ? saldoInicial($condicao) : 0;
$debito = $obj['debito'] != "" ? $obj['debito'] : 0;
$credito = $obj['credito'] != "" ? $obj['credito'] : 0;
$saldo = $obj['saldo'];
$saldoFinal = $saldoInicial + $credito - $debito;

$saldoInicial_cofre = saldoInicial_cofre($condicao, 1);
$debito_cofre = $obj['debito_cofre'];
$credito_cofre = $obj['credito_cofre'];
$saldoFinal_cofre = $saldoInicial_cofre + $credito_cofre - $debito_cofre;

{saldo_inicial2} = $saldoInicial_cofre;
{debito2} = $debito_cofre;
{credito2} = $credito_cofre;
{saldo_final2} = $saldoFinal_cofre;

/* ==================================REFAZER CODIGO==================================== */

$minaDaConta = mina({idConta});

$condicao = {sc_where_current};

$obj = extrato_geral($condicao,$minaDaConta);



$saldoInicial = saldoInicial($condicao) != "" ? saldoInicial($condicao) : 0;
$debito = $obj['debito'] != "" ? $obj['debito'] : 0;
$credito = $obj['credito'] != "" ? $obj['credito'] : 0;
$saldo = $obj['saldo'];
$saldoFinal = $saldoInicial + $credito - $debito;


{saldo_inicial} = "R$ ".number_format($saldoInicial,2,",",".");
{debito} = "R$ ".number_format($debito,2,",",".");
{credito} = "R$ ".number_format($credito,2,",",".");
{saldo_final} = "R$ ".number_format($saldoFinal,2,",",".");

/* SALDO DO COFRE */

$saldoInicial_cofre = saldoInicial_cofre($condicao, $minaDaConta) != "" ? saldoInicial_cofre($condicao, $minaDaConta): 0;
$debito_cofre = $obj['debito_cofre'] != "" ? $obj['debito_cofre'] : 0;
$credito_cofre = $obj['credito_cofre'] != "" ? $obj['credito_cofre'] : 0;
$saldoFinal_cofre = $saldoInicial_cofre + $credito_cofre - $debito_cofre;

{saldo_inicial2} = "R$ ".number_format($saldoInicial_cofre,2,",",".");
{debito2} = "R$ ".number_format($debito_cofre,2,",",".");
{credito2} = "R$ ".number_format($credito_cofre,2,",",".");
{saldo_final2} = "R$ ".number_format($saldoFinal_cofre,2,",",".");

/*
 * Esta macro permite, dinamicamente, exibir ou não um determinado campo.
 */
sc_field_display({conteudo}, off);
sc_field_display({saldo_inicial}, off);
sc_field_display({debito}, off);
sc_field_display({credito}, off);
sc_field_display({saldo_final}, off);

sc_field_display({saldo_inicial2}, off);
sc_field_display({debito2}, off);
sc_field_display({credito2}, off);
sc_field_display({saldo_final2}, off);
















$obj = extrato_geral($condicao,$minaDaConta);


$saldoInicial = saldoInicial($condicao) != "" ? saldoInicial($condicao) : 0;
$debito = $obj['debito'] != "" ? $obj['debito'] : 0;
$credito = $obj['credito'] != "" ? $obj['credito'] : 0;
$saldo = $obj['saldo'];
$saldoFinal = $saldoInicial + $credito - $debito;

$saldoInicial_cofre = saldoInicial_cofre($condicao, 1);
$debito_cofre = $obj['debito_cofre'];
$credito_cofre = $obj['credito_cofre'];
$saldoFinal_cofre = $saldoInicial_cofre + $credito_cofre - $debito_cofre;

{saldo_inicial2} = $saldoInicial_cofre;
{debito2} = $debito_cofre;
{credito2} = $credito_cofre;
{saldo_final2} = $saldoFinal_cofre;

/* ==================================REFAZER CODIGO==================================== */

$minaDaConta = mina({idConta});

$condicao = {sc_where_current};

$obj = extrato_geral($condicao,$minaDaConta);



$saldoInicial = saldoInicial($condicao) != "" ? saldoInicial($condicao) : 0;
$debito = $obj['debito'] != "" ? $obj['debito'] : 0;
$credito = $obj['credito'] != "" ? $obj['credito'] : 0;
$saldo = $obj['saldo'];
$saldoFinal = $saldoInicial + $credito - $debito;


{saldo_inicial} = "R$ ".number_format($saldoInicial,2,",",".");
{debito} = "R$ ".number_format($debito,2,",",".");
{credito} = "R$ ".number_format($credito,2,",",".");
{saldo_final} = "R$ ".number_format($saldoFinal,2,",",".");

/* SALDO DO COFRE */

$saldoInicial_cofre = saldoInicial_cofre($condicao, $minaDaConta) != "" ? saldoInicial_cofre($condicao, $minaDaConta): 0;
$debito_cofre = $obj['debito_cofre'] != "" ? $obj['debito_cofre'] : 0;
$credito_cofre = $obj['credito_cofre'] != "" ? $obj['credito_cofre'] : 0;
$saldoFinal_cofre = $saldoInicial_cofre + $credito_cofre - $debito_cofre;

{saldo_inicial2} = "R$ ".number_format($saldoInicial_cofre,2,",",".");
{debito2} = "R$ ".number_format($debito_cofre,2,",",".");
{credito2} = "R$ ".number_format($credito_cofre,2,",",".");
{saldo_final2} = "R$ ".number_format($saldoFinal_cofre,2,",",".");


?>