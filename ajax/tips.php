<?php

	define('INCLUDE_CHECK',1);
	require "../connect.php";

	if(!$_POST['img']) die("There is no such product!");

	$img=mysql_real_escape_string(end(explode('/',$_POST['img'])));

	$row=mysql_fetch_assoc(mysql_query("SELECT * FROM system_parts WHERE img='".$img."'"));

	if(!$row) die("There is no such product!");

	echo '<strong class="yellow">'.$row['name'].'</strong>

	<p class="descr">'.$row['description'].'</p>

	<small>Drag me to the cart under <strong>Your Selection</strong>!</small>';
?>
