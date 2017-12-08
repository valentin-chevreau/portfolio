<?php
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['phone']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "E-mail non valide. Veuillez vérifier votre saisie s'il vous plaît.";
	return false;
   }

else {
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));
	
// Create the email and send the message
$to = 'contact@valentinchevreau.fr'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Prise de contact de la part de $name";
$email_body = "$name souhaite prendre contact avec toi.\n\n"."Voici les informations pour la recontacter : \n\nName : $name\n\nEmail: $email_address\n\nPhone :  $phone\n\nMessage : \n$message";
$headers = "From: noreply@valentinchevreau.fr\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To : $email_address";	
mail($to,$email_subject,$email_body,$headers);

echo "Votre message m'est bien parvenu.<br>Je m'engage à vous répondre sous 72h au plus. <br> Merci pour votre confiance. <br>Cordialement,<br>Valentin CHEVREAU<br><br> Vous allez être redirigé vers la page d'accueil de mon site dans quelques instants <meta http-equiv='refresh' content='5;url=http://www.valentinchevreau.fr'/>";
    
    return true;

}
?>
