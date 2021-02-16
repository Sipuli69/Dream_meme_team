<?php 
if(isset($_POST['email']) && $_POST['email'] != ''){ // Tarkistaa että sähköposti kenttä ei ole tyhjä

    if( filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ){ // Sähköposti osoite on varmasti sähköposti

    $to = "oliverparkkonen@hotmail.com"; // Johon sähköposti lähetetään
    $from = $_POST['email']; // Lähetäjän sähköposti
    $phonenumber = $_POST['phonenumber'];
    $fname = $_POST['fname'];
    $country = $_POST['country'];
    $checkbox = $_POST['checkbox'];
    $subject = "Form submission";
    $subject2 = "Copy of your form submission";

    $message =  "Name:". " " . $fname . "\n" . "Country:" . " " . $country . "\n" . "Phone:" . " " . $phonenumber .  "\n" . "You are awesome?:" . " " . $checkbox . "\n\n" . $_POST['message'];
    $message2 = "Here is a copy of your message" . "\n" . "Name:". " " . $fname . "\n" . "Country:". " " . $country . "\n" . "Phone:" . " " . $phonenumber . "\n" . "You are awesome?:" . " " . $checkbox . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers); // lähettää vastaanottajalle
    mail($from,$subject2,$message2,$headers2); // lähettää kopion lähettäjälle
    header('Location: contact.html');
    }

}
?>