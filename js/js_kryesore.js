function klikmenu(menu){
	switch (menu){
		case 10:window.location.replace("shtepia.php");break;
		
		case 20:window.location.replace("mesazhe.php");break;
		case 21:window.location.replace("mesazhe.php?dergo=true");break;
		case 22:window.location.replace("mesazhe.php");break;
		case 23:window.location.replace("mesazhe.php?grupe=1");break;
		
		case 30:window.location.replace("profili.php");break;
		
		case 40:window.location.replace("shoqeria.php");break;
		case 41:window.location.replace("shoqeria.php?shoket=1");break;
		case 42:window.location.replace("shoqeria.php?ftesat=1");break;
		case 43:window.location.replace("shoqeria.php?pranimet=1");break;
		case 44:window.location.replace("shkesi.php");break;
		
		case 51:window.location.replace("rregullime.php");break;
		case 52:window.location.replace("rregullime.php?privatesia=1");break;
		case 53:window.location.replace("dil.php");break;
	}
}
function kerko(){
	txt=document.getElementById("txtkerko").value;
	
	window.location.replace("kerko.php?txt="+txt);
}
function posto(){
     var postimi,postimi_2;
     postimi= document.getElementById("txtpostim").value;
     postimi_2= document.getElementById("i_postimi");
     
     if(postimi=="")alert("Nuk mund te besh nje postim bosh !");
     else {
     	postimi_2.value=postimi;
     	document.getElementById("f_posto").submit();
     }
}
function dergo_msg_iri(){
	var marresi_id,marresi_txt,msg,msg_sub;
	marresi_id=document.getElementByName("h_marresi");
	marresi_txt=document.getElementsByName("e_marresi").value;
	msg=document.getElementById("msg");
	document.getElementByName("h_msg").value=msg.value;
	document.getElementById("f_msg_iri").submit();
}
function mgr_shok(shoku){
    var kat;
    kat=document.getElementById("sele_sh_"+shoku).selectedIndex;	
	switch (kat){
		case 4:window.location.replace("shoqeria.php?fshi="+shoku);break;
		
	}
}
