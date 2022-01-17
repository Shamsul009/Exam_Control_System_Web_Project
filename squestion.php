
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Display PDF</title>
    <style media="screen">
      embed{
        border: 2px solid black;
        margin-top: 30px;
      }
      .div1{
        margin-left: 170px;
      }
      form{
        margin-left: 170px;
      }
      label{
        font-size: 25px;
        font-weight: bold;
      }
      #upload{
        font-size: 20px;
        font-weight: bold;
        margin-left: 100px;
      }
      input[type=text] {
        width: 20%;
        padding: 12px 20px;
       
        box-sizing: border-box;
        border: 2px solid black;
        border-radius: 4px;
        }
    </style>
  </head>
  <body>
  
    <div class="div1">
      <form class="" action="squestion.php" method="post" enctype="multipart/form-data">
        <label for="phonenumber">Id</label>
        <input type="text" name="phonenumber">
        <input id="upload" type="submit" name="submit" value="Upload">
      </form>

      <?php
       session_start();
       $connect = mysqli_connect('localhost','root','','kuetproject'); 
         if(isset($_POST['submit'])){
             $phonenumber = $_POST['phonenumber'];

            $sql="SELECT * FROM `question` WHERE `phonenumber`='$phonenumber'";
             $query=mysqli_query($connect,$sql);
             while ($info=mysqli_fetch_array($query)) {
        ?>
      <embed type="application/pdf" src="pdf/<?php echo $info['pdf'] ; ?>" width="900" height="500">
    <?php
             }
     }

      ?>

    </div>


  </body>
</html> 