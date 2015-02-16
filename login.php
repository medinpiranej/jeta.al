<?php if (isset($_COOKIE["jetaid"])&&!isset($_GET["gab"]))header("Location: shtepia.php");?>
<!DOCTYPE html>
<html>
	<head>
		<title>Miresevini | jeta.al</title>
		<script type="text/javascript" src="js/login.js"></script>
		<link rel='stylesheet' type="text/css" href='css/stile_login.css'>
	</head>
	<body align="middle" valign="middle">
		<h1>
			Miresevini Ne Jeta.AL
		</h1>
		<center>
	   <table height="100%" width="1024px" >
		<tr>
	   
		
	
	    <td align="right" width="500px" valign="top" style="border-right: 1px;">
	    <h2 align="middle" valign="top">Hyni ne faqe ...</h2>
	    <form class="logintxt" method="post" action="kontrollo_hyrjen.php" id="form_login">
	    
		<span id="lemail">Jepni Emailin : </span><input type="text" class='inputlogintext' spellcheck="false" name="login_email" id="idemail"/><br>
		<span id="lpas">Jepni Paswordin : </span><input type="password" class='inputlogintext' name="login_pass" id="idpas" value=""/><br>
		
		<input type="button" value="Hyr!" class='loginbut' id="but_login" onclick="kontrollo_login()" />
		<?php
		if(isset($_GET["gab"]))
		if ($_GET["gab"]==TRUE)echo "<h2 style='color:red;'>Kujdes !!! Te dhena te pa sakta !</h2>";
		?>
		</form>
		
		</td>
		<td align="right">
		
		<h2 align="middle">
			Rregjistrohu ne Faqe ...
		</h2>
		<form class="logintxt" method="post" action="rregjistrohu.php" id="form_signup">
		<span id="semri">Jepni Emrin : </span><input type="text"  class="inputlogintext" name="signup_emri" id="idemri" value=""/><br/>
		<span id="smbiemri">Jepni Mbiemrin : </span><input type="text" class="inputlogintext" name="signup_mbiemri" id="idmbiemri" value=""/><br/>
		<span id="semail">Jepni Emailin : </span><input type="text" autocomplete="off" class="inputlogintext" name="signup_email" id="idemail2" value=""/><br/>
		<span id="spas">Jepni Paswordin : </span><input type="password" class="inputlogintext"  name="signup_pass" id="idpas2" value=""/><br/>
		
		<input type="button" value="Rregjistrohu!"  class='loginbut' name="but_signup" id="but_signup" onclick="kontrollo_signup()" />
		</form>
		
		</td>
		</tr>
		
		
	
		
		
		</table>
			<br>
		<p>&copy;&nbsp;Medin Piranej</p>
	
		</center>
	</body>
</html>