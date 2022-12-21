<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BA SANTANA</title>
    <!-- Estilos -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/540e6af289.js" crossorigin="anonymous"></script>
    <style>
        .scMenuTHeaderFont img, .scGridHeaderFont img , .scFormHeaderFont img , .scTabHeaderFont img , .scContainerHeaderFont img , .scFilterHeaderFont img { height:23px;}
    </style>
    <style>
      .segundario {
        font-size: 1rem;
        margin: 20px 0 20px 20px;
      }
      h1 {
        float: right;
        position: absolute;
        right: 20px;
        top: 20px;
        font-weight: bold;
        font-size: 1rem;
      }
      h1 {
        float: right;
        position: absolute;
        right: 20px;
        top: 77px;
        font-weight: bold;
        font-size: 1rem;
      }
      /*conserto do estilo*/
      .scButton_ok > i, .scButton_ok > span, .scButton_danger > i, .scButton_danger > span  {
        color: white;
      }
      .scButton_default > i, .scButton_default > span {
          color: #247159;
      }
      .scButton_default:hover > i,.scButton_default:hover > span {
          color: white;
          background-color: #247159;
      }
      input[type=radio] {
          margin-left: 15px;
      }
      #id-opt-tipomovimentacao-1, #id-opt-tipoveiculo-0, #id-opt-idtipominerio-0 {
          margin-left: 0px;
      }
    </style>
</head>
<body>
    <section>
        <div class="row">
            <div class="col-sm-4">
                <div class="card bg-light text-success">
                    <h2 class="segundario">Debido:</h1>
                    <h1 id="grid_debito">{grid_debito}</h1>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card bg-light text-success">
                    <h2 class="segundario">Credito:</h1>
                    <h1 id="grid_credito"></h1>
                </div>
            </div>/**Não Contém
            Igual a 
            menor ou igual a
            menor que
            maior que
            intervalo
             */
            <div class="col-sm-4">
                <div class="card bg-light text-success">
                    <h2 class="segundario">Saldo:</h1>
                    <h1 id="grid_saldo">{grid_saldo}</h1>
                    <h2 id="grid_search_label_idmina">Mina: Igual a Mina Goiana</h2>
                    <h2 id="grid_search_label_idconta">Conta: Igual a Caixa Diario Mina 1 - lucas</h2>
                    <h2 id="grid_search_label_datacontabil">intervalo 15/12/2022 a 19/12/2022</h2>
                    <h2 id="grid_search_label_formapagamento">gnsdgskgwrkg Dinheiro</h2>
                </div>
            </div>
        </div>
        <div id="Resultado"></div>
    </section>

    <script>

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

        function FormataStringData(data) {
            var dia  = data.split("/")[0];
            var mes  = data.split("/")[1];
            var ano  = data.split("/")[2];

            return ano + '-' + ("0"+mes).slice(-2) + '-' + ("0"+dia).slice(-2);
            // Utilizo o .slice(-2) para garantir o formato com 2 digitos.
        }


        let debito = document.getElementById('grid_debito');
        let credito = document.getElementById('grid_credito');
        let saldo = document.getElementById('grid_saldo');

        let formaPagamento = document.getElementById('grid_search_label_formapagamento');
        let dataContabil = document.getElementById('grid_search_label_datacontabil');
        let mina = document.getElementById('grid_search_label_idmina');
        let conta = document.getElementById('grid_search_label_idconta');

        let reg = /\b(\d+\/\d+\/\d+)\b/g;
        let str = dataContabil.innerText;

        var Data = "";

        if(dataContabil.innerText.includes("menor") && dataContabil.innerText.includes("igual")){
            
            let valor = FormataStringData(str.match(reg)[0]);
            Data += `dataContabil <= '${valor}'`;

        }else if(dataContabil.innerText.includes("igual")){

            let valor = FormataStringData(str.match(reg)[0]);
            Data += `dataContabil = '${valor}'`;

        }else if(dataContabil.innerText.includes("intervalo")){

            let valor1 = FormataStringData(str.match(reg)[0]);
            let valor2 = FormataStringData(str.match(reg)[1]);
            Data += `dataContabil between '${valor1}' and '${valor2}'`;

        }else if(dataContabil.innerText.includes("maior")){

            let valor = FormataStringData(str.match(reg)[0]);
            Data += `dataContabil > '${valor}'`;

        }else if(dataContabil.innerText.includes("menor")){

            let valor = FormataStringData(str.match(reg)[0]);
            Data += `dataContabil < '${valor}'`;

        }


        if(formaPagamento.innerText.includes("Dinheiro")){
            if(mina !== null){
                console.log("entrou na mina diferente de null");
                if(mina.innerText.includes("Contém")){
                    let posMina = mina.innerText.indexOf("Contém") + 7;
                    let nomeMina = mina.innerText.slice(posMina);

                    let sinalMina = "diferente";

                    if(conta !== null){
                        if(conta.innerText.includes("Contém")){
                            let posConta = conta.innerText.indexOf("Contém") + 7;
                            let nomeConta = conta.innerText.slice(posConta);

                            let sinalConta = "diferente";
                            

                            let xmlreq = CriaRequest();

                            // Iniciar uma requisição
                            xmlreq.open("GET", "http://localhost/php/consulta.php?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=D", true);

                            // Atribui uma função para ser executada sempre que houver uma mudança de ado
                            xmlreq.onreadystatechange = function(){

                                // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
                                if (xmlreq.readyState == 4) {

                                    // Verifica se o arquivo foi encontrado com sucesso
                                    if (xmlreq.status == 200) {
                                        console.log(`${Data}, ${nomeMina}, ${nomeConta}, ${sinalConta}, ${sinalMina}`);
                                        console.log(xmlreq.responseText);
                                        res = JSON.parse(xmlreq.responseText);
                                        debito.textContent = res.debito;
                                        credito.textContent = res.credito;
                                        saldo.textContent = res.saldo;
                                    }else{
                                        res = xmlreq.statusText;
                                        console.log(res);
                                    }
                                }
                            };

                            xmlreq.send(null);



                        }else if(conta.innerText.includes("Igual")){
                            let posConta = conta.innerText.indexOf("Igual") + 8;
                            let nomeConta = conta.innerText.slice(posConta);

                            let sinalConta = "igual";
                            

                            let xmlreq = CriaRequest();

                            // Iniciar uma requisição
                            xmlreq.open("GET", "http://localhost/php/consulta.php?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=D", true);

                            // Atribui uma função para ser executada sempre que houver uma mudança de ado
                            xmlreq.onreadystatechange = function(){

                                // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
                                if (xmlreq.readyState == 4) {

                                    // Verifica se o arquivo foi encontrado com sucesso
                                    if (xmlreq.status == 200) {
                                        console.log(`${Data}, ${nomeMina}, ${nomeConta}, ${sinalConta}, ${sinalMina}`);
                                        console.log(xmlreq.responseText);
                                        res = JSON.parse(xmlreq.responseText);
                                        debito.textContent = res.debito;
                                        credito.textContent = res.credito;
                                        saldo.textContent = res.saldo;
                                    }else{
                                        res = xmlreq.statusText;
                                        console.log(res);
                                    }
                                }
                            };

                            xmlreq.send(null);

                        }
                    }else {

                        //let posConta = conta.innerText.indexOf("Igual") + 8;
                        let nomeConta = "";

                        let sinalConta = "";


                        let xmlreq = CriaRequest();

                        // Iniciar uma requisição
                        xmlreq.open("GET", "http://localhost/php/consulta.php?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=D", true);

                        // Atribui uma função para ser executada sempre que houver uma mudança de ado
                        xmlreq.onreadystatechange = function(){

                            // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
                            if (xmlreq.readyState == 4) {

                                // Verifica se o arquivo foi encontrado com sucesso
                                if (xmlreq.status == 200) {
                                    console.log(`${Data}, ${nomeMina}, ${nomeConta}, ${sinalConta}, ${sinalMina}`);
                                    console.log(xmlreq.responseText);
                                    res = JSON.parse(xmlreq.responseText);
                                    debito.textContent = res.debito;
                                    credito.textContent = res.credito;
                                    saldo.textContent = res.saldo;
                                }else{
                                    res = xmlreq.statusText;
                                    console.log(res);
                                }
                            }
                        };

                        xmlreq.send(null);

                    }    

                }else if(mina.innerText.includes("Igual")){
                    console.log("entrou na mina é sinal de igual")
                    let posMina = mina.innerText.indexOf("Igual") + 8;
                    let nomeMina = mina.innerText.slice(posMina);

                    let sinalMina = "igual";

                    if(conta !== null){
                        console.log("entrou na conta dirente de null")
                        if(conta.innerText.includes("Contém")){
                            let posConta = conta.innerText.indexOf("Contém") + 7;
                            let nomeConta = conta.innerText.slice(posConta);

                            let sinalConta = "diferente";
                            

                            let xmlreq = CriaRequest();

                            // Iniciar uma requisição
                            xmlreq.open("GET", "http://localhost/php/consulta.php?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=D", true);

                            // Atribui uma função para ser executada sempre que houver uma mudança de ado
                            xmlreq.onreadystatechange = function(){

                                // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
                                if (xmlreq.readyState == 4) {

                                    // Verifica se o arquivo foi encontrado com sucesso
                                    if (xmlreq.status == 200) {
                                        console.log(`${Data}, ${nomeMina}, ${nomeConta}, ${sinalConta}, ${sinalMina}`);
                                        console.log(xmlreq.responseText);
                                        res = JSON.parse(xmlreq.responseText);
                                        debito.textContent = res.debito;
                                        credito.textContent = res.credito;
                                        saldo.textContent = res.saldo;
                                    }else{
                                        res = xmlreq.statusText;
                                        console.log(res);
                                    }
                                }
                            };

                            xmlreq.send(null);



                        }else if(conta.innerText.includes("Igual")){
                            console.log("entrou onde o sinal da conta é igual")
                            let posConta = conta.innerText.indexOf("Igual") + 8;
                            let nomeConta = conta.innerText.slice(posConta);

                            let sinalConta = "igual";
                            
                        
                            let xmlreq = CriaRequest();

                            // Iniciar uma requisição
                            xmlreq.open("GET", "http://localhost/php/consulta.php?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=D", true);

                            // Atribui uma função para ser executada sempre que houver uma mudança de ado
                            xmlreq.onreadystatechange = function(){
                                // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
                                if (xmlreq.readyState == 4) {

                                    // Verifica se o arquivo foi encontrado com sucesso
                                    if (xmlreq.status == 200) {
                                        console.log(`${Data}, ${nomeMina}, ${nomeConta}, ${sinalConta}, ${sinalMina}`);
                                        console.log(xmlreq.responseText);
                                        res = JSON.parse(xmlreq.responseText);
                                        debito.textContent = res.debito;
                                        credito.textContent = res.credito;
                                        saldo.textContent = res.saldo;
                                    }else{
                                        res = xmlreq.statusText;
                                        console.log(res);
                                    }
                                }
                            };

                            xmlreq.send(null);

                        }
                    }else {

                        //let posConta = conta.innerText.indexOf("Igual") + 8;
                        let nomeConta = "";

                        let sinalConta = "";


                        let xmlreq = CriaRequest();

                        // Iniciar uma requisição
                        xmlreq.open("GET", "http://localhost/php/consulta.php?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=D", true);

                        // Atribui uma função para ser executada sempre que houver uma mudança de ado
                        xmlreq.onreadystatechange = function(){

                            // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
                            if (xmlreq.readyState == 4) {

                                // Verifica se o arquivo foi encontrado com sucesso
                                if (xmlreq.status == 200) {
                                    console.log(`${Data}, ${nomeMina}, ${nomeConta}, ${sinalConta}, ${sinalMina}`);
                                    console.log(xmlreq.responseText);
                                    res = JSON.parse(xmlreq.responseText);
                                    debito.textContent = res.debito;
                                    credito.textContent = res.credito;
                                    saldo.textContent = res.saldo;
                                }else{
                                    res = xmlreq.statusText;
                                    console.log(res);
                                }
                            }
                        };

                        xmlreq.send(null);

                    }

                }
            }else {
                    
                //let posMina = mina.innerText.indexOf("Contém") + 9;
                let nomeMina = "";

                let sinalMina = "";

                if(conta !== null){
                    if(conta.innerText.includes("Contém")){
                        let posConta = conta.innerText.indexOf("Contém") + 7;
                        let nomeConta = conta.innerText.slice(posConta);

                        let sinalConta = "diferente";
                        

                        let xmlreq = CriaRequest();

                        // Iniciar uma requisição
                        xmlreq.open("GET", "http://localhost/php/consulta.php?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=D", true);

                        // Atribui uma função para ser executada sempre que houver uma mudança de ado
                        xmlreq.onreadystatechange = function(){

                            // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
                            if (xmlreq.readyState == 4) {

                                // Verifica se o arquivo foi encontrado com sucesso
                                if (xmlreq.status == 200) {
                                    console.log(`${Data}, ${nomeMina}, ${nomeConta}, ${sinalConta}, ${sinalMina}`);
                                    console.log(xmlreq.responseText);
                                    res = JSON.parse(xmlreq.responseText);
                                    debito.textContent = res.debito;
                                    credito.textContent = res.credito;
                                    saldo.textContent = res.saldo;
                                }else{
                                    res = xmlreq.statusText;
                                    console.log(res);
                                }
                            }
                        };

                        xmlreq.send(null);



                    }else if(conta.innerText.includes("Igual")){
                        let posConta = conta.innerText.indexOf("Igual") + 8;
                        let nomeConta = conta.innerText.slice(posConta);

                        let sinalConta = "igual";
                        

                        let xmlreq = CriaRequest();

                        // Iniciar uma requisição
                        xmlreq.open("GET", "http://localhost/php/consulta.php?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=D", true);

                        // Atribui uma função para ser executada sempre que houver uma mudança de ado
                        xmlreq.onreadystatechange = function(){

                            // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
                            if (xmlreq.readyState == 4) {

                                // Verifica se o arquivo foi encontrado com sucesso
                                if (xmlreq.status == 200) {
                                    console.log(`${Data}, ${nomeMina}, ${nomeConta}, ${sinalConta}, ${sinalMina}`);
                                    console.log(xmlreq.responseText);
                                    res = JSON.parse(xmlreq.responseText);
                                    debito.textContent = res.debito;
                                    credito.textContent = res.credito;
                                    saldo.textContent = res.saldo;
                                }else{
                                    res = xmlreq.statusText;
                                    console.log(res);
                                }
                            }
                        };

                        xmlreq.send(null);

                    }
                }else {

                    //let posConta = conta.innerText.indexOf("Igual") + 8;
                    let nomeConta = "";

                    let sinalConta = "";


                    let xmlreq = CriaRequest();

                    // Iniciar uma requisição
                    xmlreq.open("GET", "http://localhost/php/consulta.php?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=D", true);

                    // Atribui uma função para ser executada sempre que houver uma mudança de ado
                    xmlreq.onreadystatechange = function(){

                        // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
                        if (xmlreq.readyState == 4) {

                            // Verifica se o arquivo foi encontrado com sucesso
                            if (xmlreq.status == 200) {
                                console.log(`${Data}, ${nomeMina}, ${nomeConta}, ${sinalConta}, ${sinalMina}`);
                                console.log(xmlreq.responseText);
                                res = JSON.parse(xmlreq.responseText);
                                debito.textContent = res.debito;
                                credito.textContent = res.credito;
                                saldo.textContent = res.saldo;
                            }else{
                                res = xmlreq.statusText;
                                console.log(res);
                            }
                        }
                    };

                    xmlreq.send(null);

                }

                
            }    

        }else if(formaPagamento.innerText.includes("Pix")){

            if(mina !== null){

                if(mina.innerText.includes("Contém")){
                    let posMina = mina.innerText.indexOf("Contém") + 9;
                    let nomeMina = mina.innerText.slice(posMina);

                    let sinalMina = "diferente";

                    if(conta !== null){
                        if(conta.innerText.includes("Contém")){
                            let posConta = conta.innerText.indexOf("Contém") + 7;
                            let nomeConta = conta.innerText.slice(posConta);

                            let sinalConta = "diferente";
                            
                        

                            let xmlreq = CriaRequest();

                            // Iniciar uma requisição
                            xmlreq.open("GET", "http://localhost/php/consulta.php?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=P", true);

                            // Atribui uma função para ser executada sempre que houver uma mudança de ado
                            xmlreq.onreadystatechange = function(){

                                // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
                                if (xmlreq.readyState == 4) {

                                    // Verifica se o arquivo foi encontrado com sucesso
                                    if (xmlreq.status == 200) {
                                        console.log(`${Data}, ${nomeMina}, ${nomeConta}, ${sinalConta}, ${sinalMina}`);
                                        console.log(xmlreq.responseText);
                                        res = JSON.parse(xmlreq.responseText);
                                        debito.textContent = res.debito;
                                        credito.textContent = res.credito;
                                        saldo.textContent = res.saldo;
                                    }else{
                                        res = xmlreq.statusText;
                                        console.log(res);
                                    }
                                }
                            };

                            xmlreq.send(null);



                        }else if(conta.innerText.includes("Igual")){
                            let posConta = conta.innerText.indexOf("Igual") + 8;
                            let nomeConta = conta.innerText.slice(posConta);

                            let sinalConta = "igual";
                            
                        

                            let xmlreq = CriaRequest();

                            // Iniciar uma requisição
                            xmlreq.open("GET", "http://localhost/php/consulta.php?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=P", true);

                            // Atribui uma função para ser executada sempre que houver uma mudança de ado
                            xmlreq.onreadystatechange = function(){

                                // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
                                if (xmlreq.readyState == 4) {

                                    // Verifica se o arquivo foi encontrado com sucesso
                                    if (xmlreq.status == 200) {
                                        console.log(`${Data}, ${nomeMina}, ${nomeConta}, ${sinalConta}, ${sinalMina}`);
                                        console.log(xmlreq.responseText);
                                        res = JSON.parse(xmlreq.responseText);
                                        debito.textContent = res.debito;
                                        credito.textContent = res.credito;
                                        saldo.textContent = res.saldo;
                                    }else{
                                        res = xmlreq.statusText;
                                        console.log(res);
                                    }
                                }
                            };

                            xmlreq.send(null);

                        }
                    }else {

                        //let posConta = conta.innerText.indexOf("Igual") + 8;
                        let nomeConta = "";

                        let sinalConta = "";



                        let xmlreq = CriaRequest();

                        // Iniciar uma requisição
                        xmlreq.open("GET", "http://localhost/php/consulta.php?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=P", true);

                        // Atribui uma função para ser executada sempre que houver uma mudança de ado
                        xmlreq.onreadystatechange = function(){

                            // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
                            if (xmlreq.readyState == 4) {

                                // Verifica se o arquivo foi encontrado com sucesso
                                if (xmlreq.status == 200) {
                                    console.log(`${Data}, ${nomeMina}, ${nomeConta}, ${sinalConta}, ${sinalMina}`);
                                    console.log(xmlreq.responseText);
                                    res = JSON.parse(xmlreq.responseText);
                                    debito.textContent = res.debito;
                                    credito.textContent = res.credito;
                                    saldo.textContent = res.saldo;
                                }else{
                                    res = xmlreq.statusText;
                                    console.log(res);
                                }
                            }
                        };

                        xmlreq.send(null);

                    }    

                }else if(mina.innerText.includes("Igual")){
                    let posMina = mina.innerText.indexOf("Igual") + 8;
                    let nomeMina = mina.innerText.slice(posMina);

                    let sinalMina = "igual";

                    if(conta !== null){
                        if(conta.innerText.includes("Contém")){
                            let posConta = conta.innerText.indexOf("Contém") + 7;
                            let nomeConta = conta.innerText.slice(posConta);

                            let sinalConta = "diferente";
                            
                        

                            let xmlreq = CriaRequest();

                            // Iniciar uma requisição
                            xmlreq.open("GET", "http://localhost/php/consulta.php?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=P", true);

                            // Atribui uma função para ser executada sempre que houver uma mudança de ado
                            xmlreq.onreadystatechange = function(){

                                // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
                                if (xmlreq.readyState == 4) {

                                    // Verifica se o arquivo foi encontrado com sucesso
                                    if (xmlreq.status == 200) {
                                        console.log(`${Data}, ${nomeMina}, ${nomeConta}, ${sinalConta}, ${sinalMina}`);
                                        console.log(xmlreq.responseText);
                                        res = JSON.parse(xmlreq.responseText);
                                        debito.textContent = res.debito;
                                        credito.textContent = res.credito;
                                        saldo.textContent = res.saldo;
                                    }else{
                                        res = xmlreq.statusText;
                                        console.log(res);
                                    }
                                }
                            };

                            xmlreq.send(null);



                        }else if(conta.innerText.includes("Igual")){
                            let posConta = conta.innerText.indexOf("Igual") + 8;
                            let nomeConta = conta.innerText.slice(posConta);

                            let sinalConta = "igual";
                            
                        

                            let xmlreq = CriaRequest();

                            // Iniciar uma requisição
                            xmlreq.open("GET", "http://localhost/php/consulta.php?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=P", true);

                            // Atribui uma função para ser executada sempre que houver uma mudança de ado
                            xmlreq.onreadystatechange = function(){

                                // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
                                if (xmlreq.readyState == 4) {

                                    // Verifica se o arquivo foi encontrado com sucesso
                                    if (xmlreq.status == 200) {
                                        console.log(`${Data}, ${nomeMina}, ${nomeConta}, ${sinalConta}, ${sinalMina}`);
                                        console.log(xmlreq.responseText);
                                        res = JSON.parse(xmlreq.responseText);
                                        debito.textContent = res.debito;
                                        credito.textContent = res.credito;
                                        saldo.textContent = res.saldo;
                                    }else{
                                        res = xmlreq.statusText;
                                        console.log(res);
                                    }
                                }
                            };

                            xmlreq.send(null);

                        }
                    }else {

                        //let posConta = conta.innerText.indexOf("Igual") + 8;
                        let nomeConta = "";

                        let sinalConta = "";



                        let xmlreq = CriaRequest();

                        // Iniciar uma requisição
                        xmlreq.open("GET", "http://localhost/php/consulta.php?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=P", true);

                        // Atribui uma função para ser executada sempre que houver uma mudança de ado
                        xmlreq.onreadystatechange = function(){

                            // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
                            if (xmlreq.readyState == 4) {

                                // Verifica se o arquivo foi encontrado com sucesso
                                if (xmlreq.status == 200) {
                                    console.log(`${Data}, ${nomeMina}, ${nomeConta}, ${sinalConta}, ${sinalMina}`);
                                    console.log(xmlreq.responseText);
                                    res = JSON.parse(xmlreq.responseText);
                                    debito.textContent = res.debito;
                                    credito.textContent = res.credito;
                                    saldo.textContent = res.saldo;
                                }else{
                                    res = xmlreq.statusText;
                                    console.log(res);
                                }
                            }
                        };

                        xmlreq.send(null);

                    }

                }
            }else {
                    
                let nomeMina = "";

                let sinalMina = "";

                if(conta !== null){
                    if(conta.innerText.includes("Contém")){
                        let posConta = conta.innerText.indexOf("Contém") + 7;
                        let nomeConta = conta.innerText.slice(posConta);

                        let sinalConta = "diferente";
                        
                    

                        let xmlreq = CriaRequest();

                        // Iniciar uma requisição
                        xmlreq.open("GET", "http://localhost/php/consulta.php?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=P", true);

                        // Atribui uma função para ser executada sempre que houver uma mudança de ado
                        xmlreq.onreadystatechange = function(){

                            // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
                            if (xmlreq.readyState == 4) {

                                // Verifica se o arquivo foi encontrado com sucesso
                                if (xmlreq.status == 200) {
                                    console.log(`${Data}, ${nomeMina}, ${nomeConta}, ${sinalConta}, ${sinalMina}`);
                                    console.log(xmlreq.responseText);
                                    res = JSON.parse(xmlreq.responseText);
                                    debito.textContent = res.debito;
                                    credito.textContent = res.credito;
                                    saldo.textContent = res.saldo;
                                }else{
                                    res = xmlreq.statusText;
                                    console.log(res);
                                }
                            }
                        };

                        xmlreq.send(null);



                    }else if(conta.innerText.includes("Igual")){
                        let posConta = conta.innerText.indexOf("Igual") + 8;
                        let nomeConta = conta.innerText.slice(posConta);

                        let sinalConta = "igual";
                        
                    

                        let xmlreq = CriaRequest();

                        // Iniciar uma requisição
                        xmlreq.open("GET", "http://localhost/php/consulta.php?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=P", true);

                        // Atribui uma função para ser executada sempre que houver uma mudança de ado
                        xmlreq.onreadystatechange = function(){

                            // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
                            if (xmlreq.readyState == 4) {

                                // Verifica se o arquivo foi encontrado com sucesso
                                if (xmlreq.status == 200) {
                                    console.log(`${Data}, ${nomeMina}, ${nomeConta}, ${sinalConta}, ${sinalMina}`);
                                    console.log(xmlreq.responseText);
                                    res = JSON.parse(xmlreq.responseText);
                                    debito.textContent = res.debito;
                                    credito.textContent = res.credito;
                                    saldo.textContent = res.saldo;
                                }else{
                                    res = xmlreq.statusText;
                                    console.log(res);
                                }
                            }
                        };

                        xmlreq.send(null);

                    }
                }else {

                    //let posConta = conta.innerText.indexOf("Igual") + 8;
                    let nomeConta = "";

                    let sinalConta = "";



                    let xmlreq = CriaRequest();

                    // Iniciar uma requisição
                    xmlreq.open("GET", "http://localhost/php/consulta.php?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=P", true);

                    // Atribui uma função para ser executada sempre que houver uma mudança de ado
                    xmlreq.onreadystatechange = function(){

                        // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
                        if (xmlreq.readyState == 4) {

                            // Verifica se o arquivo foi encontrado com sucesso
                            if (xmlreq.status == 200) {
                                console.log(`${Data}, ${nomeMina}, ${nomeConta}, ${sinalConta}, ${sinalMina}`);
                                console.log(xmlreq.responseText);
                                res = JSON.parse(xmlreq.responseText);
                                debito.textContent = res.debito;
                                credito.textContent = res.credito;
                                saldo.textContent = res.saldo;
                            }else{
                                res = xmlreq.statusText;
                                console.log(res);
                            }
                        }
                    };

                    xmlreq.send(null);

                }

            }

        }else if(formaPagamento.innerText.includes("Vale")){

            if(mina !== null){

                if(mina.innerText.includes("Contém")){
                    let posMina = mina.innerText.indexOf("Contém") + 9;
                    let nomeMina = mina.innerText.slice(posMina);

                    let sinalMina = "diferente";

                    if(conta !== null){
                        if(conta.innerText.includes("Contém")){
                            let posConta = conta.innerText.indexOf("Contém") + 7;
                            let nomeConta = conta.innerText.slice(posConta);

                            let sinalConta = "diferente";
                            
                        

                            let xmlreq = CriaRequest();

                            // Iniciar uma requisição
                            xmlreq.open("GET", "http://localhost/php/consulta.php?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=V", true);

                            // Atribui uma função para ser executada sempre que houver uma mudança de ado
                            xmlreq.onreadystatechange = function(){

                                // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
                                if (xmlreq.readyState == 4) {

                                    // Verifica se o arquivo foi encontrado com sucesso
                                    if (xmlreq.status == 200) {
                                        console.log(`${Data}, ${nomeMina}, ${nomeConta}, ${sinalConta}, ${sinalMina}`);
                                        console.log(xmlreq.responseText);
                                        res = JSON.parse(xmlreq.responseText);
                                        debito.textContent = res.debito;
                                        credito.textContent = res.credito;
                                        saldo.textContent = res.saldo;
                                    }else{
                                        res = xmlreq.statusText;
                                        console.log(res);
                                    }
                                }
                            };

                            xmlreq.send(null);



                        }else if(conta.innerText.includes("Igual")){
                            let posConta = conta.innerText.indexOf("Igual") + 8;
                            let nomeConta = conta.innerText.slice(posConta);

                            let sinalConta = "igual";
                            
                        
                            let xmlreq = CriaRequest();

                            // Iniciar uma requisição
                            xmlreq.open("GET", "http://localhost/php/consulta.php?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=V", true);

                            // Atribui uma função para ser executada sempre que houver uma mudança de ado
                            xmlreq.onreadystatechange = function(){

                                // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
                                if (xmlreq.readyState == 4) {

                                    // Verifica se o arquivo foi encontrado com sucesso
                                    if (xmlreq.status == 200) {
                                        console.log(`${Data}, ${nomeMina}, ${nomeConta}, ${sinalConta}, ${sinalMina}`);
                                        console.log(xmlreq.responseText);
                                        res = JSON.parse(xmlreq.responseText);
                                        debito.textContent = res.debito;
                                        credito.textContent = res.credito;
                                        saldo.textContent = res.saldo;
                                    }else{
                                        res = xmlreq.statusText;
                                        console.log(res);
                                    }
                                }
                            };

                            xmlreq.send(null);

                        }
                    }else {

                        //let posConta = conta.innerText.indexOf("Igual") + 8;
                        let nomeConta = "";

                        let sinalConta = "";



                        let xmlreq = CriaRequest();

                        // Iniciar uma requisição
                        xmlreq.open("GET", "http://localhost/php/consulta.php?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=V", true);

                        // Atribui uma função para ser executada sempre que houver uma mudança de ado
                        xmlreq.onreadystatechange = function(){

                            // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
                            if (xmlreq.readyState == 4) {

                                // Verifica se o arquivo foi encontrado com sucesso
                                if (xmlreq.status == 200) {
                                    console.log(`${Data}, ${nomeMina}, ${nomeConta}, ${sinalConta}, ${sinalMina}`);
                                    console.log(xmlreq.responseText);
                                    res = JSON.parse(xmlreq.responseText);
                                    debito.textContent = res.debito;
                                    credito.textContent = res.credito;
                                    saldo.textContent = res.saldo;
                                }else{
                                    res = xmlreq.statusText;
                                    console.log(res);
                                }
                            }
                        };

                        xmlreq.send(null);

                    }

                }else if(mina.innerText.includes("Igual")){
                    let posMina = mina.innerText.indexOf("Igual") + 8;
                    let nomeMina = mina.innerText.slice(posMina);

                    let sinalMina = "igual";

                    if(conta !== null){
                        if(conta.innerText.includes("Contém")){
                            let posConta = conta.innerText.indexOf("Contém") + 7;
                            let nomeConta = conta.innerText.slice(posConta);

                            let sinalConta = "diferente";
                            
                        

                            let xmlreq = CriaRequest();

                            // Iniciar uma requisição
                            xmlreq.open("GET", "http://localhost/php/consulta.php?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=V", true);

                            // Atribui uma função para ser executada sempre que houver uma mudança de ado
                            xmlreq.onreadystatechange = function(){

                                // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
                                if (xmlreq.readyState == 4) {

                                    // Verifica se o arquivo foi encontrado com sucesso
                                    if (xmlreq.status == 200) {
                                        console.log(`${Data}, ${nomeMina}, ${nomeConta}, ${sinalConta}, ${sinalMina}`);
                                        console.log(xmlreq.responseText);
                                        res = JSON.parse(xmlreq.responseText);
                                        debito.textContent = res.debito;
                                        credito.textContent = res.credito;
                                        saldo.textContent = res.saldo;
                                    }else{
                                        res = xmlreq.statusText;
                                        console.log(res);
                                    }
                                }
                            };

                            xmlreq.send(null);



                        }else if(conta.innerText.includes("Igual")){
                            let posConta = conta.innerText.indexOf("Igual") + 8;
                            let nomeConta = conta.innerText.slice(posConta);

                            let sinalConta = "igual";
                            
                        
                            let xmlreq = CriaRequest();

                            // Iniciar uma requisição
                            xmlreq.open("GET", "http://localhost/php/consulta.php?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=V", true);

                            // Atribui uma função para ser executada sempre que houver uma mudança de ado
                            xmlreq.onreadystatechange = function(){

                                // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
                                if (xmlreq.readyState == 4) {

                                    // Verifica se o arquivo foi encontrado com sucesso
                                    if (xmlreq.status == 200) {
                                        console.log(`${Data}, ${nomeMina}, ${nomeConta}, ${sinalConta}, ${sinalMina}`);
                                        console.log(xmlreq.responseText);
                                        res = JSON.parse(xmlreq.responseText);
                                        debito.textContent = res.debito;
                                        credito.textContent = res.credito;
                                        saldo.textContent = res.saldo;
                                    }else{
                                        res = xmlreq.statusText;
                                        console.log(res);
                                    }
                                }
                            };

                            xmlreq.send(null);

                        }
                    }else {

                        //let posConta = conta.innerText.indexOf("Igual") + 8;
                        let nomeConta = "";

                        let sinalConta = "";



                        let xmlreq = CriaRequest();

                        // Iniciar uma requisição
                        xmlreq.open("GET", "http://localhost/php/consulta.php?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=V", true);

                        // Atribui uma função para ser executada sempre que houver uma mudança de ado
                        xmlreq.onreadystatechange = function(){

                            // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
                            if (xmlreq.readyState == 4) {

                                // Verifica se o arquivo foi encontrado com sucesso
                                if (xmlreq.status == 200) {
                                    console.log(`${Data}, ${nomeMina}, ${nomeConta}, ${sinalConta}, ${sinalMina}`);
                                    console.log(xmlreq.responseText);
                                    res = JSON.parse(xmlreq.responseText);
                                    debito.textContent = res.debito;
                                    credito.textContent = res.credito;
                                    saldo.textContent = res.saldo;
                                }else{
                                    res = xmlreq.statusText;
                                    console.log(res);
                                }
                            }
                        };

                        xmlreq.send(null);

                    }

                }

            }else {
                    
                //let posMina = mina.innerText.indexOf("Contém") + 9;
                let nomeMina = "";

                let sinalMina = "";

                if(conta !== null){
                    if(conta.innerText.includes("Contém")){
                        let posConta = conta.innerText.indexOf("Contém") + 7;
                        let nomeConta = conta.innerText.slice(posConta);

                        let sinalConta = "diferente";
                        
                    

                        let xmlreq = CriaRequest();

                        // Iniciar uma requisição
                        xmlreq.open("GET", "http://localhost/php/consulta.php?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=V", true);

                        // Atribui uma função para ser executada sempre que houver uma mudança de ado
                        xmlreq.onreadystatechange = function(){

                            // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
                            if (xmlreq.readyState == 4) {

                                // Verifica se o arquivo foi encontrado com sucesso
                                if (xmlreq.status == 200) {
                                    console.log(`${Data}, ${nomeMina}, ${nomeConta}, ${sinalConta}, ${sinalMina}`);
                                    console.log(xmlreq.responseText);
                                    res = JSON.parse(xmlreq.responseText);
                                    debito.textContent = res.debito;
                                    credito.textContent = res.credito;
                                    saldo.textContent = res.saldo;
                                }else{
                                    res = xmlreq.statusText;
                                    console.log(res);
                                }
                            }
                        };

                        xmlreq.send(null);



                    }else if(conta.innerText.includes("Igual")){
                        let posConta = conta.innerText.indexOf("Igual") + 8;
                        let nomeConta = conta.innerText.slice(posConta);

                        let sinalConta = "igual";
                        
                    
                        let xmlreq = CriaRequest();

                        // Iniciar uma requisição
                        xmlreq.open("GET", "http://localhost/php/consulta.php?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=V", true);

                        // Atribui uma função para ser executada sempre que houver uma mudança de ado
                        xmlreq.onreadystatechange = function(){

                            // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
                            if (xmlreq.readyState == 4) {

                                // Verifica se o arquivo foi encontrado com sucesso
                                if (xmlreq.status == 200) {
                                    console.log(`${Data}, ${nomeMina}, ${nomeConta}, ${sinalConta}, ${sinalMina}`);
                                    console.log(xmlreq.responseText);
                                    res = JSON.parse(xmlreq.responseText);
                                    debito.textContent = res.debito;
                                    credito.textContent = res.credito;
                                    saldo.textContent = res.saldo;
                                }else{
                                    res = xmlreq.statusText;
                                    console.log(res);
                                }
                            }
                        };

                        xmlreq.send(null);

                    }
                }else {

                    //let posConta = conta.innerText.indexOf("Igual") + 8;
                    let nomeConta = "";

                    let sinalConta = "";



                    let xmlreq = CriaRequest();

                    // Iniciar uma requisição
                    xmlreq.open("GET", "http://localhost/php/consulta.php?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=V", true);

                    // Atribui uma função para ser executada sempre que houver uma mudança de ado
                    xmlreq.onreadystatechange = function(){

                        // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
                        if (xmlreq.readyState == 4) {

                            // Verifica se o arquivo foi encontrado com sucesso
                            if (xmlreq.status == 200) {
                                console.log(`${Data}, ${nomeMina}, ${nomeConta}, ${sinalConta}, ${sinalMina}`);
                                console.log(xmlreq.responseText);
                                res = JSON.parse(xmlreq.responseText);
                                debito.textContent = res.debito;
                                credito.textContent = res.credito;
                                saldo.textContent = res.saldo;
                            }else{
                                res = xmlreq.statusText;
                                console.log(res);
                            }
                        }
                    };

                    xmlreq.send(null);

                }

            }
        }
        
    </script>
</body>
</html>