			function kontrollo_login(){
				var ok_email=true,ok_pass=true;
		        if(document.getElementById("idemail").value==""){document.getElementById("sle").innerHTML="*";ok_email=false;}
		        else{document.getElementById("sle").innerHTML="";ok_email=true;}
		        if(document.getElementById("idpas").value==""){document.getElementById("slp").innerHTML="*";ok_pass=false;
		        }else{document.getElementById("slp").innerHTML="";ok_pass=true;}
				
				if(ok_pass&&ok_email)document.getElementById("form_login").submit();
			}
			function kontrollo_signup(){
			    var ok_email=false,ok_pass=false,ok_emri=false,ok_mbiemri=false,emri,mbiemri,email,pas;
				emri=document.getElementById("idemri");
				mbiemri=document.getElementById("idmbiemri");
				email=document.getElementById("idemail2");
				pas=document.getElementById("idpas2");
				
				
				if((emri.value=="")||(emri.value==" "))document.getElementById("semri").style.color="#ff0000";
				else {ok_emri=true;document.getElementById("semri").style.color="#000000";}
		        if((mbiemri.value=="")||(mbiemri.value==" "))document.getElementById("smbiemri").style.color="#ff0000";
				else {ok_mbiemri=true;document.getElementById("smbiemri").style.color="#000000";}
			
				
				if((email.value=="")||(email.value==" "))document.getElementById("semail").style.color="#ff0000";
				else {ok_email=true;document.getElementById("semail").style.color="#000000";}
		        if((pas.value=="")||(pas.value==" "))document.getElementById("spas").style.color="#ff0000";
				else {ok_pass=true;document.getElementById("spas").style.color="#000000";}
				
				
				
				
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
