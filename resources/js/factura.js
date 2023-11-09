
console.log('hola');
$(document).ready(function()
{alert("listo");
});
const fromDetalle= document.getElementById("fromDetalle");
const impCant= document.getElementById("impCant");
const impPUnit= document.getElementById("impPUnit");
const imputPrecioTotal= document.getElementById("imputPrecioTotal");

//console.log(total);
function calculatotal(){
    var listPrice = document.getElementById('impCant').value;
    var cost_usd = document.getElementById('impPUnit').value;
    var marginUSDO = listPrice * cost_usd;
    document.getElementById('imputPrecioTotal').value = marginUSDO; 
  }/*
codigoProducto.onchange=()=>{
    
    console.log(impCant.value);
    const canti= +impCant.value;
    const punitario= +impPUnit.value;
    const total=canti*punitario;
    imputPrecioTotal.value=10;
    
}*/