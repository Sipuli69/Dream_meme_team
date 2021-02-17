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

    $message =  "Name:". " " . $fname . "\n" . "Country:" . " " . $country . "\n" . "Phone:" . " " . $phonenumber .  "\n" . "Are you awesome?:" . " " . $checkbox . "\n\n" . $_POST['message'];
    $message2 = "Here is a copy of your message" . "\n" . "Name:". " " . $fname . "\n" . "Country:". " " . $country . "\n" . "Phone:" . " " . $phonenumber . "\n" . "Are you awesome?:" . " " . $checkbox . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers); // lähettää vastaanottajalle
    mail($from,$subject2,$message2,$headers2); // lähettää kopion lähettäjälle
    header('Location: contact.html');
    }

}
?>

<?php
// Ladatun kuvan tallentaminen
// Määritetään kohdekansio, johon ladatut tiedostot tulevat:
$target_dir = "kuvat/";

// Tiedoston lataus ja tiedoston tarkastaminen:
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Tarkista onko tiedosto aito
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "Tiedosto on aito - " . $check["mime"] . ".";
        // $uploadOk = 1;
    } else {
        echo "Tiedosto on epäaito.";
        $uploadOk = 0;
    }
}

// Onko tiedosto jo olemassa
if (file_exists($target_file)) {
    echo " Tiedosto on jo olemassa.";
    $uploadOk = 0;
}

// Tarkistetaan tiedoston koko, tiedostoa ei ladata jos se on yli 200kb
if ($_FILES["fileToUpload"]["size"] > 2000000) {
    echo "Tiedosto on liian suuri.";
    $uploadOk = 0;
}

// Sallitaan JPG, JPEG, PNG ja GIF-tiedostot
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
    echo "Tiedosto ei ole JPG, JPEG, PNG tai GIF- tiedosto.";
    $uploadOk = 0;
}

// Tarkista jos $uploadOk on asetettu arvoksi 0 virheen vuoksi
if ($uploadOk == 0) {
    echo " Tiedostoa ei ladattu.";

    // Yritetään ladata tiedosto
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
    } else {
        echo "Virhe tiedoston lataamisessa.";
    }
}
?>

