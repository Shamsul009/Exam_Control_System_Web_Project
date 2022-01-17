<?php
    session_start();
    if(isset($_SESSION['user_login']) || isset($_COOKIE['user_login']) )
        {
         header("Location: thome.php");
        }
    $connect = mysqli_connect('localhost','root','','kuetproject');
    if(isset($_POST['login'])){
        $phonenumber = $_POST['phonenumber'];
        $password = $_POST['password'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM `treg` WHERE `phonenumber`='$phonenumber' AND `password`='$password'";
        $result = mysqli_query($connect,$sql);
        $row = $result->fetch_assoc();
        if($row['phonenumber']==$phonenumber && $row['password']==$password){
            $_SESSION['user_login'] = $phonenumber;
            if(isset($keep)){
                setcookie('user_login',$phonenumber,time()+60*60);
            }
            header('location: thome.php');
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
    <title>Login</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tregs.css">
<body>
   
        <div class="login-box">
        <h1>Login</h1>
       
            <form action="tlogin.php" method="post">
               
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