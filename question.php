<?php
    session_start();
    $connect = mysqli_connect('localhost','root','','kuetproject');
    if (isset($_POST['submit'])) {
        $pdf=$_FILES['pdf']['name'];
        $pdf_type=$_FILES['pdf']['type'];
        $pdf_size=$_FILES['pdf']['size'];
        $pdf_tem_loc=$_FILES['pdf']['tmp_name'];
        $pdf_store="pdf/".$pdf;

        move_uploaded_file($pdf_tem_loc,$pdf_store);

        $phonenumber = $_POST['phonenumber'];
        $subject = $_POST['subject'];

        $sql="INSERT INTO question (`phonenumber`,`subject`,`pdf`) values('$phonenumber','$subject','$pdf')";
        $query=mysqli_query($connect,$sql);

      }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Insert PDF</title>
    <style media="screen">
      div{
        border: 2px solid black;
        width: 500px;
        margin-left: 370px;
        margin-top: 50px;
        padding: 30px;
      }
      form{
        margin-left: 70px;
      }
      label{
        font-size: 25px;
        font-weight: bold;
      }
      #pdf{
        font-size: 20px;
        font-weight: bold;
        margin-top: 10px;
      }
      #upload{
        font-size: 20px;
        font-weight: bold;
        margin-left: 100px;
      }
      input[type=text] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
        border: 2px solid black;
        border-radius: 4px;
        }
    </style>
  </head>
  <body>
    <div class="">
      <form class="" action="question.php" method="post" enctype="multipart/form-data">
        <label for="phonenumber">Id</label>
        <input type="text" name="phonenumber">
        <label for="subject">Subject</label>
        <input type="text" name="subject">
        <label for="">Choose Your PDF File</label><br>
        <input id="pdf" type="file" name="pdf" value="" required><br><br>
        <input id="upload" type="submit" name="submit" value="Upload">
      </form>

    </div>

  </body>
</html>