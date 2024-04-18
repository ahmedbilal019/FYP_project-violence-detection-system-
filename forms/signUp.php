
<?php
$Name=$_POST["name"];
$Email=$_POST["email"];
$Password=$_POST["password"];
$ConfirmPassward=$_POST["confirm-password"];
$PhoneNumber=$_POST["phone"];
$errors = array();

  // Validate name field
  if (empty($Name)) {
    $errors[] = "Name is required";
  } 
  elseif (!preg_match("/^[A-Za-z ]*?$/",$Name)) {
    $errors[] = "Only letters and white space allowed in name field";
  }

  // Validate email field
  if (empty($Email)) {
    $errors[] = "Email is required";
  } elseif (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format";
  }

  // Validate password field
  if (empty($Password)) {
    $errors[] = "Password is required";
  }

  // Validate confirm password field
  if (empty($ConfirmPassward)) {
    $errors[] = "Confirm password is required";
  } elseif ($ConfirmPassward!= $Password) {
    $errors[] = "Passwords do not match";
  }

  // Validate phone number field
  if (empty($PhoneNumber)) {
    $errors[] = "Phone number is required";
  } elseif (!preg_match("/^[0-9]+$/",$PhoneNumber)) {
    $errors[] = "Only numbers allowed in phone number field";
  }

if (!empty($errors)) {
    foreach ($errors as $error) {
        echo $error . "<br>";
    }
} else {
    $serverName="localhost";
    $userName="root";
    $passward="";
    $database="violence_detection";
    $connection = mysqli_connect($serverName, $userName, $passward, $database);

    if (!$connection) {
        echo ("Connection error: " . mysqli_connect_error());
    } else {
        // Check if email or phone number already exists
        $checkEmailQuery = "SELECT * FROM tbl_signup WHERE Email='$Email'";
        $checkPhoneQuery = "SELECT * FROM tbl_signup WHERE Phone_no='$PhoneNumber'";

        $emailResult = mysqli_query($connection, $checkEmailQuery);
        $phoneResult = mysqli_query($connection, $checkPhoneQuery);

        if (mysqli_num_rows($emailResult) > 0) {
            echo "Email already exists. Please use a different email address.";
            exit(); // Stop further processing if email exists
        }

        if (mysqli_num_rows($phoneResult) > 0) {
            echo "Phone number already exists. Please use a different phone number.";
            exit(); // Stop further processing if phone number exists
        }
          $hash = password_hash($Password,PASSWORD_DEFAULT);
        // Insert new record if email and phone number are unique
        $sql = "INSERT INTO tbl_signup(Name, Email, Passward, Phone_no) VALUES ('$Name', '$Email', '$hash', '$PhoneNumber')";

        if (mysqli_query($connection, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connection);
        }

        session_start();
        $_SESSION['Email'] = $Email;
        $_SESSION['message'] = 'You have SignUp Successfully !';

        header('Location: http://localhost/violence detection system project/Redirect.php');
    }
}
?>
