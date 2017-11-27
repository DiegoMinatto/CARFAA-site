 var counter;

function sendFecha(){
	$.ajax({ url: '../Utils/Fechar.php',
         type: 'post'
});

}


function AbreFecha() {
if ( document.getElementById("btnAbrir").classList.contains('btn-outline-danger') ){
	document.getElementById("btnPanico").disabled = true;
	document.getElementById("btnDesabilita").disabled = true;
 document.getElementById("SpawnAbrir").innerHTML= "<i style=\"font-size:24px\" class=\"fa\">&#xf023;</i> Fechar(10)";
  document.getElementById("btnAbrir").classList.remove('btn-outline-danger');
 document.getElementById("btnAbrir").classList.add('btn-success');
 counter=setInterval(timer, 1000);


$.ajax({ url: '../Utils/Abrir.php',
         type: 'post'
});



}else{
	clearInterval(counter);
     count = 10;
      document.getElementById("SpawnAbrir").innerHTML= "<i style=\"font-size:24px\" class=\"fa\">&#xf09c;</i> Abrir"
      document.getElementById("btnAbrir").classList.remove('btn-success');
        document.getElementById("btnAbrir").classList.add('btn-outline-danger');
        	document.getElementById("btnPanico").disabled = false;
	document.getElementById("btnDesabilita").disabled = false;



sendFecha();



}

}





function Panico() {
if ( document.getElementById("btnPanico").classList.contains('btn-outline-warning') ){
	        document.getElementById("btnAbrir").disabled = true;
	  document.getElementById("btnDesabilita").disabled = true;
		  document.getElementById("btnPanico").classList.remove('btn-outline-warning');
          document.getElementById("btnPanico").classList.add('btn-warning');


	$.ajax({ url: '../Utils/LigarSirene.php',
         type: 'post'
});



      }else{
      	document.getElementById("btnPanico").classList.remove('btn-warning');
document.getElementById("btnPanico").classList.add('btn-outline-warning');
   document.getElementById("btnAbrir").disabled = false;
	  document.getElementById("btnDesabilita").disabled = false;
       	$.ajax({ url: '../Utils/DesligarSirene.php',
         type: 'post'
});
   
      }

}


function Desabilitar() {
if ( document.getElementById("btnDesabilita").classList.contains('btn-outline-info') ){
		        document.getElementById("btnAbrir").disabled = true;
	  document.getElementById("btnPanico").disabled = true;
		  document.getElementById("btnDesabilita").classList.remove('btn-outline-info');
          document.getElementById("btnDesabilita").classList.add('btn-info');



	$.ajax({ url: '../Utils/Bloquear.php',
         type: 'post'
});



      }else{
      	document.getElementById("btnDesabilita").classList.remove('btn-info');
document.getElementById("btnDesabilita").classList.add('btn-outline-info');
		        document.getElementById("btnAbrir").disabled = false;
	  document.getElementById("btnPanico").disabled = false;

	  	$.ajax({ url: '../Utils/Desbloquear.php',
         type: 'post'
});

          
      }
}






function DesabilitaBotoes() {
	document.getElementById("btnPanico").disabled = true;
	document.getElementById("btnDesabilita").disabled = true;
    document.getElementById("btnAbrir").disabled = true;	   
	document.getElementById("spawnRD").classList.remove('hide');
}



var count=10;
function timer()
{
  count=count-1;
  if (count <= 0)
  {
     clearInterval(counter);
     count = 10;
      document.getElementById("SpawnAbrir").innerHTML= "<i style=\"font-size:24px\" class=\"fa\">&#xf09c;</i> Abrir"
      document.getElementById("btnAbrir").classList.remove('btn-success');
        document.getElementById("btnAbrir").classList.add('btn-outline-danger');
        document.getElementById("btnPanico").disabled = false;
	  document.getElementById("btnDesabilita").disabled = false;
      sendFecha();
       sendFecha();
        sendFecha();
     return;
  }
  document.getElementById("SpawnAbrir").innerHTML= "<i style=\"font-size:24px\" class=\"fa\">&#xf023;</i> Fechar (" + count + ")" ;
}

