<?php
$yhteys = mysqli_connect("localhost", "trtkp20a3", "trtkp20a3passwd");
if (!$yhteys) {
    die("Yhteyden muodostaminen epÃ¤onnistui: " . mysqli_connect_error());
}
$tietokanta=mysqli_select_db($yhteys, "trtkp20a3");
if (!$tietokanta) {
    die("Tietokannan valinta epÃ¤onnistui: " . mysqli_connect_error());
}
//lasketaan down votesit ja tulostetaan downvotet $downv.
$downv=mysqli_query($yhteys, "select sum(down) as countd from annamaria20101_li");
while ($resultd=mysqli_fetch_array($downv))
{
echo $resultd['countd'];
}

// session alku:
session_start();


// tallennetaan valuet (b-down painallukset) $value2:een.
$value2=$_POST["value2"];

//Yritetään saada up-äänelle arvo 1 sitä painettaessa ja down-äänelle 0 ja toisinpäin
if($value2[b-down]) {
    $up=0;
    $down=1;
}

//Seuraavaksi pitäisi tallentaa näitä tietoja tietokantaan..
$yhteys = mysqli_connect("localhost", "trtkp20a3", "trtkp20a3passwd");
if (!$yhteys) {
    die("Yhteyden muodostaminen epÃ¤onnistui: " . mysqli_connect_error());
}
$tietokanta=mysqli_select_db($yhteys, "trtkp20a3");
if (!$tietokanta) {
    die("Tietokannan valinta epÃ¤onnistui: " . mysqli_connect_error());
}
//uusien arvojen lisääminen tietokantaan
$sql="insert into annamaria20101_li(up,down) values(?,?)";

$stmt=mysqli_prepare($yhteys, $sql);
mysqli_stmt_bind_param($stmt, 'ii', $up, $down);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
mysqli_close($yhteys);

exit;
?>






