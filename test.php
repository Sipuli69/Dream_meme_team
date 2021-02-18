<?php

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

?>