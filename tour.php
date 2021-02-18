<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tour</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' media='screen' href='css/main.css'>
    <link rel='stylesheet' type='text/php' media='screen' href='/tour.php'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        function showPopup() {
            document.getElementById('blackOverlay').style.display = 'block'; // lightbox
            document.getElementById('popup').style.display = 'block';
        }

        function closePopup() {
            document.getElementById('blackOverlay').style.display = 'none';
            document.getElementById('popup').style.display = 'none';
        }
    </script>
    <script type="text/javascript">
        // Check if the page has loaded completely                                         
        $(document).ready(function() {
            $('#some_id').load('php-file.php');
        });
    </script>
</head>

<body id="tourpage">
    <div class="container">
        <div class="row">
            <!--Navbar:-->
            <div id="navbar">
                <nav class="navbar navbar-expand-sm navbar-dark">
                    <a class="navbar-brand" href="index.html"><img src="images/BOO.png" alt="blanko"></a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                                <a class="nav-link" href="contact.html">Contact</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="main" id="pic">
                <img src="images/pic4.jpg" alt="oliveri" style="max-width: 100%; position: fixed; left: 0px; z-index:-5;">
            </div>
            <div class="main" id="tour">
                <h2 style="padding-top:50px;">TOUR</h2>
                <br>
                <table class="tabl" style="width:100%">
                    <!-- PHP ALKAA !-->
                    <?php
                    header('Content-type: text/html; charset=utf-8');

                    $yhteys = mysqli_connect("localhost", "trtkp20a3", "trtkp20a3passwd", "trtkp20a3"); //muodostaa yhteyden annetuilla tiedoilla
                    if ($yhteys->connect_error) { //tarkistaa yhteyden
                        die("Connection failed: " . $yhteys->connect_error); //jos ei ole yhteyttä
                    }

                    mysqli_set_charset($yhteys, "utf8mb4"); //ääkköset

                    $sql = "select * from dmt_gigs order by pvmr desc"; //mitä tulostetaan ja mistä tablesta ja missä järjestyksessä
                    $tulos = $yhteys->query($sql);

                    if ($tulos->num_rows > 0) { //jos on enemmän ku 0 riviä infoo
                        while ($row = $tulos->fetch_assoc()) { //niin kauan ku löytyy uusia tulostettavia rivejä, nii lista jatkuu
			    print "<tr>";
                            print "<td><b>" . date("d.m.Y", strtotime($row["pvmr"])) . "</b></td>"; //tulostaa päivämäärän dd.mm.yyyy muodossa
                            print "<td><b>" . $row["paikka"] . "</b></td>"; //tulostaa osoitteen

                            if (date("Y-m-d") > $row["pvmr"]) { //onko päivämäärä mennyt jo?
                                print "<th><button class=ticket_button disabled>Tickets</button></th>"; //disabled nappi
                            } else {
                                print "<th><button class=ticket_button onclick=showPopup()>Tickets</button></th>"; //toimiva nappi joka kutsuu lightboxia
                                print "<div id='blackOverlay' class='blackOverlay'></div>";
                                print "<div id='popup' class='popup'>";
                                print "<span class='closePopup' onclick='closePopup()'>X</span>"; //lightboxin sulkunappi
                                print "<h2 style='padding-top: 30px;'>Submit your information:</h2>";
                                print "<form method='POST' action='ticket.php'>";
                                print "<label for='name'>Name:</label><br>";
                                print "<input type='text' name='name' value='' placeholder='Your name...' required><br>";
                                print "<label for='add'>Address:</label><br>";
                                print "<input type='text' name='add' value='' placeholder='Your address...' required><br>";
                                print "<label for='pnum'>Phone number:</label><br>";
                                print "<input type='text' name='pnum' value='' placeholder='Your phone number...' required><br>";
                                print "<label for='email'>Email:</label><br>";
                                print "<input type='text' name='email' value='' placeholder='Your email...' required><br>";
                                print "<label for='maara'>Amount of tickets:</label><br>";
                                print "<input type='number' name='maara' min='1' value='1' onKeyDown='return false' required><br>";
                                print "<br><br>";
                                print "<input type='checkbox' id='terms' name='terms' value='terms' required>";
                                print "<label for='terms'>Agree to <a id='terms' href='https://en.wikipedia.org/wiki/Terms_of_service' target='_blank'>terms and conditions</a>.</label> <br><br>";
                                print "<input type='submit' value='Buy a ticket.'>";
                                print "</form>";
                                print "</div>";
                            }
                            print "</tr>";
                        }
                        print "</table>";
                    } else {
                        print "No gigs!"; //jos ei ole yhtään keikkoja
                    }

                    $yhteys->close();
                    ?>

            </div>
            <div class="footer">
                <p>&copy; DreamMemeTeam</p>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>