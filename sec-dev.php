<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>

	<div id="grid-saldoInicial"></div>
	<div id="grid_debito"></div>
	<div id="grid_credito"></div>
	<div id="grid_saldo"></div>
	<script>
	//dataContabil between '2022-12-15' and '2022-12-19', Mina Goiana, conta corrente mina 1 - lucas, igual, igual

	let saldoInicial = document.getElementById('grid-saldoInicial');
	let debito = document.getElementById('grid_debito');
	let credito = document.getElementById('grid_credito');
	let saldo = document.getElementById('grid_saldo');
	
	let Data = "dataContabil between '2022-12-17' and '2022-12-20'";
	let nomeMina = "Mina Goiana";
	let nomeConta = "conta corrente mina 1 - lucas";
	let sinalConta = "igual";
	let sinalMina = "igual";

	function CriaRequest() {
            try{
                request = new XMLHttpRequest();
            }catch (IEAtual){

                try{
                    request = new ActiveXObject("Msxml2.XMLHTTP");
                }catch(IEAntigo){

                    try{
                        request = new ActiveXObject("Microsoft.XMLHTTP");
                    }catch(falha){
                        request = false;
                    }
                }
            }

            if (!request) {
                alert("Seu Navegador não suporta Ajax!");
            }else {
                return request;
            }
            
        }

	let xmlreq = CriaRequest();

	// Iniciar uma requisição
	xmlreq.open("GET", "http://localhost/php/consulta2.php?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=D", true);

	// Atribui uma função para ser executada sempre que houver uma mudança de ado
	xmlreq.onreadystatechange = function(){

		// Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
		if (xmlreq.readyState == 4) {

			// Verifica se o arquivo foi encontrado com sucesso
			if (xmlreq.status == 200) {
				res = xmlreq.responseText;
              
				console.log(res);
				let valor = [];

				for (let match of res.matchAll(/\(([^)]+)\)/g)) {
					valor.push(match[1]) 
				}

				debito.textContent = valor[0];
				credito.textContent = valor[1];
				saldo.textContent = valor[2];
				saldoInicial.textContent = valor[3];
                
			}else{
				res = xmlreq.statusText;
				console.log(res);
			}
		}
	};

	xmlreq.send(null);
</script>
</body>
</html>



