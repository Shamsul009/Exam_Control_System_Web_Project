<?php
    session_start();
    $connect = mysqli_connect('localhost','root','','kuetproject');
    if(isset($_POST['signupreg'])){
        $username = $_POST['username'];
        $phonenumber = $_POST['phonenumber'];
        $subject = $_POST['subject'];
        $password = $_POST['password'];
        $sql = "INSERT INTO `treg`(`username`, `password`, `phonenumber`, `subject`) VALUES ('$username','$password','$phonenumber','$subject');";
        $result = mysqli_query($connect,$sql);
        if($result){
            echo '<script>alert("Data Save , Please Login First")</script>';
            
        }
        else{
            echo '<script>alert("Failed,Try Again")</script>';
           
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tregs.css">
<body>
   
        <div class="login-box">
        <h1>Registration</h1>
       
            <form action="treg.php" method="post">
                <div class="textbox">
                    <input type="text" placeholder="Username" name="username" required>                </div>

                <div class="textbox">
                    <input type="text" placeholder="Phone Number" name="phonenumber" required>
                </div>

                
                <div class="textbox">
                    <input type="text" placeholder="Subject" name="subject" required>
                </div>

                <div class="textbox">
                    <input type="password" placeholder="Password" name="password" required>
                </div>

                <input type="submit" name="signupreg" class="btn" value="Sign Up">
                <a href="tlogin.php">Sign In</a>
                <a href="homepage.php">Home</a>
            </form>
      
        </div>
    
</body>
</html>