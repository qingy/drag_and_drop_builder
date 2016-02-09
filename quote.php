<?php

	define('INCLUDE_CHECK',1);
	require "connect.php";

	if(!$_POST)
	{
		if($_SERVER['HTTP_REFERER'])
		header('Location : '.$_SERVER['HTTP_REFERER']);

		exit;
	}

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


	<script type="text/javascript" src="validation/jquery.js"></script>
	<script type="text/javascript" src="validation/jquery.validate.js"></script>
	<script type="text/javascript">
		$().ready(function() {
			// validate #form_contact on submit
			$("#form_contact").validate({
				rules: {
					name: {
						required: true,
						minlength: 2
					},
					email: {
						required: true,
						email: true
					},
					phone: {
						required: true,
						digits: true
					},
					product_selection: {
						required: true,
						minlength: 5
					}
				},
				messages: {
					name: "Please enter your full name.",
					email: "Please enter a valid email address.",
					phone: "Please enter a valid phone number.",
					product_selection: "Please choose one or more system parts."
				}
			});
		});
	</script>

</head>

<body>

<div id="main-container">

	<!------------------------------------------------------------
		PARTS LISTING
	------------------------------------------------------------>

    <div class="container">

    	<span class="tab-heading">
            <span class="label-text">Your Selected Parts</span>
        </span>

        <div class="content-area">

    		<div class="content">

                <?php
					$cnt = array();
					$products = array();

					foreach($_POST as $key=>$value) {
						$key=(int)str_replace('_cnt','',$key);

						$products[]=$key;
						$cnt[$key]=$value;
					}

					$result = mysql_query("SELECT * FROM system_parts WHERE id IN(".join($products,',').")");

					if(!mysql_num_rows($result)) {
						echo '<h3>There was an error with your selection!</h3>';
					} else {
						echo '<h3>You selected:</h3><ul>';

						ob_start();


						while( $row=mysql_fetch_assoc($result) ) {
							echo '<li><span>'.$cnt[$row['id']].' x <strong>'.$row['name'].'</strong></span></li>';
						}

						echo '</ul>';
					}

					$productSelection = ob_get_contents();
					$productSelection = str_replace('</li>', "\n", $productSelection); // replace html new lines with reg new lines
					$productSelection = strip_tags($productSelection); // Remove all html tags

				?>

       	        <div class="clear"></div>
            </div><!-- /.content -->

        </div><!-- /.content-area -->

        <div class="bottom-container-border"></div>

    </div><!-- /.container -->

	<!------------------------------------------------------------
		CONTACT FORM
	------------------------------------------------------------>

    <div class="container">

    	<span class="tab-heading">
            <span class="label-text">Your Contact Information</span>
        </span>

        <div class="content-area">

    		<div class="content">

				<form id="form_contact" name="form_contact" action="form_send.php" method="post">
					<input type="text" name="name" placeholder="Full Name*"/>
					<input type="text" name="email" placeholder="Email*"/>
					<input type="text" name="phone" placeholder="Phone (digits only)*"/>

					<textarea name="product_selection" hidden="hidden"><?php echo $productSelection ?></textarea>

					<div class="clear"></div>

					<input type="submit" value="Get a FREE Quote!" id="submit" />
				</form>

       	        <div class="clear"></div>
            </div><!-- /.content -->

        </div><!-- /.content-area -->

        <div class="bottom-container-border"></div>

		<br />

		<a href="#" onclick="history.go(-1);return false;">&laquo; Go Back</a>

    </div><!-- /.container -->


</div><!-- /.main-container -->

</body>
</html>