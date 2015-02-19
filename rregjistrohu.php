<?php
if(isset($_POST["signup_emri"])&&isset($_POST["signup_mbiemri"])&&isset($_POST["signup_email"])&&isset($_POST["signup_pass"])){
$emri=$_POST["signup_emri"];	
$mbiemri=$_POST["signup_mbiemri"];
$email=$_POST["signup_email"];
$pass=$_POST["signup_pass"];
if(($emri!="")&&($mbiemri!="")&&($email!="")&&($pass!="")){
	include 'te_perfshira/lexoDB.php';
	
	mysql_connect($srv,$dbuser,$dbpass);
	mysql_select_db($db);
	
	$result=mysql_query("SELECT * FROM perdorues WHERE email='$email'");
	
	if($person=mysql_fetch_array($result))header("Location: login.php?em_ekz=true");
	else{
	$query="INSERT INTO $tabela (`email`, `pas`, `emri`, `mbiemri`,`f_profili`) VALUES ('$email','$pass','$emri', '$mbiemri','perd/defprofil.jpg');";
	
	mysql_query($query) or header("Location: login.php?gab=true");
	$query="Select * FROM $tabela WHERE email='$email'";
	$result=mysql_query($query);
	
	$person=mysql_fetch_array($result);


/* Krijohet tabela pe foto*/
mysql_query("CREATE TABLE IF NOT EXISTS `".$person["id"]."foto` (
  `id` int(11) NOT NULL,
  `adr` varchar(20) NOT NULL,
  `data` datetime NOT NULL,
  `pelqime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;") or die("NK mujti me hap tabel");

/* Krijohet tabela per  mesazhe */
mysql_query("CREATE TABLE IF NOT EXISTS `".$person["id"]."mesazhe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `perd1` int(11) NOT NULL,
  `perd2` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `upa` tinyint(1) NOT NULL,
  `biseda` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;") or die("NK mujti me hap tabel");

/* Krijohet tabela per  postime */
mysql_query("CREATE TABLE IF NOT EXISTS `".$person["id"]."postime` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `autori` int(11) DEFAULT NULL,
  `postimi` text,
  `data` datetime  NOT NULL,
  `n_privatesise` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;") or die("NK mujti me hap tabel");

/* Krijohet tabela per shoket */
mysql_query("CREATE TABLE IF NOT EXISTS `".$person["id"]."shoke` (
  `shoku` int(11) NOT NULL,
  `n_privatesise` tinyint(4) NOT NULL,
  `n_shoqerise` tinyint(4) NOT NULL,
  `data` datetime NOT NULL,
  PRIMARY KEY (`shoku`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;") or die("NK mujti me hap tabel");

/* Krijohet tabela per njoftimet */
mysql_query("CREATE TABLE IF NOT EXISTS `".$person["id"]."njoftime` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipi` tinyint(4) DEFAULT '0',
  `derguesi` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `tipi2` tinyint(4) DEFAULT '0',
  `upa` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;") or die("NK mujti me hap tabel");
	
	if(setcookie("jetaid",$person["id"],time()+3600))
	header("Location: index.php?reg_me_sukses=1");
	else {
		echo "Nje gabim ne rregjistrimin e Cookies";
	}
	}
}else header("Location: login.php?gab=true");
}else header("Location: login.php?gab=true");

?>
