<?php

//Retrieve data from form and create variables
$name = Trim(stripslashes($_POST['name']));
$email = Trim(stripslashes($_POST['email']));
$phone = Trim(stripslashes($_POST['phone']));
$product_selection = Trim(stripslashes($_POST['product_selection']));

////////////START EMAIL

$EmailFrom = "noreply@company.com";
$EmailTo = "recipient@email.com";
$Subject = "Company Co. Build Your Own System Quote Request";

// validation
$validationOK=true;
if (!$validationOK) {
  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.php\">";
  exit;
}

// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $name;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $email;
$Body .= "\n";
$Body .= "Phone: ";
$Body .= $phone;
$Body .= "\n";
$Body .= "Parts: ";
$Body .= "\n";
$Body .= $product_selection;

$Body .= "\n";

// send email
$success = mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>");

////////////END EMAIL

//CleanUp function
CleanUp();

//Redirect user to thank you page
if ($success){
  print "<meta http-equiv=\"refresh\" content=\"0;URL=thanks.php\">";
}
else{
  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.php\">";
}

exit;

//CleanUp function to free up memory
function CleanUp() {
	$name = "";
	$email = "";
	$phone = "";
}

?>