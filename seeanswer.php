
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
        table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 50%;
        }

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

    </style>
  </head>
  <body>
  
    <div class="div1">
      <form class="" action="seeanswer.php" method="post" enctype="multipart/form-data">
        <label for="Question Id No:">Question Id No:</label>
        <input type="text" name="idnumber">
        <br><br>
        <label for="Student Roll No:">Student Roll No:</label>
        <input type="text" name="rollno">
        <br><br>
        <input id="upload" type="submit" name="submit1" value="Upload">
      </form>
      <br><br><br>
      <table>
        <tr>
            <th>Roll Number</th>
            <th>Id No</th>
            <th>Answer</th>
        </tr>
        <tbody>
            <?php
                $connect = mysqli_connect("localhost","root","","kuetproject");   
                if(isset($_POST['submit1'])){
            
                    $idnumber = $_POST['idnumber'];
                    $rollno = $_POST['rollno'];
                    $query = "SELECT * FROM `answer` WHERE `rollno`='$rollno' AND `idnumber`='$idnumber' ";
                    $result = mysqli_query($connect,$query);
                    //print_r($row);
                    if(mysqli_num_rows($result)>0){
                        
                        foreach($result as $row){
                            ?>
                            <tr>
                            <td><?= $row['rollno']; ?></td>
                            <td><?= $row['idnumber']; ?></td>
                            <td><?= $row['answer']; ?></td>
                            </tr>
                            <?php
                        }
                    }
                   
                }             

            ?>
        </tbody>
    </table>

    <p>How Many Times Switched from one Tab to another</p>
    <table>
        <tr>
            <th>Roll Number</th>
            <th>Id No</th>
            <th>Switch Tab</th>
        </tr>
       
    <tbody>
            <?php
                $connect = mysqli_connect("localhost","root","","kuetproject");   
                if(isset($_POST['submit1'])){
            
                    $idnumber = $_POST['idnumber'];
                    $rollno = $_POST['rollno'];
                    $query = "SELECT * FROM `want` WHERE `rollno`='$rollno' AND `idnumber`='$idnumber' ";
                    // SELECT * FROM `want` WHERE `idno``rollno`
                    $result = mysqli_query($connect,$query);
                    //print_r($row);
                    if(mysqli_num_rows($result)>0){
                        
                        foreach($result as $row){
                            ?>
                            <tr>
                            <td><?= $row['rollno']; ?></td>
                            <td><?= $row['idnumber']; ?></td>
                            <td><?= $row['optionk']; ?></td>
                            </tr>
                            <?php
                        }
                    }
                   
                }             

            ?>
        </tbody>
    </table>

    <br><br>
        
    <form class="" action="seeanswer.php" method="post" enctype="multipart/form-data">
        <label for="Marks:">Marks</label>
        <input type="text" name="marks">
        <br><br>
        <label for="Roll No:">Roll No:</label>
        <input type="text" name="rollno">
        <br><br>
        <label for="Id No">Id No:</label>
        <input type="text" name="idnumber">
        <br><br>
        <input id="upload" type="submit" name="submit2" value="Send Marks">
      </form>
      <?php
            $connect = mysqli_connect('localhost','root','','kuetproject');
            if(isset($_POST['submit2'])){
                $idnumber = $_POST['idnumber'];
                $rollno = $_POST['rollno'];
                $marks = $_POST['marks'];
               
                $sql = "INSERT INTO `marks`(`idnumber`,`rollno`,`marks`) VALUES ('$idnumber','$rollno','$marks');";
                $result = mysqli_query($connect,$sql);
                if($result){
                    // header('location: thome.php');
                    echo '<script>alert("Data Send ")</script>';
                    
                }
                else{
                    echo '<script>alert("Failed,Try Again")</script>';
                   
                }
            }
      ?>
    
            <a href="thome.php">Back To Previous Page</a>
            <a href="tlogout.php">Log Out</a>
    </body>
    </html>