<?php

$to = "kancelaria@alfa-silesia.pl"; // Replace with your email address
$subject = "Wiadomosc od ".ucwords($_POST['name']); // Enter the subject here.



//Validating email addres
$email = $_POST['email'];

function validateEmail($email)
{
   if(eregi('^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$', $email))
	  return true;
   else
	  return false;
}


//Validates the required fields
if((strlen($_POST['name']) < 1 ) || (strlen($email) < 1 ) || (strlen($_POST['message']) < 1 ) || validateEmail($email) == FALSE){
	$emailerror .= true;


} else {

	$emailerror .= false;

	
//Composing the email
	$email_message =
		"Imie: " . ucwords($_POST['name']) . "\n" .
		"Email: " . $email . "\n" .
		"Temat: " . $subject . "\n" .
		"Wiadomosc: " . "\n" . $_POST['message'] . "\n";
	
//Sending the email
	mail($to, $subject, $email_message);
}

?>

<?php 

if($emailerror == true) {
	echo '<span style="font-size:16px; color:#C6001F;">Proszę o wypełnienie wszystkich pól.</span>';
}
else
{
	echo '<span style="font-size:16px; color:#008000;">Wiadomość została wysłana. Odpowiemy tak szybko, jak to możliwe!</span>';
}	


?>
