<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CARMELO | WEBSITE</title>
    <link rel="icon" type="image/x-icon" href="hans.jpg" style="border-radius: 20px;">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Orbitron:400,700&display=swap">
</head>

<body>
    <header>
        <div class="container">
            <h1> My Cyber Space ✩°｡⋆⸜ </h1>
        </div>
    </header>

    <nav>
        <a href="index.php">Home</a>
        <a href="aboutme.php">About</a>
        <a href="resume.php">Resume</a>
        <a href="portfolio.php">Portfolio</a>
        <a href="contact.php">Contact</a>

    </nav>

    <section id="BACK">
        <div class="WELCOME">
            <marquee scrollamount="20">WELCOME&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;WELCOME&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                WELCOME&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;WELCOME&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                WELCOME&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;WELCOME&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                WELCOME&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;WELCOME&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                WELCOME&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;WELCOME&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                WELCOME&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;WELCOME&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                WELCOME&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;WELCOME&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                WELCOME&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;WELCOME&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                WELCOME&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;WELCOME&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                WELCOME&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;WELCOME&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                WELCOME&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;WELCOME&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                WELCOME&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;WELCOME&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                WELCOME&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;WELCOME&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                WELCOME&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;WELCOME&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                WELCOME&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;WELCOME&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                WELCOME&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;WELCOME&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                WELCOME&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;WELCOME&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                WELCOME&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;WELCOME&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
            </marquee>
        </div>
    </section>

    <section id="home">
        <div class="container">
            <h1>こんにちは! </h1>
            <?php
            if (isset($_SESSION["first_name"])) {
                // Display the user's first name if logged in
                echo "<h2>(Greetings, " . $_SESSION["first_name"] . "!)</h2>";
            } else {
                // If not logged in, show a generic greeting
                echo "<h2>Greetings!</h2>";
            }
            ?>
            <p>I am Hans Rafael Carmelo, an IT student who 
                studies at National University Fairview. I am 20 
                years old, and I made this personal website to share 
                my stuff.
                </p>
            <p>GET TO KNOW ME MORE: </p>
            <a href="aboutme.php" class="btn1">About Me</a><br><br>
            
            <?php
            if (isset($_SESSION["first_name"])) {
                echo '<a href="logout.php" class="btn btn-warning">Logout</a>';
            } else {
                echo '<a href="login.php" class="btn btn-warning">Login</a>';
            }
        ?>
            <section id="aboutme">
                <div class="container2">

                </div>
            </section>
        </div>
    </section>
</body>

</html>
