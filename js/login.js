			function kontrollo_login(){
				var ok_email=true,ok_pass=true;
		        if(document.getElementById("idemail").value==""){document.getElementById("sle").innerHTML="!";ok_email=false;}
		        else{document.getElementById("sle").innerHTML="";ok_email=true;}
		        if(document.getElementById("idpas").value==""){document.getElementById("slp").innerHTML="!";ok_pass=false;
		        }else{document.getElementById("slp").innerHTML="";ok_pass=true;}
				if(ok_pass&&ok_email)document.getElementById("form_login").submit();
			}
			function kontrollo_signup(){
			    var ok_email,ok_pass,ok_emri,ok_mbiemri;
				if(document.getElementById("idemail2").value==""){document.getElementById("srem").innerHTML="!";ok_email=false;}
		        else{document.getElementById("srem").innerHTML="";ok_email=true;}
		        if(document.getElementById("idpas2").value==""){document.getElementById("srp").innerHTML="!";ok_pass=false;
		        }else{document.getElementById("srp").innerHTML="";ok_pass=true;}
				if(document.getElementById("idemri").value==""){document.getElementById("sre").innerHTML="!";ok_emri=false;}
		        else{document.getElementById("sre").innerHTML="";ok_emri=true;}
		        if(document.getElementById("idmbiemri").value==""){document.getElementById("srm").innerHTML="!";ok_mbiemri=false;
		        }else{document.getElementById("srm").innerHTML="";ok_mbiemri=true;}
				if(ok_pass&&ok_email&&ok_emri&&ok_mbiemri)document.getElementById("form_signup").submit();
			}
function kontrollo_submit(){
        if(aktivtext(10)){
        	document.getElementById('submittextid').value=document.getElementById('idtextarea').value;
        	document.getElementById("formid").submit();
        }
}
$(document).ready(function(){
	var hap=false;
	$("#bRegjister").click(function() {
		if(!$hapurRegjister){
				$(".regjsterForm").slideDown('normal');
				$hapurRegjister=true;
		}else{
				$(".regjsterForm").slideUp('normal');
				$hapurRegjister=false;
		}
	
		
	});
	
});
function hapu(menu){
	if(menu==1){$(".login").slideUp('normal');
	$(".rregjistrohu").slideDown('normal');}
	else{
	     $(".login").slideDown('normal'); 
	     $(".rregjistrohu").slideUp('normal');}
	
}
