<?php

    if (isset($_COOKIE["jetaid"])){
       include 'te_perfshira/lexoDB.php';
	   include 'te_perfshira/func.php';
	   $id=$_COOKIE["jetaid"];
	   $kat="Mesazhe";
	   try{
           $lidhjar = new PDO("mysql:host=$srv;dbname=$db", $dbuser, $dbpass);
           $perdorues=exec_query("Select * FROM perdorues WHERE id='$id'", $lidhjar);
           if (empty($perdorues))header("Location: login.php?gab=true");
		   
		  
		  include 'te_perfshira/koka_faqes.php';
          ?>
           <div class="trupi">
         	  <div class="kat_p" id="p_m"><!-- Paneli majtas -->
         	  	<div class="njoftime" id="nj_koka"><!-- divi i Emrit te panelit -->
         	  		Biseda
         	  	</div>
         	  	<?php echo shfaq_bis($id,-1, $lidhjar); ?>
         	  </div>
         	
          <div class="kat_p" id="p_mes"><!-- Paneli Mesit -->
          	    
          	    <?php 
          	    
          	    if(isset($_GET["marresi"]))echo msg_i_ri($id,$_GET["marresi"],-1,$lidhjar);
				else if(isset($_GET["iri"]))echo msg_i_ri($id,-1,-1,$lidhjar);
				else if(isset($_GET["bis"]))echo shfaq_bis($id,$_GET["bis"],$lidhjar);
				elseif (isset($_POST["h_marresi"])) {
					echo nis_mesazh($id,$_POST["h_marresi"],$_POST["id_bis"],$_POST["h_msg"], $lidhjar);
				}
				else echo "<h2>&nbsp;&nbsp;Zgjidhni nje bisede ...<br><h2><h3>&nbsp;&nbsp;&nbsp;Ose dergo nje mesazh :</h3>".msg_i_ri($id,-1,-1,$lidhjar);
				
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
         <!-- Fundi i faqes-->
         <?php echo fundi();?>
      </div><!-- fundi i divit te trupit -->
   </body>
</html>
<?php $lidhjar = null;}catch(PDOException $e){echo $e->getMessage();header("Location: login.php?gab=true");}}else header("Location: login.php");?>
