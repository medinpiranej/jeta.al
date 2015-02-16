<?php

    if (isset($_COOKIE["jetaid"])){
       include 'te_perfshira/lexoDB.php';
	   include 'te_perfshira/func.php';
	   $id=$_COOKIE["jetaid"];
	   $kat="shoqeria";
	   try{
           $lidhjar = new PDO("mysql:host=$srv;dbname=$db", $dbuser, $dbpass);
           $perdorues=exec_query("Select * FROM perdorues WHERE id='$id'", $lidhjar);
          if (empty($perdorues))header("Location: login.php?gab=true");
	    
		  if(isset($_GET['nj'])){
		       if (isset($_GET['ref']))exec_query("DELETE FROM {$id}njoftime where tipi=1 and derguesi=".$_GET['ref'], $lidhjar);
			   else if (isset($_GET['prano'])){ shto_shok($id,$_GET['prano'],$_GET['nj'],2, 5, $lidhjar); }
			}
		  if(isset($_GET['bllok']))blloko_shok($id,$_GET['bllok'],$lidhjar);
		  if(isset($_GET['zhblloko']))zhblloko_shok($id,$_GET['zhblloko'],$lidhjar);
		  if(isset($_GET["fshi"]))fshi_shok($id,$_GET["fshi"], $lidhjar);
		  if(isset($_GET["fshi_f"]))fshi_shok($id,$_GET["fshi_f"], $lidhjar);
		  if(isset($_GET["fto"]))fto_shok($id,$_GET["fto"], $lidhjar);
		  if(isset($_GET["src"])){
		  	  if($_GET["src"]=="kerko")
		  	   	   if(isset($_GET["txt"]))header("Location: kerko.php?txt=".$_GET["txt"]);
				   else header("Location: kerko.php?txt=");
			  
		  }
          include 'te_perfshira/koka_faqes.php';
          ?> <div class="trupi">
         	  <div class="kat_p" id="p_m"><!-- Paneli majtas -->
         	  	<div class="njoftime" id="nj_koka"><!-- divi i Emrit te panelit -->
         	  		Te rejat e fundit ...
         	  	</div>
         	  	<?php echo shfaq_njoftimet(1,$perdorues[0]["id"],1,$nr_ftesa,$lidhjar);
         	  	      echo shfaq_njoftimet(1,$perdorues[0]["id"],2,$nr_pranime,$lidhjar);?>
         	  </div>
         	
          <div class="kat_p" id="p_mes"><!-- Paneli Mesit -->
          	    <?php if($nr_ftesa>0)echo "<h2 class='f_titull'>Ftesa per Shoqerim</h2>";
          	          echo shfaq_ftesat(1, $id, 0,20, 0, $lidhjar);
         	  	      echo shfaq_ftesat(1, $id, 0,20, 1, $lidhjar);
         	  	      if((numro($id,"shoke","*", $lidhjar))!=0)echo "<h2 class='f_titull'>Shoket</h2>";
         	  	      echo shfaq_shoket(1, $id, 0, 20, 2, 5, $lidhjar);
         	  	       ?>
         	   
          </div><!-- Mbarimi i divit ne qender -->
          <div class="kat_p" id="p_d"><!-- Divi i panelit djathtas -->
         	  <div class="njoftime" id="nj_koka"><!-- divi i Emrit te panelit -->
         	  		Shkesi ...
         	  	</div>
         	  	<div class="njoftime" id="njoftim">
         	  		<img valign="top" class="nj_mrena" width="25px" height="25px">
         	  	    <div  class="nj_mrena" id="nj_txt"> Medin piranej ju ka dergua ftese per shopqerim ! </div>
         	  	</div>
         </div><!-- Fundi i panelit djathas -->
      </div><!-- fundi i divit te trupit -->
   </body>
</html>
<?php $lidhjar = null;}catch(PDOException $e){echo $e->getMessage();header("Location: login.php?gab=true");}}else header("Location: login.php");?>
