<?php

    if (isset($_COOKIE["jetaid"])){
       include 'te_perfshira/lexoDB.php';
	   include 'te_perfshira/func.php';
	   $id=$_COOKIE["jetaid"];
	   $kat="shtepia";
	   try{
           $lidhjar = new PDO("mysql:host=$srv;dbname=$db", $dbuser, $dbpass);
            $query="Select * FROM perdorues WHERE id='$id'";
           $res = $lidhjar->prepare($query);
	      $res->execute();
	
          $perdorues=$res->FetchAll();
          if (empty($perdorues))header("Location: login.php?gab=true");
	    
	
          include 'te_perfshira/koka_faqes.php';
		  echo "<table class='trupi' width='1000px' height='100%'><tr><td valign='top' width='150px'>";
          include 'te_perfshira/paneli.php';
		  echo "</td><td style=' padding-right: 15px'>";
          include 'te_perfshira/postime.php';
		  echo "</td><td width='250px'>";
          include 'te_perfshira/shkesi.php';
		  echo "</td></tr></table>";
          

          include 'te_perfshira/fundi_faqes.php';	


          $lidhjar = null;
}
catch(PDOException $e){echo $e->getMessage();header("Location: login.php?gab=true");}}else header("Location: login.php");?>