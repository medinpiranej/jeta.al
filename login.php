<?php if (isset($_COOKIE["jetaid"])&&!isset($_GET["gab"]))header("Location: shtepia.php");?>
<!DOCTYPE html>
<html>
	<head>
		<title>Miresevini | jeta.al</title>
		<script type="text/javascript" src="js/login.js"></script>
		<link rel='stylesheet' type="text/css" href='css/stile_login.css'>
	</head>
	<body>
	<div class="login_f">
	    <div class='miresevini'><font style="font-size: 30px;">Shkesi.tk</font><br>Miresevini , Jepni te dhenat tuaja ...</div>
	    <div class="login">
	    <form class="logintxt" method="post" action="kontrollo_hyrjen.php" id="form_login">
	    
		<input type="text" placeholder="Email ..." class='inputlogintext' spellcheck="false" name="login_email" id="idemail"/><span id="sle" class="gabim"></span>
        <input type="password" placeholder="Pasword ..." class='inputlogintext' name="login_pass" id="idpas" value=""/><span id="slp" class="gabim"></span><br>
		
		<a onclick="hapu(1)">Rregjistrohu !</a><input type="button" value="Hyr!" class='loginbut' id="but_login" onclick="kontrollo_login()" />
		
		</form>
		</div>
		<div class="rregjistrohu">
		<form class="logintxt" method="post" action="rregjistrohu.php" id="form_signup">
		<input type="text"  class="inputlogintext"  placeholder="Emri ..."   name="signup_emri" id="idemri" value=""/><br/>
		<input type="text" class="inputlogintext"  placeholder="Mbiemri ..."  name="signup_mbiemri" id="idmbiemri" value=""/><br/>
		<input type="text" class="inputlogintext"  placeholder="Email ..."  name="signup_email" id="idemail2" value=""/><br/>
		<input type="password" class="inputlogintext" placeholder="Fjalekalimi ..."  name="signup_pass" id="idpas2" value=""/><br/>
		
		<a id='a2' onclick="hapu(2)">Jam i rregjistruar !</a><input type="button" value="Rregjistrohu!" class='loginbut' name="but_signup" id="but_signup" onclick="kontrollo_signup()" />
		</form>
		</div>
	    </div>
	</div>
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    </body>
</html>