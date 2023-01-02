<?php


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

        let saldoInicial = document.getElementById('grid-saldoInicial');
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
          Data += `dataContabil menorigual '`+valor+`'`;

        }else if(dataContabil.innerText.includes("igual")){

          let valor = FormataStringData(str.match(reg)[0]);
          Data += `dataContabil igual '`+valor+`'`;

        }else if(dataContabil.innerText.includes("Intervalo")){

          let valor1 = FormataStringData(str.match(reg)[0]);
          let valor2 = FormataStringData(str.match(reg)[1]);
          Data += `dataContabil between '`+valor1+`' and '`+valor2+`'`;

        }else if(dataContabil.innerText.includes("maior")){

          let valor = FormataStringData(str.match(reg)[0]);
          Data += `dataContabil maior '`+valor+`'`;

        }else if(dataContabil.innerText.includes("menor")){

          let valor = FormataStringData(str.match(reg)[0]);
          Data += `dataContabil menor '`+valor+`'`;

        }

        if(formaPagamento !== null){

            console.log("forma de pagamento diferente de null");

            if(formaPagamento.innerText.includes("Dinheiro")){

                console.log("forma de pagamento em Dinheiro");

                if(mina !== null){

                    console.log("entrou na mina diferente de null");

                    if(mina.innerText.includes("Contém")){

                        console.log("entrou em diferente da mina escolhida")

                        let posMina = mina.innerText.indexOf("Contém") + 7;
                        let nomeMina = mina.innerText.slice(posMina);

                        let sinalMina = "diferente";

                        if(conta !== null){

                            console.log("conta diferente de null")

                            if(conta.innerText.includes("Contém")){

                                console.log("entrou em diferente da conta escolhida");

                                let posConta = conta.innerText.indexOf("Contém") + 7;
                                let nomeConta = conta.innerText.slice(posConta);

                                let sinalConta = "diferente";
                                

                                let xmlreq = CriaRequest();

                                console.log("requisição: http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=E")

                                // Iniciar uma requisição
                                xmlreq.open("GET", "http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=E", true);

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


                            }else if(conta.innerText.includes("igual")){

                                console.log("entrou em igual a conta escolhida");

                                let posConta = conta.innerText.indexOf("igual") + 8;
                                let nomeConta = conta.innerText.slice(posConta);

                                let sinalConta = "igual";
                                

                                let xmlreq = CriaRequest();

                                console.log("requisição: http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=E")

                                // Iniciar uma requisição
                                xmlreq.open("GET", "http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=E", true);

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

                            }
                        }else {

                            console.log("entrou em conta null");
                            //let posConta = conta.innerText.indexOf("Igual") + 8;
                            let nomeConta = "";

                            let sinalConta = "";


                            let xmlreq = CriaRequest();

                            console.log("requisição: http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=E")

                            // Iniciar uma requisição
                            xmlreq.open("GET", "http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=E", true);

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

                        }    

                    }else if(mina.innerText.includes("igual")){

                        console.log("entrou em igual a mina escolhida");

                        let posMina = mina.innerText.indexOf("igual") + 8;
                        let nomeMina = mina.innerText.slice(posMina);

                        let sinalMina = "igual";

                        if(conta !== null){

                            console.log("entrou na conta dirente de null");

                            if(conta.innerText.includes("Contém")){

                                console.log("entrou em diferente da conta escolhida");

                                let posConta = conta.innerText.indexOf("Contém") + 7;
                                let nomeConta = conta.innerText.slice(posConta);

                                let sinalConta = "diferente";
                                
                                let xmlreq = CriaRequest();

                                console.log("requisição: http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=E")

                                // Iniciar uma requisição
                                xmlreq.open("GET", "http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=E", true);

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



                            }else if(conta.innerText.includes("igual")){

                                console.log("entrou em igual a conta escolhida");

                                let posConta = conta.innerText.indexOf("igual") + 8;
                                let nomeConta = conta.innerText.slice(posConta);

                                let sinalConta = "igual";
                                
                                let xmlreq = CriaRequest();

                                console.log("requisição: http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=E")

                                // Iniciar uma requisição
                                xmlreq.open("GET", "http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=E", true);

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

                            }
                        }else {

                            console.log("entrou na conta igual a null");

                            let nomeConta = "";

                            let sinalConta = "";


                            let xmlreq = CriaRequest();

                            console.log("requisição: http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=E")

                            // Iniciar uma requisição
                            xmlreq.open("GET", "http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=E", true);

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

                        }

                    }

                }else {
                        
                    console.log("entrou na mina igual a null");

                    let nomeMina = "";

                    let sinalMina = "";

                    if(conta !== null){

                        console.log("entrou em conta diferente de null");

                        if(conta.innerText.includes("Contém")){

                            console.log("entrou em diferente da conta escolhida");

                            let posConta = conta.innerText.indexOf("Contém") + 7;
                            let nomeConta = conta.innerText.slice(posConta);

                            let sinalConta = "diferente";
                            

                            let xmlreq = CriaRequest();

                            console.log("requisição: http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=E")

                            // Iniciar uma requisição
                            xmlreq.open("GET", "http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=E", true);

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



                        }else if(conta.innerText.includes("igual")){

                            console.log("entrou em igual a conta escolhida");

                            let posConta = conta.innerText.indexOf("igual") + 8;
                            let nomeConta = conta.innerText.slice(posConta);

                            let sinalConta = "igual";
                            

                            let xmlreq = CriaRequest();

                            console.log("requisição: http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=E")

                            // Iniciar uma requisição
                            xmlreq.open("GET", "http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=E", true);

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

                        }

                    }else {

                        console.log("entrou em conta igual a null");

                        let nomeConta = "";

                        let sinalConta = "";


                        let xmlreq = CriaRequest();

                        console.log("requisição: http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=E")

                        // Iniciar uma requisição
                        xmlreq.open("GET", "http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=E", true);

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

                    }
  
                } 

            }else if(formaPagamento.innerText.includes("Pix")){

                console.log("forma de pagamento em Pix");

                if(mina !== null){

                    console.log("entrou em mina diferente de null");

                    if(mina.innerText.includes("Contém")){

                        console.log("entrou em diferente da mina escolhida");

                        let posMina = mina.innerText.indexOf("Contém") + 7;
                        let nomeMina = mina.innerText.slice(posMina);

                        let sinalMina = "diferente";

                        if(conta !== null){

                            console.log("entrou em conta diferente de null");

                            if(conta.innerText.includes("Contém")){

                                console.log("entrou em deferente da conta escolhida");

                                let posConta = conta.innerText.indexOf("Contém") + 7;
                                let nomeConta = conta.innerText.slice(posConta);

                                let sinalConta = "diferente";
                                
                                let xmlreq = CriaRequest();

                                console.log("requisição: http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=P")

                                // Iniciar uma requisição
                                xmlreq.open("GET", "http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=P", true);

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



                            }else if(conta.innerText.includes("igual")){

                                console.log("entrou em igual a conta escolhida");

                                let posConta = conta.innerText.indexOf("igual") + 8;
                                let nomeConta = conta.innerText.slice(posConta);

                                let sinalConta = "igual";
                                

                                let xmlreq = CriaRequest();

                                console.log("requisição: http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=P")

                                // Iniciar uma requisição
                                xmlreq.open("GET", "http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=P", true);

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

                            }
                        }else {

                            console.log("entrou em conta igual a null");

                            let nomeConta = "";

                            let sinalConta = "";


                            let xmlreq = CriaRequest();

                            console.log("requisição: http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=P")

                            // Iniciar uma requisição
                            xmlreq.open("GET", "http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=P", true);

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

                        }    

                    }else if(mina.innerText.includes("igual")){

                        console.log("entrou em igual a mina escolhida");

                        let posMina = mina.innerText.indexOf("igual") + 8;
                        let nomeMina = mina.innerText.slice(posMina);

                        let sinalMina = "igual";

                        if(conta !== null){

                            console.log("entrou em conta diferente de null");

                            if(conta.innerText.includes("Contém")){

                                console.log("entrou em diferente da conta escolhida");

                                let posConta = conta.innerText.indexOf("Contém") + 7;
                                let nomeConta = conta.innerText.slice(posConta);

                                let sinalConta = "diferente";
                                

                                let xmlreq = CriaRequest();

                                console.log("requisição: http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=P")

                                // Iniciar uma requisição
                                xmlreq.open("GET", "http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=P", true);

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



                            }else if(conta.innerText.includes("igual")){

                                console.log("entrou em igual a conta escolhida");

                                let posConta = conta.innerText.indexOf("igual") + 8;
                                let nomeConta = conta.innerText.slice(posConta);

                                let sinalConta = "igual";
                                

                                let xmlreq = CriaRequest();

                                console.log("requisição: http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=P")

                                // Iniciar uma requisição
                                xmlreq.open("GET", "http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=P", true);

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

                            }
                        }else {

                            console.log("entrou em conta igual a null");

                            let nomeConta = "";

                            let sinalConta = "";


                            let xmlreq = CriaRequest();

                            console.log("requisição: http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=P")

                            // Iniciar uma requisição
                            xmlreq.open("GET", "http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=P", true);

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

                        }

                    }
                }else {
                    
                    console.log("entrou em mina igual a null");

                    let nomeMina = "";

                    let sinalMina = "";

                    if(conta !== null){

                        console.log("entrou em conta diferente de null");

                        if(conta.innerText.includes("Contém")){

                            console.log("entrou em diferente a conta escolhida");

                            let posConta = conta.innerText.indexOf("Contém") + 7;
                            let nomeConta = conta.innerText.slice(posConta);

                            let sinalConta = "diferente";
                            

                            let xmlreq = CriaRequest();

                            console.log("requisição: http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=P")

                            // Iniciar uma requisição
                            xmlreq.open("GET", "http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=P", true);

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



                        }else if(conta.innerText.includes("igual")){

                            console.log("entrou em igual a conta escolhida");

                            let posConta = conta.innerText.indexOf("igual") + 8;
                            let nomeConta = conta.innerText.slice(posConta);

                            let sinalConta = "igual";
                            

                            let xmlreq = CriaRequest();

                            console.log("requisição: http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=P")

                            // Iniciar uma requisição
                            xmlreq.open("GET", "http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=P", true);

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

                        }

                    }else {

                        console.log("entrou em conta igual a null");

                        let nomeConta = "";

                        let sinalConta = "";


                        let xmlreq = CriaRequest();

                        console.log("requisição: http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=P")

                        // Iniciar uma requisição
                        xmlreq.open("GET", "http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=P", true);

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

                    }

                }

            }else if(formaPagamento.innerText.includes("Vale")){

                console.log("forma de pagamento em Vale");

                if(mina !== null){

                    console.log("entrou em mina diferente de null");

                    if(mina.innerText.includes("Contém")){

                        console.log("entrou em diferente da mina escolhida");

                        let posMina = mina.innerText.indexOf("Contém") + 7;
                        let nomeMina = mina.innerText.slice(posMina);

                        let sinalMina = "diferente";

                        if(conta !== null){

                            console.log("entrou em conta diferente de null");

                            if(conta.innerText.includes("Contém")){

                                console.log("entrou em deferente da conta escolhida");

                                let posConta = conta.innerText.indexOf("Contém") + 7;
                                let nomeConta = conta.innerText.slice(posConta);

                                let sinalConta = "diferente";
                                
                                let xmlreq = CriaRequest();

                                console.log("requisição: http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=V")

                                // Iniciar uma requisição
                                xmlreq.open("GET", "http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=V", true);

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



                            }else if(conta.innerText.includes("igual")){

                                console.log("entrou em igual a conta escolhida");

                                let posConta = conta.innerText.indexOf("igual") + 8;
                                let nomeConta = conta.innerText.slice(posConta);

                                let sinalConta = "igual";
                                

                                let xmlreq = CriaRequest();

                                console.log("requisição: http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=V")

                                // Iniciar uma requisição
                                xmlreq.open("GET", "http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=V", true);

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

                            }
                        }else {

                            console.log("entrou em conta igual a null");

                            let nomeConta = "";

                            let sinalConta = "";


                            let xmlreq = CriaRequest();

                            console.log("requisição: http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=V")

                            // Iniciar uma requisição
                            xmlreq.open("GET", "http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=V", true);

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

                        }    

                    }else if(mina.innerText.includes("igual")){

                        console.log("entrou em igual a mina escolhida");

                        let posMina = mina.innerText.indexOf("igual") + 8;
                        let nomeMina = mina.innerText.slice(posMina);

                        let sinalMina = "igual";

                        if(conta !== null){

                            console.log("entrou em conta diferente de null");

                            if(conta.innerText.includes("Contém")){

                                console.log("entrou em diferente da conta escolhida");

                                let posConta = conta.innerText.indexOf("Contém") + 7;
                                let nomeConta = conta.innerText.slice(posConta);

                                let sinalConta = "diferente";
                                

                                let xmlreq = CriaRequest();

                                console.log("requisição: http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=V")

                                // Iniciar uma requisição
                                xmlreq.open("GET", "http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=V", true);

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



                            }else if(conta.innerText.includes("igual")){

                                console.log("entrou em igual a conta escolhida");

                                let posConta = conta.innerText.indexOf("igual") + 8;
                                let nomeConta = conta.innerText.slice(posConta);

                                let sinalConta = "igual";
                                

                                let xmlreq = CriaRequest();

                                console.log("requisição: http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=V")

                                // Iniciar uma requisição
                                xmlreq.open("GET", "http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=V", true);

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

                            }
                        }else {

                            console.log("entrou em conta igual a null");

                            let nomeConta = "";

                            let sinalConta = "";


                            let xmlreq = CriaRequest();

                            console.log("requisição: http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=V")

                            // Iniciar uma requisição
                            xmlreq.open("GET", "http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=V", true);

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

                        }

                    }
                }else {

                    console.log("entrou em mina igual a null");

                    let nomeMina = "";

                    let sinalMina = "";

                    if(conta !== null){

                        console.log("entrou em conta diferente de null");

                        if(conta.innerText.includes("Contém")){

                            console.log("entrou em diferente a conta escolhida");

                            let posConta = conta.innerText.indexOf("Contém") + 7;
                            let nomeConta = conta.innerText.slice(posConta);

                            let sinalConta = "diferente";
                            

                            let xmlreq = CriaRequest();

                            console.log("requisição: http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=V")

                            // Iniciar uma requisição
                            xmlreq.open("GET", "http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=V", true);

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



                        }else if(conta.innerText.includes("igual")){

                            console.log("entrou em igual a conta escolhida");

                            let posConta = conta.innerText.indexOf("igual") + 8;
                            let nomeConta = conta.innerText.slice(posConta);

                            let sinalConta = "igual";
                            

                            let xmlreq = CriaRequest();

                            console.log("requisição: http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=V")

                            // Iniciar uma requisição
                            xmlreq.open("GET", "http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=V", true);

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

                        }

                    }else {

                        console.log("entrou em conta igual a null");

                        let nomeConta = "";

                        let sinalConta = "";


                        let xmlreq = CriaRequest();

                        console.log("requisição: http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=V")

                        // Iniciar uma requisição
                        xmlreq.open("GET", "http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=V", true);

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

                    }

                }
            }
        }else {

            console.log("forma de pagamento igual a null");

            if(mina !== null){

                console.log("entrou na mina diferente de null");

                if(mina.innerText.includes("Contém")){

                    console.log("entrou em diferente da mina escolhida")

                    let posMina = mina.innerText.indexOf("Contém") + 7;
                    let nomeMina = mina.innerText.slice(posMina);

                    let sinalMina = "diferente";

                    if(conta !== null){

                        console.log("conta diferente de null")

                        if(conta.innerText.includes("Contém")){

                            console.log("entrou em diferente da conta escolhida");

                            let posConta = conta.innerText.indexOf("Contém") + 7;
                            let nomeConta = conta.innerText.slice(posConta);

                            let sinalConta = "diferente";
                            

                            let xmlreq = CriaRequest();

                            console.log("requisição: http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=")

                            // Iniciar uma requisição
                            xmlreq.open("GET", "http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=", true);

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


                        }else if(conta.innerText.includes("igual")){

                            console.log("entrou em igual a conta escolhida");

                            let posConta = conta.innerText.indexOf("igual") + 8;
                            let nomeConta = conta.innerText.slice(posConta);

                            let sinalConta = "igual";
                            

                            let xmlreq = CriaRequest();

                            console.log("requisição: http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=")

                            // Iniciar uma requisição
                            xmlreq.open("GET", "http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=", true);

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

                        }
                    }else {

                        console.log("entrou em conta null");
                        //let posConta = conta.innerText.indexOf("Igual") + 8;
                        let nomeConta = "";

                        let sinalConta = "";


                        let xmlreq = CriaRequest();

                        console.log("requisição: http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=")

                        // Iniciar uma requisição
                        xmlreq.open("GET", "http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=", true);

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

                    }    

                }else if(mina.innerText.includes("igual")){

                    console.log("entrou em igual a mina escolhida");

                    let posMina = mina.innerText.indexOf("igual") + 8;
                    let nomeMina = mina.innerText.slice(posMina);

                    let sinalMina = "igual";

                    if(conta !== null){

                        console.log("entrou na conta dirente de null");

                        if(conta.innerText.includes("Contém")){

                            console.log("entrou em diferente da conta escolhida");

                            let posConta = conta.innerText.indexOf("Contém") + 7;
                            let nomeConta = conta.innerText.slice(posConta);

                            let sinalConta = "diferente";
                            
                            let xmlreq = CriaRequest();

                            console.log("requisição: http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=")

                            // Iniciar uma requisição
                            xmlreq.open("GET", "http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=", true);

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



                        }else if(conta.innerText.includes("igual")){

                            console.log("entrou em igual a conta escolhida");

                            let posConta = conta.innerText.indexOf("igual") + 8;
                            let nomeConta = conta.innerText.slice(posConta);

                            let sinalConta = "igual";
                            
                            let xmlreq = CriaRequest();

                            console.log("requisição: http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=")

                            // Iniciar uma requisição
                            xmlreq.open("GET", "http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=", true);

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

                        }
                    }else {

                        console.log("entrou na conta igual a null");

                        let nomeConta = "";

                        let sinalConta = "";


                        let xmlreq = CriaRequest();

                        console.log("requisição: http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=")

                        // Iniciar uma requisição
                        xmlreq.open("GET", "http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=", true);

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

                    }

                }

            }else {
                    
                console.log("entrou na mina igual a null");

                let nomeMina = "";

                let sinalMina = "";

                if(conta !== null){

                    console.log("entrou em conta diferente de null");

                    if(conta.innerText.includes("Contém")){

                        console.log("entrou em diferente da conta escolhida");

                        let posConta = conta.innerText.indexOf("Contém") + 7;
                        let nomeConta = conta.innerText.slice(posConta);

                        let sinalConta = "diferente";
                        

                        let xmlreq = CriaRequest();

                        console.log("requisição: http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=")

                        // Iniciar uma requisição
                        xmlreq.open("GET", "http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=", true);

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



                    }else if(conta.innerText.includes("igual")){

                        console.log("entrou em igual a conta escolhida");

                        let posConta = conta.innerText.indexOf("igual") + 8;
                        let nomeConta = conta.innerText.slice(posConta);

                        let sinalConta = "igual";
                        

                        let xmlreq = CriaRequest();

                        console.log("requisição: http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=")

                        // Iniciar uma requisição
                        xmlreq.open("GET", "http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=", true);

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

                    }

                }else {

                    console.log("entrou em conta igual a null");

                    let nomeConta = "";

                    let sinalConta = "";


                    let xmlreq = CriaRequest();

                    console.log("requisição: http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=")

                    // Iniciar uma requisição
                    xmlreq.open("GET", "http://165.232.148.251/scriptcase/app/BA_SANTANA3/consulta/?data=" + Data + "&mina=" + nomeMina + "&conta=" + nomeConta + "&sinalConta=" + sinalConta + "&sinalMina=" + sinalMina + "&formaPagamento=", true);

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

                }

            }
        }
        
        let search = document.getElementById("div_grid_search");
        search.style.display = 'none';
        
    </script>


?>