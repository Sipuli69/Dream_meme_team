<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Toni Nurmi, Anna-Maria Palm, Oliver Parkkonen">
    <meta name="description"
        content="B-O's artist site - new star and interesting lifestory. Many hit songs, tour etc. Women, bravely take contact!">
    <title>BLANKo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' media='screen' href='css/main.css'> 
</script> 
</head>

<body>
    <div class="container">
        <div class="row">
            <!--Navbar:-->
            <div id="navbar">
                <nav class="navbar navbar-expand-sm navbar-dark">
                    <a class="navbar-brand" href="index.php"><img src="images/BOO.png" alt="blanko"></a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php#home">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php#news">News</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php#samples">Music</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="bio.html">Bio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="tour.php">Tour</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact.php">Contact</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <!--end-->

            <div class="main" id="home">
                <img src="images/pic2.jpg" alt="oliveri"
                    style="max-width: 100%; position: fixed; left: 0px; z-index:-5; padding-top: 60px; object-fit: cover;">
            </div>

            <div class="main" id="news"><br><br><br>
                <h2>News</h2>


                <p>02/02/21<br>
                    Today is a big day in our lifes. Today. This project. Is done. We wish BlanKoliver good luck and
                    fantastic gigs in the future! hopefully there will be lots of new songs and magnificent tours.
                    However, do not forget us now: Be tuned - later in the spring we'll hold a pilgrimage to Lahti.
                    BlanKoliver will introduce his old hoods to us. We'll see for example Radiomäki and Satama.
                    Pilgrimage costs only 20,- so thats an awesome opportunity for all truefans. BlanKoliver says that
                    he's gonna "laittaa kaikki nippuun!"</p>

                <p>25/01/21<br>
                    BlanKoliver's weekend led to new opportunities. There is now interesting new collaborative patterns
                    pending. We can reveal that in the next summer we'll see BlankOliver in Ruisrock and Blockfest. More
                    information about that in the next week! Also BlanKoliver's autobiography -"I'm the king of Lahti"-
                    will
                    be published! The book contains new delicious revalations of B-O's life; like how he spends his
                    spare
                    time, what is his favourite color and who is his cocaine dealer etc. If you want to be a part of
                    this awesome book, let us know
                    and contact us. Especially women, bravely take contact with form in the <a href="contact.html"
                        target="_blank">contact-page!</a></p>

                <p>22/01/21<br>
                    Oliver is going to go to the Vantaa! Be aware!</p>

                <p>21/01/21<br>
                    Some new crazy shit is coming... Stay tuned!</p>

                <p>24/12/20<br>
                    This crazy awesomeness has started now!</p>

            </div>

            <div class="main" id="samples">
                <h2>Music</h2>
                <img src="images/cover.jpg" alt="hampton">
                <div id="song_1">
                    <h3>Chicago</h3>
                    <p><i>My first song about the place, that is closest to my heart.</i></p>
                    <audio controls>
                        <source src="images/Sample1.mp3" type="audio/mp3">
                        <p>Change browser you absolute buffoon.</p>
                    </audio>
                    <p><br><small><i>Did you love the sample?</i></small></p>
                    <div id="wrapperDiv">
                        <!--  peukut: -->
                        <input type="image" id="tu" src="images/tu.png" alt="Submit" OnClick="this.disabled=true;document.getElementById('td').disabled=true;" width="13" heigth="20">
                        &#160;&#160;&#160;&#160;&#160;
                        <input type="image" id="td" src="images/td.png" alt="Submit" OnClick="this.disabled=true;document.getElementById('tu').disabled=true;" width="13" heigth="20">
                    </div>

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
$yhteys->close();
?>

<?php
$yhteys = mysqli_connect("localhost", "trtkp20a3", "trtkp20a3passwd");
if (!$yhteys) {
    die("Yhteyden muodostaminen epÃ¤onnistui: " . mysqli_connect_error());
}
$tietokanta=mysqli_select_db($yhteys, "trtkp20a3");
if (!$tietokanta) {
    die("Tietokannan valinta epÃ¤onnistui: " . mysqli_connect_error());
}
//lasketaan down votesit ja tallennetaan $downv.
$downv=mysqli_query($yhteys, "select sum(down) as countd from annamaria20101_li");
while ($resultd=mysqli_fetch_array($downv))
{
echo $resultd['countd'];
}
$yhteys->close();
?>


                    <!-- scripti / lähetetään thumb.php:lle postina peukkujen painallukset.
	                annetaan yläpeukulle value "a-up" ja alapeukulle "b-down".
	            -->
                    <script>
                        $(document).ready(function(){
                            $("#tu").click(function(){
                                $.post("thumb.php",
                                    {
                                        value: "a-up"
                                    });
                            });
                            $("#td").click(function(){
                                $.post("thumbd.php",
                                    {
                                        value2: "b-down"
                                    });
                            });
                        });
                    </script>
                </div>
            </div>
            <!--Footer-->
            <div class="footer">
                <p><a href="dokumentti.docx" style="color:rgb(212, 210, 208);">&copy; DreamMemeTeam:<br> load the document about the project:</a></p>
            </div>
        </div>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>

</body>

</html>