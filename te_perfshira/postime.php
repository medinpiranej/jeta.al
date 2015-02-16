<table>
	<tr>
		<td width='150px' valign='top'>Posto dicka ne profilin tend :</td>
		<td align='right'>
			<form method='post' action="posto.php" id='f_posto'>
				<textarea cols='62' id='txtpostim' style='resize: vertical;' spellcheck='false'rows='5' resizable='false'></textarea>
				<input type='hidden' value='' name='postimi' id='i_postimi'/>
				<input type='hidden' value=<?php echo "'$id'"; ?> name='autori' id='i_autori'/>
			    <!--<input type='hidden' value='' name='n_privatesise' id='i_n_privatesise'/> -->
				
				<input type='button' value='Posto !' onclick='posto()' />
			</form>
		</td>
	</tr>
</table>
<hr>
<?php 
          try{
           $query="SELECT * FROM `{$id}postime` join perdorues on {$id}postime.autori=perdorues.id order by {$id}postime.data desc limit 20";
		   
           $res = $lidhjar->prepare($query);
	       $res->execute();
		   $postim=$res->FetchAll();
		   
		   
		   
		   $i=0;
		   if(empty($postim)){
		   	  echo "Nuk Ka Postime !";
		   }else{
		   	while (!empty($postim[$i]["autori"])){
		    $data=date_create($postim[$i]["data"]);
		   	$data=date_format($data, 'H:i d-m-Y');
                #output: 2012-03-24 17:45:12
		   		
		   	echo"<table width='650px' class='postim'><tr height='50px' ><td valign='top' width='50px' >
			<img width='50px' height='50px' src='".$postim[$i]["f_profili"]."' /> </td><td width='100px'><font style='font-size: 30px;'>
			".$postim[$i]["emri"]."	
			</font><br>
			".$postim[$i]["mbiemri"]."
	    	</td><td align='right'><p>Postuar : $data<p/></td></tr><tr><td ></td><td></td><td>
	    	".$postim[$i]["postimi"]."
		    </td></tr></table>";
	  	   	$i++;
		   	}
			
			
		   }
		   
		   
		  }catch(PDOException $e1){
		  	echo $e1->getMessage();
		  }
		  
?>echo"<div class='postim'>
         	  		<a href='profili.php?perd=".$postim[$i]["autori"]."'><img class='p_koka'  width='50px' height='50px' src='".$postim[$i]["f_profili"]."' /></a>
         	  		<div class='p_koka'>
         	  			<div style='font-size: 30px;width:400;padding-left: 5px;'>".$postim[$i]["emri"]."</div>
         	  			<div style='padding-left: 5px;'>".$postim[$i]["mbiemri"]."</div>
         	  		
                    </div>
                    <div class='p_koka' id='p_ora' >
                    	$data
                    </div>
                    <div class='postimi' id='pa_foto'>
                          ".$postim[$i]["postimi"]."                  	
                    </div>
         	  	</div>";
