/*let string = "(diovisdvd) (144) (poder)";
let lista = [];

for (let match of string.matchAll(/\(([^)]+)\)/g)) {
    lista.push(match[1]) 
}

console.log(lista[0])*/

let n = 13.1;

console.log(n.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));