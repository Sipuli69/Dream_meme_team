<?php
// session alku:
session_start();

 
$yhteys = mysqli_connect("localhost", "trtkp20a3", "trtkp20a3passwd");
if (!$yhteys) {
    die("Yhteyden muodostaminen epÃ¤onnistui: " . mysqli_connect_error());
}
$tietokanta=mysqli_select_db($yhteys, "trtkp20a3");
if (!$tietokanta) {
    die("Tietokannan valinta epÃ¤onnistui: " . mysqli_connect_error());
}
//lasketaan up-votesit ja tallennetaan ne $upv-muuttujaan.

$upv=mysqli_query($yhteys, "select sum(up) as countu from annamaria20101_li");
while ($result=mysqli_fetch_array($upv))
{
echo $result['countu'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
}



// tallennetaan valuet (a-up painallukset) $valueen.
$value=$_POST["value"];

//Yritetään saada up-äänelle arvo 1 sitä painettaessa ja down-äänelle 0 ja toisinpäin
if($value[a-up]) {
    $up=1;
    $down=0;
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
$sql="insert into annamaria20101_li(up, down) values(?,?)";

$stmt=mysqli_prepare($yhteys, $sql);
mysqli_stmt_bind_param($stmt, 'ii', $up, $down);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
mysqli_close($yhteys);



exit;
?>




