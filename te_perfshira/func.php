<?php
function exec_query($query,$lidhjar){$res=$lidhjar->prepare($query);$res->execute();return $res->FetchAll();}
function gen_adr($link){$adresa_plote="http://localhost/jeta.al/"; return "'".$adresa_plote.$link."'";}
function shfaq_njoftimet($vendi,$id,$tipi,$nr_njoftimesh,$lidhjar){
		   $njoft=exec_query("SELECT perdorues.id as id,emri,mbiemri,f_profili,${id}njoftime.id as n_id,derguesi FROM `${id}njoftime` join perdorues on derguesi=perdorues.id where tipi=$tipi order by upa", $lidhjar);
		   $i=0;$html_njoftim="";
		   if(!empty($njoft)){
		   $msg="<a href='profili.php?id={$njoft[$i]["derguesi"]}' class='a_njoftimi'>{$njoft[$i]["emri"]} {$njoft[$i]["mbiemri"]}</a> ";
		   switch($vendi){
				case 1:
				case 3:
				       switch($tipi){
				       case 1:$msg.="Ju ka derguar ftese per shoqeri !";
						      $kat="Ftesa per shoqeri ";
				              $html_njoftim.="<div class='njoftime' id='nj_kat'>$kat ";
		                      if(!empty($nr_njoftimesh))$html_njoftim.="<font>".$nr_njoftimesh."</font></div>";
					          else $html_njoftim.="</div>";
						      while (!empty($njoft[$i]["derguesi"])){
		   		              $html_njoftim.="<div class='njoftime' id='njoftim'><a href='profili.php?id={$njoft[$i]["derguesi"]}'><img valign='top' src='{$njoft[$i]["f_profili"]}' class='nj_mrena' width='25px' height='25px'></a><div  class='nj_mrena' id='nj_txt'>$msg</div><div id='nj_komanda'><a class='a_njoftimi'  href='shoqeria.php?prano=".$njoft[$i]["derguesi"]."&nj=".$njoft[$i]["n_id"]."'>Prano</a> | <a class='a_njoftimi' href='shoqeria.php?ref=".$njoft[$i]["derguesi"]."&nj=".$njoft[$i]["n_id"]."'>Fshije</a> | <a class='a_njoftimi' href='shoqeria.php?bllok=".$njoft[$i]["derguesi"]."&nj=".$njoft[$i]["n_id"]."'>Blloko</a></div></div>";
	  	             	      $i++;} break;
                       case 2:$msg.="ka Pranuar ftesen tuaj per shoqeri !";
						      $kat="Miqesi te reja ";
                              $html_njoftim.="<div class='njoftime' id='nj_kat'>$kat ";
		                      if(!empty($nr_njoftimesh))$html_njoftim.="<font>".$nr_njoftimesh."</font></div>";
					          else $html_njoftim.="</div>";
						      while (!empty($njoft[$i]["derguesi"])){
		   		              $html_njoftim.="<div class='njoftime' id='njoftim'><a href='profili.php?id={$njoft[$i]["derguesi"]}'><img valign='top' src='{$njoft[$i]["f_profili"]}' class='nj_mrena' width='25px' height='25px'></a><div  class='nj_mrena' id='nj_txt'>$msg</div><div id='nj_komanda'><a class='a_njoftimi'  href='mesazhe.php?marresi=".$njoft[$i]["derguesi"]."'>Dergo Mesazh</a></div></div>";
	  	             	      $i++;}break;
	               	   
                        } break;
			}}
return $html_njoftim;	  		
}
function shfaq_postimet($vendi,$id,$lim_1,$lim_2,$lidhjar){
	$postim=exec_query("SELECT * FROM `{$id}postime` join perdorues on {$id}postime.autori=perdorues.id order by {$id}postime.data desc limit $lim_1 , $lim_2", $lidhjar);
	$html_postime="";$i=0;
	if(empty($postim))$html_postime.="<div id='p_ska'>Nuk Ka Postime !</div>";
	else
	while (!empty($postim[$i]["autori"])){
	$data=date_create($postim[$i]["data"]);
	$data=date_format($data, 'H:i d-m-Y');
	$html_postime.="<div class='postim'> <!-- Kutia e postimit --><a href='profili.php?perd={$postim[$i]["autori"]}'><img class='p_koka' width='50px' height='50px' src='{$postim[$i]["f_profili"]}'/></a><div class='p_koka'><div id='p_emri'>{$postim[$i]["emri"]}</div><div style='padding-left: 5px;'>{$postim[$i]["mbiemri"]}</div></div><div class='p_koka' id='p_ora' >$data</div><div class='postimi' id='pa_foto'><br><br><br><hr>{$postim[$i]["postimi"]}</div></div>";
    $i++;
	}
return $html_postime;	  		
}
function shfaq_ftesat($vendi,$id,$lim_1,$lim_2,$upa,$lidhjar){
	     $ftesa=exec_query("SELECT perdorues.id as id,emri,mbiemri,f_profili,{$id}njoftime.id as n_id,derguesi FROM `{$id}njoftime` join perdorues on derguesi=perdorues.id where tipi=1 and upa=$upa", $lidhjar);
		 $html_ftesa="";
		 $i=0;
		   	while (!empty($ftesa[$i]["derguesi"])){
		   	  $html_ftesa.="<div class='postim'> <!-- Kutia e fteses --><a href='profili.php?perd={$ftesa[$i]["id"]}'><img class='p_koka' width='50px' height='50px' src='{$ftesa[$i]["f_profili"]}'/></a><div class='p_koka'><div id='p_emri'>
		   	  {$ftesa[$i]["emri"]}</div><div style='padding-left: 5px;'>{$ftesa[$i]["mbiemri"]}</div></div>
		   	  <div class='p_koka' id='f_komanda'><a class='a_njoftimi'  href='shoqeria.php?prano={$ftesa[$i]["id"]}&nj={$ftesa[$i]["n_id"]}'>Prano</a> | 
		   	  <a class='a_njoftimi' href='shoqeria.php?ref={$ftesa[$i]["id"]}&nj={$ftesa[$i]["n_id"]}'>Fshije</a> | <a class='a_njoftimi'  href='mesazhe.php?marresi=".$ftesa[$i]["derguesi"]."'>Dergo Mesazh</a> | <a class='a_njoftimi' href='shoqeria.php?bllok=".$ftesa[$i]["id"]."&nj=".$ftesa[$i]["n_id"]."'>Blloko</a></div><div class='postimi'><br><br><br></div></div>";
	  	   	$i++;
		   }
return $html_ftesa;	  		
}
function shfaq_shoket($vendi,$id,$lim_1,$lim_2,$n_shoqerise,$n_privatesise,$lidhjar){
	     $shoke=exec_query("SELECT * FROM `{$id}shoke` join perdorues on shoku=id where n_shoqerise>=$n_shoqerise", $lidhjar);
		 $html_shoket="";
		 $i=0;
		   	while (!empty($shoke[$i]["id"])){
		   	  $html_shoket.="<div class='postim'> <!-- Kutia e shokut --><a href='profili.php?perd={$shoke[$i]["id"]}'><img class='p_koka' width='50px' height='50px' src='{$shoke[$i]["f_profili"]}'/></a><div class='p_koka'><div id='p_emri'>
		   	  {$shoke[$i]["emri"]}</div><div style='padding-left: 5px;'>{$shoke[$i]["mbiemri"]}</div></div>
		   	  <div class='p_koka' id='f_komanda'>
		   	  <select id='sele_sh_{$shoke[$i]["id"]}' onchange='mgr_shok({$shoke[$i]["id"]})'>
		   	      <option>Shoket</option>
		   	      <option>I njohur</option>
		   	      <option>Te afermit</option>
		   	      <option>Shoket e ngushte</option>
		   	      <option onclick='' >Fshije</option>
		   	      <option>Blloko</option>
		   	  </select> | <a class='a_njoftimi'  href='mesazhe.php?marresi=".$shoke[$i]["id"]."'>Dergo Mesazh</a>
		   	  </div><div class='postimi'><br><br><br></div></div>";
	  	   	$i++;
		   }
return $html_shoket;	  		
}
function numro($id,$tab,$nje_rresht,$lidhjar){
	$tmp=exec_query("select count($nje_rresht) as nr from {$id}{$tab}", $lidhjar);
	if(!empty($tmp))return $tmp[0]["nr"];
    else return 0; 
}
function shto_shok($id,$id_shokut,$njoftim,$n_shoqerise,$n_privatesise,$lidhjar){
	    //fshihet njoftimi  i profilit aktual
		exec_query("DELETE FROM {$id}njoftime WHERE id =$njoftim", $lidhjar);
	    // e shtojme ne tabelen aktuale shokun e ri
        exec_query("INSERT INTO {$id}shoke (`shoku`, `n_privatesise`, `n_shoqerise`) VALUES ('$id_shokut', '$n_privatesise', '$n_shoqerise')", $lidhjar);
        // çojme njoftim te shoku qe ftesa e tij esht pranuar
	    exec_query("INSERT INTO {$id_shokut}njoftime (`tipi`, `derguesi`, `data`, `tipi2`, `upa`) VALUES ('2', '$id', CURRENT_TIMESTAMP, '0', '0')", $lidhjar);
        // rrisim nivelin e privatesise dhe miqesise me shokun qe na ka qu ftes 
        exec_query("UPDATE {$id_shokut}shoke SET n_shoqerise =2,n_privatesise=5 WHERE shoku=$id", $lidhjar);
        //Kopjojme postimet ne menyre qe miqte e rinj te shohin postimet e njeri tjetrit
        exec_query("INSERT INTO {$id}postime Select null as id,autori,postimi,data,n_privatesise from {$id_shokut}postime where autori=$id_shokut", $lidhjar);
        exec_query("INSERT INTO {$id_shokut}postime Select null as id,autori,postimi,data,n_privatesise from {$id}postime where autori=$id", $lidhjar);
}
function fshi_shok($id,$id_shokut,$lidhjar){
	    // fshijme te gjitha postimet ne tabelen tone dhe te shokut
        exec_query("DELETE FROM {$id}postime where autori={$id_shokut}", $lidhjar);
        exec_query("DELETE FROM {$id_shokut}postime where autori={$id}", $lidhjar);
        // Fshijeme te gjitha njoftimet nga tablea aktuale dhe e shokut
        exec_query("DELETE FROM {$id}njoftime where derguesi={$id_shokut}", $lidhjar);
        exec_query("DELETE FROM {$id_shokut}njoftime where derguesi={$id}", $lidhjar);
		// Fshijme te dhe nat e miqesise se shokve
        exec_query("DELETE FROM {$id}shoke where shoku={$id_shokut}", $lidhjar);
        exec_query("DELETE FROM {$id_shokut}shoke where shoku={$id}", $lidhjar);
}
function posto($id,$postimi,$n_privatesise,$kat,$lidhjar){
     $postimi=pergatit($postimi);
	 
	 $shoke=exec_query("Select * FROM {$id}shoke ", $lidhjar);
	 exec_query("INSERT INTO `{$id}postime` (`autori`, `postimi`, `data`, `n_privatesise`) VALUES ('{$id}', '$postimi', CURRENT_TIME(), '$n_privatesise');", $lidhjar);
	 $i=0;
	 while(!empty($shoke[$i]["shoku"])){
	 	//shtojme postimin ne murin e shokut ...
	 	exec_query("INSERT INTO `{$shoke[$i]['shoku']}postime` (`autori`, `postimi`, `data`, `n_privatesise`) VALUES ('{$id}', '$postimi', CURRENT_TIME(), '$n_privatesise');", $lidhjar);
	 	$i++;
	 }
	 
	 	
}
function pergatit($txt){
	 $txt=addslashes($txt);
	 $txt=str_replace("&","&amp;", $txt);
	 $txt=str_replace("<","&lt;", $txt);
	 $txt=str_replace(">","&gt;", $txt);
	 $txt=str_replace("\"","&quot;", $txt);
	 $txt=str_replace("\n","<br>", $txt);
	 return $txt;
}
function blloko_shok($id,$id_shokut,$lidhjar){
	// fshijme shokun
	fshi_shok($id, $id_shokut, $lidhjar);
	// e shtojme ne listen e shokeve tane shoku  qe do te bllokojm me qellim qe te kemi mundesi ta zhbllokojme prap
	exec_query("INSERT INTO {$id}shoke (`shoku`, `n_privatesise`, `n_shoqerise`) VALUES ('$id_shokut', '1', '0')", $lidhjar);
    // shtojme ne liste shokun qe kena blloku 
    exec_query("INSERT INTO {$id_shokut}shoke (`shoku`, `n_privatesise`, `n_shoqerise`) VALUES ('$id', '0', '0')", $lidhjar);
}
function zhblloko_shok($id,$id_shokut,$lidhjar){
	// fshijme shokun dhe me kete menyre fshihen te gjtha lidhjet me te
	fshi_shok($id, $id_shokut, $lidhjar);
}
function fto_shok($id,$id_shokut,$lidhjar){
	exec_query("INSERT INTO {$id}shoke (`shoku`, `n_privatesise`, `n_shoqerise`) VALUES ('{$id_shokut}', '0', '1');", $lidhjar);
    exec_query("INSERT INTO {$id_shokut}njoftime (`tipi`, `derguesi`, `data`, `tipi2`, `upa`) VALUES ('1', '{$id}', CURRENT_TIMESTAMP, '0', '0');",$lidhjar);
}
function kerko($id,$txt,$lidhjar){
	       $html_rez="";
		   $strpos=stripos($txt,"@");
		   if($strpos>-1){
              $rez=exec_query("SELECT * FROM perdorues where email='$txt'",$lidhjar);
		      if(empty($rez)){
		      	$html_rez.="<h2>Nuk u gjet gje me infromacionin e dhene !";
		      	$html_rez.="<br>kontrolloni te dhenat ...</h2>";
			  }
		   else {
		       $i=0;
			   $html_rez.="<h2>Rezultatet e kerkimit</h2>";
			   $n_sh=-1;
			   $n_p=0;
			   while (!empty($rez[$i]["id"])){
		   	   $temp=exec_query("SELECT * FROM {$id}shoke where shoku=".$rez[$i]['id'], $lidhjar);
		       if(!empty($temp)){$n_sh=$temp[0]['n_shoqerise'];$n_p=$temp[0]['n_privatesise'];} // ne rast se i kan ra bllok #####
			   $html_rez.="<div class='postim'> <!-- Kutia e shokut --><a href='profili.php?perd={$rez[$i]["id"]}'><img class='p_koka' width='50px' height='50px' src='{$rez[$i]["f_profili"]}'/></a><div class='p_koka'><div id='p_emri'>
		   	   {$rez[$i]["emri"]}</div><div style='padding-left: 5px;'>{$rez[$i]["mbiemri"]}</div></div>
		   	   <div class='p_koka' id='f_komanda'>";
		   	      $fshi_ftesen="<a class='a_njoftimi' href='shoqeria.php?fshi_f={$rez[$i]["id"]}&src=kerko&txt=$txt'>Anulo Ftesen</a>";
			      $blloko="<a class='a_njoftimi' href='shoqeria.php?bllok={$rez[$i]["id"]}&src=kerko&txt=$txt'>Blloko</a>";
			   	  $zhblloko="<a class='a_njoftimi' href='shoqeria.php?zhblloko={$rez[$i]["id"]}&src=kerko&txt=$txt'>Zhblloko</a>";
			   	  $dergo_mszh="<a class='a_njoftimi'  href='mesazhe.php?marresi={$rez[$i]["id"]}'>Dergo Mesazh</a>";
		   	      $dergo_ftese="<a class='a_njoftimi' href='shoqeria.php?fto={$rez[$i]["id"]}&src=kerko&txt=$txt'>Dergo Ftese</a>";
				  $prano="<a class='a_njoftimi'  href='shoqeria.php?prano={$rez[$i]["id"]}&src=kerko&txt=$txt'>Prano Ftesen</a>"; 
		   	      $fshije="<a class='a_njoftimi' href='shoqeria.php?fshi={$rez[$i]["id"]}&src=kerko&txt=$txt'>Fshije</a>";
                  if($n_sh==1)$html_rez.=$fshi_ftesen." | ".$dergo_mszh." | ".$blloko; 			   
			      if($n_sh>1)$html_rez.=$dergo_mszh." | ".$fshije." | ".$blloko;
				  if($n_sh<0)$html_rez.=$dergo_ftese." | ".$dergo_mszh." | ".$blloko;
				  if($n_sh==0)if($n_p==1)$html_rez.=$zhblloko;
		   	      $html_rez.="</div><div class='postimi'><br><br><br></div></div>";
			   $i++;
		   	    }
			}
		   $i=0;
		  }
		  
		return $html_rez;}
function listo_bisedat($id,$id_bis,$lidhjar){
	$b_html="";
	$bised=exec_query("SELECT * FROM {$id}mesazhe join perdorues on perd1=id or perd2=id order by data", $lidhjar);
    if(empty($bised))return "";
    
    
  
	return $b_html;
	}
function msg_i_ri($id,$id_marresi,$lidhjar){
	$e="";
	if($id_marresi!=-1)$marresi=exec_query("SELECT * FROM perdorues where id=$id_marresi", $lidhjar);
	$e.="<div class='postim' > <!-- Forma e mesazhit hapes  --><form method='post' action='mesazhe.php' id='f_msg_iri'><font>Per : </font>";
    if(!empty($marresi[0]["id"]))$e.="<input spellcheck='false' type='text' value='{$marresi[0]["emri"]} {$marresi[0]["mbiemri"]}' name='e_marresi'><input type='hidden' value='{$marresi[0]["id"]}' name='h_marresi'>";   
	else $e.="<input spellcheck='false' type='text' value='' name='e_marresi'><input type='hidden' value='0' name='h_marresi'>";   
    $e.="<input type='hidden' name='h_msg' value=''><textarea spellcheck='false' placeholder='Mesazhi Juaj ...' id='msg'></textarea>";     	
	$e.="<br><input type='button' id='but_msg_iri' value='Dergo !' onclick='dergo_msg_iri()' /></form></div>";
	return $e;
};
?>