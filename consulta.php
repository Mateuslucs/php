<?php
/* DADOS DO COFRE */

/*function gerarTabela($id_mina, $cond) {
	$servidor = "134.209.114.247";
	$usuario = "sc-dev";
	$senha = "SC-db@065";
	$dbname = "basantana";
	$port = "33354";

	$conexao = mysqli_connect($servidor,$usuario,$senha,$dbname,$port);
	if(!$conexao){
		die("Houve um problema: ".mysqli_connect_error());
	}

	$sql = "SELECT idContaCofre from mina where idMina = $id_mina";

	$resDB = mysqli_query($conexao,$sql);

	//idConta = '$id_contaCofre'
	
	$id_contaCofre = "";
	while($x = mysqli_fetch_array($resDB)){
		$id_contaCofre .= $x['idContaCofre'];
	}
	
	$filtro = str_replace("idMina = 1 and idConta = 9","idConta = '$id_contaCofre'",$cond);

	$sql2 = "SELECT c.nomeConta, date_format(dataContabil, '%d/%m/%Y') as dataContabil, observacao, valor, (case when tipoMovimentacao = 'T' then 'Transferência' when tipoMovimentacao = 'V' then 'VendaVenda(Padrão)' when tipoMovimentacao = 'D' then 'Despesa' end) as tipoMovimentacao, (case when formaPagamento = 'E' then 'Dinheiro' when formaPagamento = 'P' then 'Pix' when formaPagamento = 'V' then 'Vale' end) as formaPagamento, debitoCredito from movimentacao join contaCorrente as c on idConta = idContaCorrente $filtro";

	$resDB2 = mysqli_query($conexao, $sql2);

	$result = "";
	while($x = mysqli_fetch_array($resDB2)){

		$color = "";
		if($x['debitoCredito'] == "D"){
			$color .= "#ff0000";
		}else {
			$color .= "#1512ef";
		}

		$result .= '<tr class="scGridFieldOdd" style="page-break-inside: avoid;" onmouseover="over_tr(this, '."'scGridFieldOdd'".');" onmouseout="out_tr(this, '."scGridFieldOdd".');" onclick="click_tr(this, '."scGridFieldOdd".');" id="SC_ancor1"><td rowspan="1" class="scGridBlockBg" style="width: 0px; display:none;" nowrap="" align="" valign="" height="0px">&nbsp;</td><td rowspan="1" class="scGridFieldOddFont" nowrap="" align="center" valign="top" width="1px" height="0px"><table style="padding: 0px; border-spacing: 0px; border-width: 0px;"><tbody><tr><td style="padding: 0px"><a id="bedit" onclick="nm_gp_submit4('.'/scriptcase/app/BA_SANTANA3/form_movimentacao_1/'.', '.'/scriptcase/app/BA_SANTANA3/grid_movimentacao/'.',  '.'@SC_par@761@SC_par@grid_movimentacao@SC_par@02597d5e46c908cdee7c3834975a7590'.' , '.'_self'.', '.'form_movimentacao_1'.', '.'1'.'); return false;" class="scButton_fontawesome " title="Editar o Registro" style="vertical-align: middle; display:inline-block;"><i class="icon_fa fas fa-edit" aria-hidden="true"></i></a></td></tr></tbody></table></td><td rowspan="1" class="scGridFieldOddFont css_idcontaX_grid_line" style="" nowrap="" align="" valign="top" height="0px"><span id="id_sc_field_idconta_1">'.$x['nomeConta'].'</span></td><td rowspan="1" class="scGridFieldOddFont css_datacontabil_grid_line" style="" nowrap="" align="" valign="top" height="0px"><span id="id_sc_field_datacontabil_1">'.$x['dataContabil'].'</span></td><td rowspan="1" class="scGridFieldOddFont css_observacao_grid_line" style="" align="" valign="top" height="0px"><span id="id_sc_field_observacao_1">'.$x['observacao'].'</span></td><td rowspan="1" class="scGridFieldOddFont css_valor_grid_line" style="" nowrap="" align="" valign="top" height="0px"><span style="color: '.$color.';" id="id_sc_field_valor_1">'.$x['valor'].'</span></td><td rowspan="1" class="scGridFieldOddFont css_tipomovimentacao_grid_line" style="" align="" valign="top" height="0px"><span id="id_sc_field_tipomovimentacao_1">'.$x['tipoMovimentacao'].'</span></td><td rowspan="1" class="scGridFieldOddFont css_formapagamento_grid_line" style="" align="" valign="top" height="0px"><span id="id_sc_field_formapagamento_1">'.$x['formaPagamento'].'</span></td></tr>';
	}

	return $result;
}

//<td rowspan="1" class="scGridFieldOddFont" nowrap="" align="center" valign="top" width="1px" height="0px"><table style="padding: 0px; border-spacing: 0px; border-width: 0px;"><tbody><tr><td style="padding: 0px"><a id="bedit" onclick="nm_gp_submit4('.'/scriptcase/app/BA_SANTANA3/form_movimentacao_1/'.', '.'/scriptcase/app/BA_SANTANA3/grid_movimentacao/'.',  '.'@SC_par@761@SC_par@grid_movimentacao@SC_par@02597d5e46c908cdee7c3834975a7590'.' , '.'_self'.', '.'form_movimentacao_1'.', '.'1'.'); return false;" class="scButton_fontawesome " title="Editar o Registro" style="vertical-align: middle; display:inline-block;"><i class="icon_fa fas fa-edit" aria-hidden="true"></i></a></td>

*/

$vc = "nviodsoi";
substr($vc,1,-1)
'<tr class="scGridFieldOdd" style="page-break-inside: avoid;" onmouseover="over_tr(this, '."'scGridFieldOdd'".');" onmouseout="out_tr(this, '."scGridFieldOdd".');" onclick="click_tr(this, '."scGridFieldOdd".');" id="SC_ancor1"><td rowspan="1" class="scGridBlockBg" style="width: 0px; display:none;" nowrap="" align="" valign="" height="0px">&nbsp;</td><td rowspan="1" class="scGridFieldOddFont" nowrap="" align="center" valign="top" width="1px" height="0px"><table style="padding: 0px; border-spacing: 0px; border-width: 0px;"><tbody><tr><td style="padding: 0px"><a id="bedit" onclick="nm_gp_submit4('.'/scriptcase/app/BA_SANTANA3/form_movimentacao_1/'.', '.'/scriptcase/app/BA_SANTANA3/grid_movimentacao/'.',  '.'@SC_par@761@SC_par@grid_movimentacao@SC_par@02597d5e46c908cdee7c3834975a7590'.' , '.'_self'.', '.'form_movimentacao_1'.', '.'1'.'); return false;" class="scButton_fontawesome " title="Editar o Registro" style="vertical-align: middle; display:inline-block;"><i class="icon_fa fas fa-edit" aria-hidden="true"></i></a></td></tr></tbody></table></td><td rowspan="1" class="scGridFieldOddFont css_idcontaX_grid_line" style="" nowrap="" align="" valign="top" height="0px"><span id="id_sc_field_idconta_1">'.$x['nomeConta'].'</span></td><td rowspan="1" class="scGridFieldOddFont css_datacontabil_grid_line" style="" nowrap="" align="" valign="top" height="0px"><span id="id_sc_field_datacontabil_1">'.$x['dataContabil'].'</span></td><td rowspan="1" class="scGridFieldOddFont css_observacao_grid_line" style="" align="" valign="top" height="0px"><span id="id_sc_field_observacao_1">'.$x['observacao'].'</span></td><td rowspan="1" class="scGridFieldOddFont css_valor_grid_line" style="" nowrap="" align="" valign="top" height="0px"><span style="color: #1512ef;" id="id_sc_field_valor_1">'.$x['valor'].'</span></td><td rowspan="1" class="scGridFieldOddFont css_tipomovimentacao_grid_line" style="" align="" valign="top" height="0px"><span id="id_sc_field_tipomovimentacao_1">'.$x['tipoMovimentacao'].'</span></td><td rowspan="1" class="scGridFieldOddFont css_formapagamento_grid_line" style="" align="" valign="top" height="0px"><span id="id_sc_field_formapagamento_1">'.$x['formaPagamento'].'</span></td></tr>';


'<td rowspan="1" class="scGridFieldOddFont css_idcontaX_grid_line" style="" nowrap="" align="" valign="top" height="0px"><span id="id_sc_field_idconta_1">'.$x['nomeConta'].'</span>';


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

	$sql = "SELECT idContaCofre from mina where idMina = $id_mina";

	$resDB = mysqli_query($conexao,$sql);

	//idConta = '$id_contaCofre'
	
	$id_contaCofre = "";
	while($x = mysqli_fetch_array($resDB)){
		$id_contaCofre .= $x['idContaCofre'];
	}
	
	$filtro = str_replace("idMina = 1 and idConta = 9","idConta = '$id_contaCofre'",$cond);

	$sql2 = "SELECT c.nomeConta, date_format(dataContabil, '%d/%m/%Y') as dataContabil, observacao, valor, (case when tipoMovimentacao = 'T' then 'Transferência' when tipoMovimentacao = 'V' then 'VendaVenda(Padrão)' when tipoMovimentacao = 'D' then 'Despesa' end) as tipoMovimentacao, (case when formaPagamento = 'E' then 'Dinheiro' when formaPagamento = 'P' then 'Pix' when formaPagamento = 'V' then 'Vale' end) as formaPagamento, debitoCredito from movimentacao join contaCorrente as c on idConta = idContaCorrente $filtro";

	$resDB2 = mysqli_query($conexao, $sql2);

	$result = "";
	while($x = mysqli_fetch_array($resDB2)){

		$color = "";
		if($x['debitoCredito'] == "D"){
			$color .= "#ff0000";
		}else {
			$color .= "#1512ef";
		}

		$result .= '<tr class="scGridFieldOdd" style="page-break-inside: avoid;" onmouseover="over_tr(this, '."'scGridFieldOdd'".');" onmouseout="out_tr(this, '."scGridFieldOdd".');" onclick="click_tr(this, '."scGridFieldOdd".');" id="SC_ancor1"><td rowspan="1" class="scGridBlockBg" style="width: 0px; display:none;" nowrap="" align="" valign="" height="0px">&nbsp;</td><td rowspan="1" class="scGridFieldOddFont" nowrap="" align="center" valign="top" width="1px" height="0px"><table style="padding: 0px; border-spacing: 0px; border-width: 0px;"><tbody><tr><td style="padding: 0px"><a id="bedit" onclick="nm_gp_submit4('.'/scriptcase/app/BA_SANTANA3/form_movimentacao_1/'.', '.'/scriptcase/app/BA_SANTANA3/grid_movimentacao/'.',  '.'@SC_par@761@SC_par@grid_movimentacao@SC_par@02597d5e46c908cdee7c3834975a7590'.' , '.'_self'.', '.'form_movimentacao_1'.', '.'1'.'); return false;" class="scButton_fontawesome " title="Editar o Registro" style="vertical-align: middle; display:inline-block;"><i class="icon_fa fas fa-edit" aria-hidden="true"></i></a></td></tr></tbody></table></td><td rowspan="1" class="scGridFieldOddFont css_idcontaX_grid_line" style="" nowrap="" align="" valign="top" height="0px"><span id="id_sc_field_idconta_1">'.$x['nomeConta'].'</span></td><td rowspan="1" class="scGridFieldOddFont css_datacontabil_grid_line" style="" nowrap="" align="" valign="top" height="0px"><span id="id_sc_field_datacontabil_1">'.$x['dataContabil'].'</span></td><td rowspan="1" class="scGridFieldOddFont css_observacao_grid_line" style="" align="" valign="top" height="0px"><span id="id_sc_field_observacao_1">'.$x['observacao'].'</span></td><td rowspan="1" class="scGridFieldOddFont css_valor_grid_line" style="" nowrap="" align="" valign="top" height="0px"><span style="color: '.$color.';" id="id_sc_field_valor_1">'.$x['valor'].'</span></td><td rowspan="1" class="scGridFieldOddFont css_tipomovimentacao_grid_line" style="" align="" valign="top" height="0px"><span id="id_sc_field_tipomovimentacao_1">'.$x['tipoMovimentacao'].'</span></td><td rowspan="1" class="scGridFieldOddFont css_formapagamento_grid_line" style="" align="" valign="top" height="0px"><span id="id_sc_field_formapagamento_1">'.$x['formaPagamento'].'</span></td></tr>';
	}

	return $result;
}
?>