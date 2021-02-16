<?php
$servername = "localhost";
$username = "trtkp20a3";
$passwd = "trtkp20a3passwd";
$dbname = "trtkp20a3";

$yhteys = new mysqli($servername, $username, $passwd, $dbname);
if ($yhteys->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "select * from dmd_gigs";
$tulos = $conn->query($sql);

if($tulos->num_rows > 0) {
    print "<table><tr><th>Date</th><th>Place</th></tr>";
    while($row = $result->fetch_assoc()) {
        print "<tr><th> ".$row["pvmr"]."</th><th>". $row["paikka"]."</th></tr>";
    }
    print"</table>";
} else {
    print "No gigs";
}
$yhteys->close();
?>