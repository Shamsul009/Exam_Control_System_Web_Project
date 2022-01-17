<?php
    session_start();
    if(isset($_SESSION['user_login']) || isset($_COOKIE['user_login']) )
        {
         header("Location: shome.php");
        }
    $connect = mysqli_connect('localhost','root','','kuetproject');
    if(isset($_POST['login'])){
        $phonenumber = $_POST['phonenumber'];
        $password = $_POST['password'];
        $keep = isset($_POST['keep'])?$_POST['keep']:NULL;
        $sql = "SELECT * FROM `sreg` WHERE `phonenumber`='$phonenumber' AND `password`='$password'";
        $result = mysqli_query($connect,$sql);
        $row = $result->fetch_assoc();
        echo $row;
        if($row['phonenumber']==$phonenumber && $row['password']==$password){
            $_SESSION['user_login'] = $phonenumber;
            if(isset($keep)){
                setcookie('user_login',$phonenumber,time()+60*60);
            }
            header('location: shome.php');
        }
        else{
            echo 'Error UserName Or Password';
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
        <h1>Student Login</h1>
       
            <form action="slogin.php" method="post">
               
                <div class="textbox">
                    <input type="text" placeholder="Phone Number" name="phonenumber" required>
                </div>

                
                <div class="textbox">
                    <input type="password" placeholder="Password" name="password" required>
                </div>

               
                    <input type="checkbox"  name="keep" value="keep">Remember Me
               

                <input type="submit" name="login" class="btn" value="Sign Up">
                <a href="homepage.php">Home</a>
            </form>
      
        </div>
    
</body>
</html>
</body>
</html>