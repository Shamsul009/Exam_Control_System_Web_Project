
<?php

    session_start();
    $connect = mysqli_connect('localhost','root','','kuetproject');
    $phone = $_GET['phone'];

    
    $hospital_user_data = mysqli_query($connect,"SELECT * FROM `treg` WHERE `phonenumber` = '$phone' ");
    $hospital_user_row = mysqli_fetch_assoc($hospital_user_data);
  
    ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style4.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">Teacher Details</div>
    <div class="content">
      <form action="tupdate.php" method="POST" >
        <div class="user-details">
          <div class="input-box">
            <span class="details">User Name</span>
            <input type="text" name="username" placeholder="User Name" value="<?php echo $hospital_user_row['username'];  ?>">
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" name="phonenumber" placeholder="Phone Number" value="<?php echo $hospital_user_row['phonenumber'];  ?>">
          </div>
         
         
        <div class="button">
          <input type="submit" name="update" value="Update">
        </div>
        
      </form>
        
    </div>
  </div>

</body>
</html>



<?php
   
    $connect = mysqli_connect('localhost','root','','kuetproject');
    if(isset($_POST['update']))
    {  
        $username= $_POST['username'];
        $phonenumber = $_POST['phonenumber'];  

        $query = "UPDATE treg SET username='$username',phonenumber='$phonenumber' where phonenumber='$phone' ";
       
        $result = mysqli_query($connect,$query);

        print_r($result);

        if($result)
        {
            header('location: thome.php');
            echo '<script type="text/javascript">alert("Data Update")</script>';
            

        }
        else{
            echo '<script type="text/javascript">alert("Data Not Update")</script>';

        }
    }


?>
