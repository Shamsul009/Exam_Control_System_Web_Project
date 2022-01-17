<?php
    session_start();
    $connect = mysqli_connect('localhost','root','','kuetproject');
    $session_user =  $_SESSION['user_login'];
    //echo $session_user;
   
    $user_data = mysqli_query($connect,"SELECT * FROM `treg` WHERE `phonenumber` = '$session_user' ");
     $user_row = mysqli_fetch_assoc($user_data);
    

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
        .button2{
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
       
        }
    
    .button2 a{
        text-decoration:none;
    }
    p  {
        color: green;
        font-family: courier;
        font-size: 160%;
    }
    h4{
        color: green;
        font-family: courier;
        font-size: 160%;
    }
    .container a{
        
        text-decoration:none;
        justify-content: flex-end;
    }
    </style>
</head>
<body>
<ul>
        <li><a href="question.php">Set Question</a></li>
        <li><a href="#">Set Answer</a></li>
         <li><a href="mcq.php?phone=<?= $user_row['phonenumber']?>">Set Multiple Question</a></li>
         <li><a href="seeanswer.php">Set Student Answer</a></li>
      


</ul>
<div class="card">
  <div class="container">
    <h4><b>Name:  <?= $user_row['username'] ?></b></h4>
    <p>Subject:<?= $user_row['subject'] ?></p>
    <p>Mobile No:<?= $user_row['phonenumber'] ?>
    <a href="tupdate.php?phone=<?= $user_row['phonenumber'] ?>">Edit</a>
    </p>
  </div>
</div>
<br><br><br>





<br><br><br>
<button class="button2" value="Log Out">
    <a href="tlogout.php">LogOut</a>
</button>
</body>
</html>