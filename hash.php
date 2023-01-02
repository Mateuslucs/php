<?php 
/*=======================ADD_USERS===================================*/
//ON LOAD
sc_field_display({nomeConta}, off);

//BEFORE INSERT
function idConta($nomeConta){
	
	$servidor = "142.93.112.180";
	$usuario = "webHook";
	$senha = "Cronos@065-V8";
	$dbname = "basantana";

	$conexao = mysqli_connect($servidor,$usuario,$senha,$dbname);
	if(!$conexao){
		die("Houve um problema: ".mysqli_connect_error());
	}
	
	$sql = "SELECT idContaCorrente FROM contaCorrente WHERE nomeConta = '$nomeConta'";
	$resDB = mysqli_query($conexao,$sql);
	
	$idConta = "";
	while($row = mysqli_fetch_array($resDB)){
        $idConta = $row['idContaCorrente'];
    }
	
	return $idConta;
	
	mysqli_close($conexao);
	
}

function addConta($nomeConta){
	$servidor = "142.93.112.180";
	$usuario = "webHook";
	$senha = "Cronos@065-V8";
	$dbname = "basantana";

	$conexao = mysqli_connect($servidor,$usuario,$senha,$dbname);
	if(!$conexao){
		die("Houve um problema: ".mysqli_connect_error());
	}

	$sql = "INSERT INTO contaCorrente (nomeConta,idContaOmie) VALUES ('$nomeConta','3333333')";
	
	mysqli_query($conexao,$sql);
	mysqli_close($conexao);
}

$nomeConta = {nomeConta};

$conta = {idConta};

if($conta == 0){
	
	addConta($nomeConta);
	
	$idConta = idConta($nomeConta);
	
	{idConta} = $idConta;
	
}

//EVENTO AJAX IDCONTA

$conta = {idConta};

if($conta == 4){
	
	sc_field_display({nomeConta}, on);
	
}else {
	
	sc_field_display({nomeConta}, off);
	
}

/*===============EDIT USERS==============================*/

//ON LOAD
sc_field_display({nomeConta}, off);

//BEFORE INSERT
if({pswd} != {confirm_pswd})
{
	sc_error_message({lang_error_pswd});
	sc_error_exit();
}
{pswd} = hash("md5",{pswd});

function idConta($nomeConta){
	
	$servidor = "142.93.112.180";
	$usuario = "webHook";
	$senha = "Cronos@065-V8";
	$dbname = "basantana";

	$conexao = mysqli_connect($servidor,$usuario,$senha,$dbname);
	if(!$conexao){
		die("Houve um problema: ".mysqli_connect_error());
	}
	
	$sql = "SELECT idContaCorrente FROM contaCorrente WHERE nomeConta = '$nomeConta'";
	$resDB = mysqli_query($conexao,$sql);
	
	$idConta = "";
	while($row = mysqli_fetch_array($resDB)){
        $idConta = $row['idContaCorrente'];
    }
	
	return $idConta;
	
	mysqli_close($conexao);
	
}

function addConta($nomeConta){
	$servidor = "142.93.112.180";
	$usuario = "webHook";
	$senha = "Cronos@065-V8";
	$dbname = "basantana";

	$conexao = mysqli_connect($servidor,$usuario,$senha,$dbname);
	if(!$conexao){
		die("Houve um problema: ".mysqli_connect_error());
	}

	$sql = "INSERT INTO contaCorrente (nomeConta,idContaOmie) VALUES ('$nomeConta','3333333')";
	
	mysqli_query($conexao,$sql);
	mysqli_close($conexao);
}

$nomeConta = {nomeConta};

$conta = {idConta};

if($conta == -1){
	
	addConta($nomeConta);
	
	$idContaCorrente = idConta($nomeConta);
	
	{idConta} = $idContaCorrente;
	
}

//EVENTO AJAX IDCONTA
$conta = {idConta};

if($conta == -1){
	
	sc_field_display({nomeConta}, on);
	
}else {
	
	sc_field_display({nomeConta}, off);
	
}




function pessoas(){
	
	$servidor = "165.232.148.251";
	$usuario = "sec-dev3";
	$senha = "SC-db@065";
	$dbname = "test";
	$port = "33354";

	$conexao = mysqli_connect($servidor,$usuario,$senha,$dbname,$port);
	if(!$conexao){
		die("Houve um problema: ".mysqli_connect_error());
	}
	
	$sql = "SELECT * FROM pessoas";
	$resDB = mysqli_query($conexao,$sql);
	
	$idConta = "";
	while($row = mysqli_fetch_array($resDB)){
        $idConta = $row['idContaCorrente'];
    }
	
	return $idConta;
	
	mysqli_close($conexao);
	
}

echo pessoas();

if(empty())

?>