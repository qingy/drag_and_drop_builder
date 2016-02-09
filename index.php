<?php

	define('INCLUDE_CHECK',1);
	require "connect.php";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Build Your Own Pump System | Company Co.</title>

	<link rel="stylesheet" type="text/css" href="style.css" />

	<!--[if lt IE 7]>
	<style type="text/css">
		.pngfix { behavior: url(pngfix/iepngfix.htc);}
	    .tooltip{width:200px;};
	</style>
	<![endif]-->

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.21/jquery-ui.min.js"></script>
	<script type="text/javascript" src="simpletip/jquery.simpletip-1.3.1.pack.js"></script>
	<script type="text/javascript" src="script.js"></script>
	<script type="text/javascript" src="mobile.min.js"></script>
</head>

<body>

<div id="main-container">

	<header>
	    <h1>Build Your Own Pump System</h1>
	    <h2>Company Co.</h2>
    </header>

	<!------------------------------------------------------------
		AVAILABLE PARTS
	------------------------------------------------------------>
    <div class="container">
    	<span class="tab-heading">
            <span class="label-text">Available Parts</span>
        </span>

        <div class="content-area">

    		<div class="content drag-desired">

                <?php
					$result = mysql_query("SELECT * FROM system_parts");
					while( $row=mysql_fetch_assoc($result) ) {
						echo '<div class="product"><img src="img/products/'.$row['img'].'" alt="'.htmlspecialchars($row['name']).'" width="128" height="128" class="pngfix" /></div>';
					}
				?>

       	        <div class="clear"></div>
            </div><!-- /.content drag-desired -->

        </div><!-- /.content-area -->

        <div class="bottom-container-border"></div>
    </div><!-- /.container -->

	<!------------------------------------------------------------
		USER SELECTION
	------------------------------------------------------------>
    <div class="container">

    	<span class="tab-heading">
            <span class="label-text">Your Selection</span>
        </span>

        <div class="content-area">

    		<div class="content drop-here">
            	<div id="cart-icon">
	            	<img src="img/Shoppingcart_128x128.png" alt="shopping cart" class="pngfix" width="128" height="128" />
					<img src="img/ajax_load_2.gif" alt="loading..." id="ajax-loader" width="16" height="16" />
                </div>

				<form name="checkoutForm" method="post" action="quote.php">
	                <div id="item-list"></div>
				</form>

                <div class="clear"></div>

                <a href="" onclick="document.forms.checkoutForm.submit(); return false;" class="button">Get a FREE Quote!</a>

    		</div><!-- /.content drag-desired -->

        </div><!-- /.content-area -->

        <div class="bottom-container-border"></div>

    </div><!-- /.container -->

</div><!-- /#main-container -->

</body>
</html>