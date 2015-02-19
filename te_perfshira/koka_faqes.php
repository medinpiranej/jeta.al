<?php
      $nr_ftesa=exec_query("Select count(id) as nr from {$perdorues[0]["id"]}njoftime where upa=false and tipi=1", $lidhjar);
      if (empty($nr_ftesa))$nr_ftesa=0; else $nr_ftesa=$nr_ftesa[0]["nr"];
	 
      $nr_pranime=exec_query("Select count(id) as nr from {$perdorues[0]["id"]}njoftime where upa=false and tipi=2", $lidhjar);
      if (empty($nr_pranime))$nr_pranime=0;else $nr_pranime=$nr_pranime[0]["nr"];
	  
	  $nr_mszh=exec_query("Select count(id) as nr from {$perdorues[0]["id"]}mesazhe where upa=false", $lidhjar);
      if (empty($nr_mszh))$nr_mszh=0;else $nr_mszh=$nr_mszh[0]["nr"];
	  
	  $total_sh=0;
	  if(!empty($nr_ftesa))$total_sh=$nr_ftesa;
	  if(!empty($nr_pranime))$total_sh+=$nr_pranime;
?>
<!DOCTYPE html>
<html>
	<head>
		<title>jeta</title>
		<script type='text/javascript' src='js/js_kryesore.js'></script>
		<link rel='stylesheet' type='text/css' href='./css/stile_kryesore.css' />
		<link rel='stylesheet' type='text/css' href='./css/font/flaticon.css' />
	</head>
	<body>
			<header>
				<div class='koka' id='i_logo'>
					<a href='shtepia.php'><img src='imazhe/logo.png' width='300px' height='100px'  /></a>
				</div>
				<div class='koka'>
					<table height='100px' width='695px'>
						<tr>
							<td width='50px' valign='top'>
					<a href='profili.php'><img width='50px' height='50px' src='<?php echo $perdorues[0]['f_profili'];?>' /></a>
				    </td><td align='left' valign='top'>	
					<div style='font-size: 30px;'>
					    <?php echo $perdorues[0]['emri'];?>
					</div>
					<div>
				    	<?php echo $perdorues[0]['mbiemri'];?>
				    </div>
				</td><td align='right' valign='top' width='450px'>
				    <input type='text' placeholder='Kerko ...' id='txtkerko' value='<?php if (isset($txt))echo $txt; ?>' /><br><input type='button' id='but' value='Kerko !' onclick='kerko()' />
				</td>
				</tr>
				</table>
				</div>
				<div class='hmenu' id='mKryefaqja' onclick='klikmenu(10)'>
					<span class='flaticon-home156'></span>
					<p>Kryefaqja</p>
				</div>
				<div class='hmenu' id='mMesazhe'>
					<span class='flaticon-edit46'><?php if(!empty($nr_mszh))echo '<font>'.$nr_mszh.'</font>' ?></span>
					<p>Mesazhet</p>
					<ul>
						<li onclick='klikmenu(21)'>I RI</li>
						<li onclick='klikmenu(22)'>Te ardhur <?php if(!empty($nr_mszh))echo "<font>$nr_mszh</font>";?></li>
						<li onclick='klikmenu(23)'>Te Derguar </li>
						<li onclick='klikmenu(24)'>Grupe</li>
					</ul>
				</div>
				<div class='hmenu'id='mProfili' onclick='klikmenu(30)'>
					<span class='flaticon-male80'></span>
					<p>Profili</p>
				</div>
				<div class='hmenu'id='mShoqeria'>
					<span class='flaticon-social108'><?php if($total_sh>0)echo "<font>$total_sh</font>";?></span>
					<p>Shoqeria</p>
						<ul>
						<li onclick='klikmenu(41)'>Shoket</li>
						<li onclick='klikmenu(42)'>Ftesat <?php if(!empty($nr_ftesa))echo "<font>$nr_ftesa</font>";?></li>
						<li onclick='klikmenu(43)'>Te Rinj <?php if(!empty($nr_pranime))echo "<font>$nr_pranime</font>";?></li>
						<li onclick='klikmenu(44)'>Shkesi</li>
					</ul>
				</div>
				<div class='hmenu' id='mRregullime' >
					<span class='flaticon-cogwheel'></span>
					<p>Rregullime</p>
					<ul>
						<li onclick='klikmenu(51)'>Rregullo</li>
						<li onclick='klikmenu(52)'>Privatsia</li>
						<li onclick='klikmenu(53)'>Dil</li>
					</ul>
				</div>
				<div class='hmenu' id='mhapsire'>
					</div>
				
</header>