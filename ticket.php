<?php
$name=$_POST["name"];
$address=$_POST["add"];
$phone=$_POST["pnum"];
$email=$_POST["email"];
$maara=$_POST["maara"];
header('Location: tour.php');

$yhteys = mysqli_connect("localhost", "trtkp20a3", "trtkp20a3passwd");

if (!$yhteys) {
    die("Yhteyden muodostaminen epäonnistui: " . mysqli_connect_error());
}

$tietokanta=mysqli_select_db($yhteys, "trtkp20a3");

if (!$tietokanta) {
    die("Tietokannan valinta epäonnistui: " . mysqli_connect_error());
}

$sql="insert into dmt_tickets(nimi, osote, puhnmr, sposti, maara) values(?, ?, ?, ?, ?)";
$stmt=mysqli_prepare($yhteys, $sql);
mysqli_stmt_bind_param($stmt, "ssisi", $name, $address, $phone, $email, $maara);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
mysqli_close($yhteys);
exit;
?>

<?php
function anyError($level, $message){
    print "ERROR: ".$message."<br>";
}
?>

