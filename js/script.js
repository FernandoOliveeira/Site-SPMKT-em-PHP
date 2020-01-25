/* Script para os inputs de Data de Validade não aceitarem data anterior ao dia atual */

var hoje = new Date();
var dd = hoje.getDate();
var mm = hoje.getMonth()+1; 
var yyyy = hoje.getFullYear();
 if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 

hoje = yyyy+'-'+mm+'-'+dd;
document.getElementById("txtDataValidade").setAttribute("min", hoje);