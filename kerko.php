<?php

    if (isset($_COOKIE["jetaid"])){
       include 'te_perfshira/lexoDB.php';
	   include 'te_perfshira/func.php';
	   $id=$_COOKIE["jetaid"];
	   $kat="Rezultatet e kerkimit";
	   //shtova koment
	   try{
           $lidhjar = new PDO("mysql:host=$srv;dbname=$db", $dbuser, $dbpass);
           $perdorues=exec_query("Select * FROM perdorues WHERE id='$id'", $lidhjar);
          if (empty($perdorues))header("Location: login.php?gab=true");
	      if(isset($_GET['txt']))$txt=$_GET['txt'];
		  
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
          	    <?php 
          	        echo kerko($id, $txt, $lidhjar);
          	       
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
