<?php
$name=$_POST["name"];
$address=$_POST["add"];
$phone=$_POST["pnum"];
$email=$_POST["email"];
$place=$_POST["place"];

$yhteys = mysqli_connect("localhost", "trtkp20a3", "trtkp20a3passwd");

if(!$yhetys) {
    die("Connection failed: " . mysqli_connect_error());
    exit;
}
$tietokanta=mysqli_select_db($yhteys, "trtkp20a3");

if(!$tietokanta) {
    die("Connecting to database failed: " . mysqli_connect_error());
    exit;
}
$sql="insert into dmd_tickets(nimi, osote, puhnmr, sposti, paikka) values(?, ?, ?, ?, ?)";
$stmt=mysqli_prepare($yhteys, $sql);
mysqli_stmt_bind_param($stmt, "sssss", $name, $address, $phone, $email, $place);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
mysqli_close($yhteys);
exit;
?>