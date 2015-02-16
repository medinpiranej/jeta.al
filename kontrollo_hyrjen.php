<?php
if(isset($_POST["login_email"])&&isset($_POST["login_pass"])){
$email=$_POST["login_email"];
$pass=$_POST["login_pass"];
if(($email!="")&&($pass!="")){
	include 'te_perfshira/lexoDB.php';
	include 'te_perfshira/func.php';
	
	
	$query="Select * FROM perdorues WHERE email='$email'";
	try 
    {
    $lidhjar = new PDO("mysql:host=$srv;dbname=$db", $dbuser, $dbpass);

    $res = $lidhjar->prepare($query);
	$res->execute();
	
    $perdorues=$res->FetchAll();
    if (empty($perdorues))header("Location: login.php?gab=true&paemail=1");
	    
		if($perdorues[0]["pas"]==$pass){
		
     	if(setcookie("jetaid",$perdorues[0]["id"],time()+3600))header("Location: shtepia.php");
	    else echo "Nje gabim ne rregjistrimin e Cookies";
	
	   
	    }else header("Location: login.php?gab=true");


    $lidhjar = null;
}
catch(PDOException $e)
{
    echo $e->getMessage();
		header("Location: login.php?gab=true");
}
	   
	 
	

	
}else header("Location: login.php");
}else header("Location: login.php");

?>