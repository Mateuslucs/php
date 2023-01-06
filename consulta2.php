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



/*$datadb_js = sinal($_GET['data']);
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


echo "$datadb_js, $nomeMina_js, $nomeConta_js, $formaPagamentoDB, $sinalMina, $sinalConta. dados : debito(R$ ".number_format($debito,2,",",".")."), credito(R$ ".number_format($credito,2,",",".")."), saldo final(R$ ".number_format($saldoFinal,2,",",".")."), saldo inicial(R$ ".number_format($saldoInicial,2,",",".").")";*/

/*$saldoInicial = saldoInicial($datadb_js,$nomeConta_js,$nomeMina_js) != "" ? saldoInicial($datadb_js,$nomeConta_js,$nomeMina_js) : 0;
$debito = $obj['debito'] != "" ? $obj['debito'] : 0;
$credito = $obj['credito'] != "" ? $obj['credito'] : 0;
$saldoFinal = $saldoInicial + $credito - $debito*/

/* estrato */ 




/*saldoInicial({sc_where_current}) != "" ? saldoInicial({sc_where_current}) : 0*/



/*$saldoInicial_cofre = saldoInicial_cofre({sc_where_current}, $minaDaConta) != "" ? saldoInicial_cofre({sc_where_current}, $minaDaConta) : 0;
$debito_cofre = $obj2['debito'] != "" ? $obj2['debito'] : 0;
$credito_cofre = $obj2['credito'] != "" ? $obj2['credito'] : 0;
$saldoFinal_cofre = $saldoInicial_cofre + $credito_cofre - $debito_cofre;

{saldo_inicial2} = "R$ ".number_format($saldoInicial_cofre,2,",",".");
{debito2} = "R$ ".number_format($debito_cofre,2,",",".");
{credito2} = "R$ ".number_format($credito_cofre,2,",",".");
{saldo_final2} = "R$ ".number_format($saldoFinal_cofre,2,",",".");*/


function mina($id_conta){
	$servidor = "134.209.114.247";
	$usuario = "sc-dev";
	$senha = "SC-db@065";
	$dbname = "basantana";
	$port = "33354";

	$conexao = mysqli_connect($servidor,$usuario,$senha,$dbname,$port);
	if(!$conexao){
		die("Houve um problema: ".mysqli_connect_error());
	}

	$sql = "SELECT idMina from sec_users where login = '[usuario]'";

	$resDB = mysqli_query($conexao,$sql);

	$mina = "";
	while($x = mysqli_fetch_array($resDB)){
		$mina .= $x['idMina'];
	}

	return $mina;
}

function gerarTabela($id_mina, $cond) {
		$servidor = "134.209.114.247";
		$usuario = "sc-dev";
		$senha = "SC-db@065";
		$dbname = "basantana";
		$port = "33354";

		$conexao = mysqli_connect($servidor,$usuario,$senha,$dbname,$port);
		if(!$conexao){
			die("Houve um problema: ".mysqli_connect_error());
		}
		$posi = strripos($cond, 'dataContabil');
		$cond_data = substr($cond,$posi, -1);

		$sql = "SELECT idContaCofre from mina where idMina = $id_mina";

		$resDB = mysqli_query($conexao,$sql);

		//idConta = '$id_contaCofre'
		
		$id_contaCofre = "";
		while($x = mysqli_fetch_array($resDB)){
			$id_contaCofre .= $x['idContaCofre'];
		}
		
		$filtro = str_replace("idMina = 1 and idConta = 9","idConta = '$id_contaCofre'",$cond);

		$sql2 = "SELECT c.nomeConta, date_format(dataContabil, '%d/%m/%Y') as dataContabil, observacao, valor, (case when tipoMovimentacao = 'T' then 'Transferência' when tipoMovimentacao = 'V' then 'VendaVenda(Padrão)' when tipoMovimentacao = 'D' then 'Despesa' end) as tipoMovimentacao, (case when formaPagamento = 'E' then 'Dinheiro' when formaPagamento = 'P' then 'Pix' when formaPagamento = 'V' then 'Vale' end) as formaPagamento from movimentacao join contaCorrente as c on idConta = idContaCorrente $filtro";

		$resDB2 = mysqli_query($conexao, $sql2);

		$result = "";
		while($x = mysqli_fetch_array($resDB2)){

			$result .= '<tr class="scGridFieldOdd" style="page-break-inside: avoid;" onmouseover="over_tr(this, '."'scGridFieldOdd'".');" onmouseout="out_tr(this, '."scGridFieldOdd".');" onclick="click_tr(this, '."scGridFieldOdd".');" id="SC_ancor1"><td rowspan="1" class="scGridBlockBg" style="width: 0px; display:none;" nowrap="" align="" valign="" height="0px">&nbsp;</td><td rowspan="1" class="scGridFieldOddFont" nowrap="" align="center" valign="top" width="1px" height="0px"><table style="padding: 0px; border-spacing: 0px; border-width: 0px;"><tbody><tr><td style="padding: 0px"><a id="bedit" onclick="nm_gp_submit4('.'/scriptcase/app/BA_SANTANA3/form_movimentacao_1/'.', '.'/scriptcase/app/BA_SANTANA3/grid_movimentacao/'.',  '.'@SC_par@761@SC_par@grid_movimentacao@SC_par@02597d5e46c908cdee7c3834975a7590'.' , '.'_self'.', '.'form_movimentacao_1'.', '.'1'.'); return false;" class="scButton_fontawesome " title="Editar o Registro" style="vertical-align: middle; display:inline-block;"><i class="icon_fa fas fa-edit" aria-hidden="true"></i></a></td></tr></tbody></table></td><td rowspan="1" class="scGridFieldOddFont css_idcontaX_grid_line" style="" nowrap="" align="" valign="top" height="0px"><span id="id_sc_field_idconta_1">'.$x['nomeConta'].'</span></td><td rowspan="1" class="scGridFieldOddFont css_datacontabil_grid_line" style="" nowrap="" align="" valign="top" height="0px"><span id="id_sc_field_datacontabil_1">'.$x['dataContabil'].'</span></td><td rowspan="1" class="scGridFieldOddFont css_observacao_grid_line" style="" align="" valign="top" height="0px"><span id="id_sc_field_observacao_1">'.$x['observacao'].'</span></td><td rowspan="1" class="scGridFieldOddFont css_valor_grid_line" style="" nowrap="" align="" valign="top" height="0px"><span style="color: #1512ef;" id="id_sc_field_valor_1">'.$x['valor'].'</span></td><td rowspan="1" class="scGridFieldOddFont css_tipomovimentacao_grid_line" style="" align="" valign="top" height="0px"><span id="id_sc_field_tipomovimentacao_1">'.$x['tipoMovimentacao'].'</span></td><td rowspan="1" class="scGridFieldOddFont css_formapagamento_grid_line" style="" align="" valign="top" height="0px"><span id="id_sc_field_formapagamento_1">'.$x['formaPagamento'].'</span></td></tr>';
		}

		return $result;
	}

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

    $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao $condicao and formaPagamento = 'E'";

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

function extrato2($cond, $id_mina) {
    $servidor = "134.209.114.247";
	$usuario = "sc-dev";
	$senha = "SC-db@065";
	$dbname = "basantana";
	$port = "33354";

	$conexao = mysqli_connect($servidor,$usuario,$senha,$dbname,$port);
	if(!$conexao){
		die("Houve um problema: ".mysqli_connect_error());
	}
    $posi = strripos($cond, 'dataContabil');
    $cond_data = substr($cond,$posi, -1);

    $sql = "SELECT idContaCofre from mina where idMina = $id_mina";

    $resDB = mysqli_query($conexao,$sql);

    //idConta = '$id_contaCofre'
    
    $id_contaCofre = "";
    while($x = mysqli_fetch_array($resDB)){
        $id_contaCofre .= $x['idContaCofre'];
    }
    
    $filtro = str_replace("idMina = 1 and idConta = 9","idConta = '$id_contaCofre'",$cond);

    $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao $filtro";

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
    $lista_cond = [];
    preg_match('/^([^-]+)[^\(]+(\([^\)]+\))/', $condicao, $match);
    array_push($lista_cond,$match[2]);

    $cond = str_replace("(","",str_replace(")","",$lista_cond[0]));

    $sql = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where $cond and formaPagamento = 'E'";

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

    $sql3 = "SELECT sum(if(debitoCredito='D',valor,0)) as debito, sum(if(debitoCredito='C',valor,0)) as credito, sum(if(debitoCredito='C',valor,0)) - sum(if(debitoCredito='D',valor,0)) as saldo from movimentacao where $filtro";

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



$obj = extrato_geral("where (idMina = 1 and idConta = 9 and dataContabil <= '2023-01-05' ) where (idMina = 1 and idConta = 9 and dataContabil <= '2023-01-05' ) where (idMina = 1 and idConta = 9 and dataContabil <= '2023-01-03' ) where (idMina = 1 and idConta = 9 and dataContabil <= '2023-01-03' ) where (idMina = 1 and idConta = 9 and dataContabil <= '2023-01-03' ) where (idMina = 1 and idConta = 9 and dataContabil <= '2023-01-03' ) where (idMina = 1 and idConta = 9 and dataContabil <= '2023-01-03' ) where (idMina = 1 and idConta = 9 and dataContabil <= '2023-01-05' )",1);


$saldoInicial = saldoInicial("where (idMina = 1 and idConta = 9 and dataContabil <= '2023-01-05' ) where (idMina = 1 and idConta = 9 and dataContabil <= '2023-01-05' ) where (idMina = 1 and idConta = 9 and dataContabil <= '2023-01-03' ) where (idMina = 1 and idConta = 9 and dataContabil <= '2023-01-03' ) where (idMina = 1 and idConta = 9 and dataContabil <= '2023-01-03' ) where (idMina = 1 and idConta = 9 and dataContabil <= '2023-01-03' ) where (idMina = 1 and idConta = 9 and dataContabil <= '2023-01-03' ) where (idMina = 1 and idConta = 9 and dataContabil <= '2023-01-05' )") != "" ? saldoInicial("where (idMina = 1 and idConta = 9 and dataContabil <= '2023-01-05' ) where (idMina = 1 and idConta = 9 and dataContabil <= '2023-01-05' ) where (idMina = 1 and idConta = 9 and dataContabil <= '2023-01-03' ) where (idMina = 1 and idConta = 9 and dataContabil <= '2023-01-03' ) where (idMina = 1 and idConta = 9 and dataContabil <= '2023-01-03' ) where (idMina = 1 and idConta = 9 and dataContabil <= '2023-01-03' ) where (idMina = 1 and idConta = 9 and dataContabil <= '2023-01-03' ) where (idMina = 1 and idConta = 9 and dataContabil <= '2023-01-05' )") : 0;
$debito = $obj['debito'] != "" ? $obj['debito'] : 0;
$credito = $obj['credito'] != "" ? $obj['credito'] : 0;
$saldo = $obj['saldo'];
$saldoFinal = $saldoInicial + $credito - $debito;

$saldoInicial_cofre = saldoInicial_cofre("where (idMina = 1 and idConta = 9 and dataContabil <= '2023-01-05' ) where (idMina = 1 and idConta = 9 and dataContabil <= '2023-01-05' ) where (idMina = 1 and idConta = 9 and dataContabil <= '2023-01-03' ) where (idMina = 1 and idConta = 9 and dataContabil <= '2023-01-03' ) where (idMina = 1 and idConta = 9 and dataContabil <= '2023-01-03' ) where (idMina = 1 and idConta = 9 and dataContabil <= '2023-01-03' ) where (idMina = 1 and idConta = 9 and dataContabil <= '2023-01-03' ) where (idMina = 1 and idConta = 9 and dataContabil <= '2023-01-05' )", 1);
$debito_cofre = $obj['debito_cofre'];
$credito_cofre = $obj['credito_cofre'];
$saldoFinal_cofre = $saldoInicial_cofre + $credito_cofre - $debito_cofre;

echo "($saldoInicial)\n \n($debito),\n \n($credito)\n\n ($saldo)\n\n, ($saldoFinal).\n\n dados do cofre: $saldoInicial_cofre, $debito_cofre, $credito_cofre,  $saldoFinal_cofre";







?>