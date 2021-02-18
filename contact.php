<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Me</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' media='screen' href='css/main.css'>


    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script>
      $(function () {

        $('form').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: 'submit.php',
            data: $('form').serialize(),
            success: function () {
              alert('Kiitos, viesti on lähetetty!');
            }
          });

        });

      });
    </script>

</head>


<body>
    <div class="container">
        <div class="row">
            <!--Navbar:-->
            <div id="navbar">
                <nav class="navbar navbar-expand-sm navbar-dark">
                    <a class="navbar-brand" href="index.html"><img src="images/BOO.png" alt="blanko"></a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="index.html#home">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.html#news">News</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.html#samples">Music</a>
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
            <!--End of navbar-->
            <div class="main" id="pic">
                <img src="images/pic3.jpg" alt="oliveri"
                    style="max-width: 110%; position: fixed; left: 0px; z-index:-5;">
            </div>

            <div class="row">
                <div class="col-sm-5" id="contact">
                    <h1 style="padding-top: 50px;">CONTACT</h1><br><br>

                    <h4>BlanKoliver MANAGEMENT & BOOKING WORLDWIDE</h4>

                    <p>B-O TOURING AND MANAGEMENT, Kristof B : BlanKoliver@gmail.com</p><br>

                    <h4>BOOKING FINLAND</h4>

                    <p>B-O Agency, TonY N :
                        BlanKoliver@gmail.com</p><br>

                    <h4>PROMOTION</h4>

                    <p>Finland/Worldwide, Ansku P :
                        BlanKoliver@gmail.com
                    </p><br>

                    <h4>WEBSITE & GRAPHICS</h4>

                    <p> Tony N<br>
                        Ansku P<br>
                        Oliver P<br><br>
                    </p>

                    <address>
                        Bachelor of Business Administration - Information technology<br>

                        Hämeen ammattikorkeakoulu HAMK

                        PL 230 13101 Hämeenlinna</address>


                </div>



                <div class="col-sm-5" id="hangout">
                    <h1 style="padding-top: 50px;">WANNA HANG OUT?</h1>



                    <h4>(Women only)</h4> <br>

                    <form action="submit.php" method="POST" enctype="multipart/form-data">

                        <label for="fname">Name:</label><br>
                        <input type="text" id="fname" name="fname" placeholder="Your name..."><br>

                        <label for="phonumber">Phone number:</label><br>
                        <input type="text" id="phonumber" name="phonenumber" placeholder="Your phone number..."><br>

                        <label for="email">Email:</label><br>
                        <input type="email" id=email name="email" placeholder="Your email..." required><br>

                        <label for="country">Country:</label><br>
                        <select id="country" name="country">
                            <option value="finland">Finland</option>
                            <option value="other">Other</option>
                        </select>

                        <br>
                        <input type="checkbox" id="checkbox" name="checkbox" value="checkbox">
                        <label for="fun">Check me if you are awesome!</label> <br>
                        <p><small><i>Wanna upload your picture?</i></small></p>
                        <input type="file" name="filetoupload" id="filetoupload">
                        <input type="submit" name="submit" value="Submit" onclick="showPopup()"><br><br>

                    </form>

                </div>
                <div class="footer">
                    <p>&copy; DreamMemeTeam</p>
                </div>
            </div>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
            crossorigin="anonymous"></script>

</body>

</html>