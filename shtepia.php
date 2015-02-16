<?php

    if (isset($_COOKIE["jetaid"])){
       include 'te_perfshira/lexoDB.php';
	   include 'te_perfshira/func.php';
	   $id=$_COOKIE["jetaid"];
	   $kat="shtepia";
	   try{
           $lidhjar = new PDO("mysql:host=$srv;dbname=$db", $dbuser, $dbpass);
           $perdorues=exec_query("Select * FROM perdorues WHERE id='$id'", $lidhjar);
           if (empty($perdorues))header("Location: login.php?gab=true");
	       if(isset($_POST["postimi"])){posto($id,$_POST["postimi"],5,$kat,$lidhjar);}
	      
          include 'te_perfshira/koka_faqes.php';
?>
         <div class="trupi">
         	  <div class="kat_p" id="p_m"><!-- Paneli majtas -->
         	  	<div class="njoftime" id="nj_koka"><!-- divi i Emrit te panelit -->
         	  		Te rejat e fundit ...
         	  	</div>
         	  	<?php echo shfaq_njoftimet(1,$perdorues[0]["id"],1,$nr_ftesa,$lidhjar);
         	  	      echo shfaq_njoftimet(1,$perdorues[0]["id"],2,$nr_pranime,$lidhjar);
         	  	 ?>
         	  </div>
         	
         	  <div class="kat_p" id="p_mes"><!-- Paneli Mesit -->
         	  	<div > <!-- Forma per te postuar  -->
         	  	   <form method='post' action="shtepia.php" id='f_posto' align="right">
         	  	      <img width="50px" height="50px" valign="top" src="<?php echo $perdorues[0]["f_profili"];?>" />
				      <textarea placeholder="Cfare jeni duke menduar ..." id='txtpostim' style='resize: vertical;' spellcheck='false'></textarea>
				      <input type='hidden' value='' name='postimi' id='i_postimi'/>
				      <input type='hidden' value=<?php echo "'$id'"; ?> name='autori' id='i_autori'/>
			          <!--<input type='hidden' value='' name='n_privatesise' id='i_n_privatesise'/> -->
				      <br><input type='button' id="but" value='Posto !' onclick='posto()' />
			       </form>
         	  	</div>
         	   <?php echo shfaq_postimet(1,$id,0,20, $lidhjar);?>
         	   <div class="fundi">Medin Piranej</div>
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