<?php
    // Check if the form is submitted
    if(isset($_POST["submit"])){
       
        $LastName = $_POST["LastName"];
        $FirstName = $_POST["FirstName"];
        $email = $_POST["Email"];
        $password = $_POST["password"];
        $RepeatPassword = $_POST["repeat_password"];
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $errors = array();
        $success = false; // Flag to indicate successful registration
       
        // Validate if all fields are empty
        if (empty($LastName) OR empty($FirstName) OR empty($email) OR empty($password) OR empty($RepeatPassword)) {
            array_push($errors, "All fields are required");
        }
       
        // Validate if the email is not validated
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email is not valid");
        }
       
        // Password should not be less than  8
        if(strlen($password) <  8) {
            array_push($errors, "Password must be at least  8 characters long");
        }
       
        // Check if password is the same
        if ($password != $RepeatPassword) {
            array_push($errors, "Password does not match");
        }
        require_once "database.php";
        $sql = "SELECT * FROM tbl_user WHERE USER_EMAIL = '$email'";
        $result = mysqli_query($conn, $sql);
        $rowCount = mysqli_num_rows($result);
        if ($rowCount>0){
            array_push($errors, "Email Already Exists!");
        }
        if (count($errors) > 0) {
          $errorMessages = implode("<br>", $errors);
        } else {
            // Insert to database
            require_once "database.php";
            $sql = "INSERT INTO tbl_user (USER_LNAME, USER_FNAME, USER_EMAIL, USER_PASSWORD) VALUES (?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($conn); //initializes a statement and returns an object suitable for mysqli_stmt_prepare()
            $preparestmt = mysqli_stmt_prepare($stmt, $sql);
            if ($preparestmt){
              mysqli_stmt_bind_param($stmt, "ssss", $LastName, $FirstName, $email, $passwordHash);
              mysqli_stmt_execute($stmt);
              $success = true; // Set success flag
            } else {
              $errors[] = "Something went wrong!";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/geodatasource-countryflag.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Strait|Chonburi">
    <link rel="gettext" type="application/x-po" href="languages/en/LC_MESSAGES/en.po" />
    <link rel="stylesheet" href="regis1.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../../build/css/intlTelInput.css" />
     <link rel="stylesheet" href="../../build/css/demo.css" />
    <link rel="stylesheet" href="build/css/intlTelInput.css">
</head>
<body>

<div class="container">
<div id="error-popup" class="alert alert-danger" style="display: none;"></div>
<div id="success-popup" class="alert alert-success" style="display: none;"></div> 
    
    <!-- Registration Form -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <h2>Registration</h2>
      <div class="form-group">
        <h3>Personal Information</h3>
        <input type="text" class="form-control" name="LastName" placeholder="Last Name">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="FirstName" placeholder="First Name">
      </div>
      <div class="form-group">
        <input type="email" class="form-control" name="Email" placeholder="Email">
      </div>
      <div class="form-group">
        <input id="phone" class="form-control" name="Phone" type="tel" />
      </div>
      <div class="form-group">
      <h3>Address</h3>
        <input type="text" class="form-control" name="LotBlock" placeholder="Lot/Block">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="Street" placeholder="Street">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="PhaseSubdivision" placeholder="Phase/Subdivision">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="Barangay" placeholder="Barangay">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="CityMunicipality" placeholder="City/Municipality">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="Province" placeholder="Province">
      </div>
      <div class="form-group">
        <select id="countrySelection" class="form-control gds-cr gds-countryflag" country-data-region-id="gds-cr-one" data-language="en" name="Country"></select>
      </div>
      <div class="form-group">
        <select class="form-control" id="gds-cr-one" name="Region"></select>
      </div>
      <div class="form-group">
        <input type="password" class="form-control" name="password" placeholder="Password">
      </div>
      <div class="form-group">
        <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password">
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-primary" name="submit" value="Register">
      </div>
      <div class="register-link">
            <p>Already have an account? <a href="login.php"> Login Here</a></p>
      </div>
    </form>
</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="assets/js/geodatasource-cr.min.js"></script>
    <script type="text/javascript" src="assets/js/Gettext.js"></script>
    <!-- Use as a Vanilla JS plugin -->
<script src="build/js/intlTelInput.min.js"></script> 
<!-- Use as a jQuery plugin -->
<script src="https://code.jquery.com/jquery-latest.min.js"></script>
<script src="build/js/intlTelInput-jquery.min.js"></script> 
<script src="contact.js"></script>

<script src="build/js/intlTelInput.js"></script>
    <script>
      var input = document.querySelector("#phone");
      window.intlTelInput(input, {
        utilsScript: "build/js/utils.js"
      });
    </script>

<script>
    <?php if (isset($errors) && count($errors) > 0) : ?>
        document.getElementById('error-popup').innerHTML = '<?php echo implode("<br>", $errors); ?>';
        document.getElementById('error-popup').style.display = 'block';
        document.getElementById('success-popup').style.display = 'none';
        setTimeout(function() {
            document.getElementById('error-popup').style.display = 'none';
        }, 1500);
    <?php endif; ?>

    <?php if (empty($errors) && isset($_POST["submit"])) : ?>
        document.getElementById('error-popup').style.display = 'none';
        document.getElementById('success-popup').innerHTML = 'You are Registered Successfully!';
        document.getElementById('success-popup').style.display = 'block';
        setTimeout(function() {
            document.getElementById('success-popup').style.display = 'none';
        }, 1500);
    <?php endif; ?>
</script>

</body>
</html>