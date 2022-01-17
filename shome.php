<?php
    session_start();
    $connect = mysqli_connect('localhost','root','','kuetproject');
    $session_user =  $_SESSION['user_login'];
    //echo $session_user;
    $user_data = mysqli_query($connect,"SELECT * FROM `sreg` WHERE `phonenumber` = '$session_user' ");
    $user_row = mysqli_fetch_assoc($user_data);
    // if(isset($_POST['submit'])){
    //     $session_user =  $_SESSION['user_login'];
    //     header('location: mcq.php');
    // }


    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="homepagestyle.css">
    <title>Document</title>
    <style>
        .card {
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
        }
        .card:hover {
             box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }
        .container {
            padding: 2px 16px;
        }
        .button1,.button2{
        background-color: #4CAF50; /* Green */
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        margin-left: 40px;
    }
    .button2{
        color: red;
    }
    .button2 a{
        text-decoration:none;
    }
    input[type=text], select {
        width: 20%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    p  {
        color: red;
        font-family: courier;
        font-size: 160%;
    }
    h4{
        color: red;
        font-family: courier;
        font-size: 160%;
    }
    </style>
</head>
<body>
<ul>
        <li><a href="squestion.php">See Question</a></li>
        <li><a href="displayquestion.php">See Multiple Question</a></li>
        
         <!-- <li><a href="mcq.php?phone=<?php echo $session_user?>">Set Multiple Question</a></li> -->
      


</ul>
<div class="card">
  <div class="container">
    <h4><b>Name:  <?= $user_row['username'] ?></b></h4>
    <h4><b>Roll:  <?= $user_row['rollnumber'] ?></b></h4>
    <p>Mobile No:<?= $user_row['phonenumber'] ?></p>
  </div>
</div>
<?php
    $a = $user_row['rollnumber'];
?>
<br><br><br>
<div class="card">
  <div class="container">
<form class="" action="shome.php" method="post">

        <label for="Id No"><b>Id No:</b></label>
        <input type="text" name="idnumber">
        <br><br>
        <input id="upload" type="submit" class="button1" name="submit2" value="Want To See Marks">
      </form>
      </div>
</div>
      <?php
            $connect = mysqli_connect('localhost','root','','kuetproject');
            if(isset($_POST['submit2'])){
                $idnumber = $_POST['idnumber'];       
                $sql = "SELECT `marks` FROM `marks` WHERE `rollno`='$a' AND `idnumber`='$idnumber'";
                $result = mysqli_query($connect,$sql);
                $row = $result->fetch_assoc();
                ?>
                <div class="card">
                <div class="container">
                    <?php
                        echo "<p> Marks:";
                        echo $row['marks'];
                        echo "</p>";
            }
                
            else{
                echo "<p> Marks:";
                        echo "No Marks Available Right Now!";
                        echo "</p>";
            }
            ?>
            <br><br>
           
               
     </div>
</div>
<button class="button2" value="Log Out">
    <a href="slogout.php">LogOut</a>
</button>

</body>
</html>