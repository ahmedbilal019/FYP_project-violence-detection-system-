<?php
// include('message.html');
// Connect to MySQL
$serverName="localhost";
$userName="root";
$passward="";
$database="violence_detection";
$connection=mysqli_connect($serverName,$userName,$passward,$database);
if ($connection) {
    echo ("connection established successfully!!");
}
else {
    echo ("connection error!!" . mysqli_connect_error());
}
// Get form data
$Email = $_POST['email'];
$Passward = $_POST['password'];

// Sanitize form data to prevent SQL injection
$Email = mysqli_real_escape_string($connection, $Email);
$Password = mysqli_real_escape_string($connection, $Passward);

// Query the database to check if the user exists
$sql = "SELECT * FROM tbl_signup WHERE Email='$Email'";
$result = mysqli_query($connection, $sql);
$num = mysqli_num_rows($result);
if ($num > 0){
    while($row=mysqli_fetch_assoc($result)){
        if (password_verify($Passward, $row['Passward'])){ 
            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['Email'] = $Email;
            $_SESSION['message'] = 'Login Successfully! Welcome Back!';
        
            header('Location: http://localhost/violence detection system project/Redirect.php');
        } 
        else{
           // User doesn't exist, display an error message and redirect back to the login page

             header('Location: http://localhost/violence detection system project/message.html');
              exit();
        }
    }
    
} 
else{
    header('Location: http://localhost/violence detection system project/message.html');
    exit();
}

// Close the database connection
// mysqli_close($connection);
?>
