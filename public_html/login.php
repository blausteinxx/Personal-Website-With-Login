<?php
            session_start();
            if(isset($_POST["login"])){
                $email = $_POST["email"];
                $password = $_POST["password"];
                require_once "database.php";
                $sql = "SELECT * FROM tbl_user WHERE USER_EMAIL='$email'";
                $result = mysqli_query($conn, $sql);
                $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

                if($user){
                    if(password_verify($password, $user["USER_PASSWORD"])){
                        // Store user information in session
                        $_SESSION["user"] = "yes";
                        $_SESSION["first_name"] = $user["USER_FNAME"];
                        header("Location: index.php");
                        die();
                    } else {
                        $errorMessages="Password does not match!";
                    }
                } else {
                    $errorMessages="Email does not match!";
                }
                echo "<script>
                        document.getElementById('error-popup').innerHTML = '$errorMessages';
                        document.getElementById('error-popup').style.display = 'block';
                        document.getElementById('success-popup').style.display = 'none'; // Hide success popup
                        setTimeout(function() {
                            document.getElementById('error-popup').style.display = 'none';
                        }, 1500); // 1500 milliseconds = 1.5 seconds
                    </script>";
                
            }
        ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login1.css?v=<?php echo time(); ?>">
    <title>Login Page </title>
</head>
<body>
    <div class="container">
        
            <div id="error-popup" class="alert alert-danger" style="display: none;"></div>
    <div id="success-popup" class="alert alert-success" style="display: none;"></div> 

        
        <form action="login.php" method="post">
            <h2>Login</h2>
            <div class="form-group">
                <span class="icon"><ion-icon name="mail"></ion-icon></span>
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
        
            <div class="form-group">
                <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="form-btn">
                <input type="submit" value="Login" name="login" class="btn btn-primary">
            </div>

            <div class="register-link">
            <p>Not Registered yet? <a href="Registration.php"> Register Here</a></p>
            </div>
        </form>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</script>
</body>
</html>
