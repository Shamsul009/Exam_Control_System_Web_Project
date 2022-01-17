<?php
    session_start();
    $connect = mysqli_connect("localhost", "root", "", "kuetproject");
    if(isset($_POST['submitanswer'])){
        $rollno = $_POST['rollno'];
        $idno = $_POST['idnumber'];
         for ($a = 0; $a < count($_POST['answer']); $a++)
         {

            if( $_POST["answer"][$a] ==''){
                //echo "Null Value";
                
                $sql = "INSERT INTO answer (`rollno`,`idnumber`, `answer`) VALUES ('$rollno', '$idno','NULL')";
                $result = mysqli_query($connect, $sql);
            } 
            else{
               // echo "Answer Script";
                $sql = "INSERT INTO answer (`rollno`,`idnumber`, `answer`) VALUES ('$rollno','$idno', '" . $_POST["answer"][$a] . "')";
                $result = mysqli_query($connect, $sql);
            }
         }
         for ($a = 0; $a < count($_POST['optionk']); $a++)
            {
            $sql = "INSERT INTO `want`(`idnumber`, `optionk`,`rollno`) VALUES ('$idno','" . $_POST["optionk"][$a] . "','$rollno')";
            $result1 = mysqli_query($connect, $sql);
            }
        if($result1){
            echo "<p>Answer Submitted.</p>";
        }
        //  if($result){
        //      echo "Done";
        //  }
        //  else{
        //      echo "Failed to Insert Data";
        //  }
        
    }
    // else{
    //     echo "Failed";
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .button1,.button2,.button3{
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
    .button2{
        background-color: red; 
    }
    .button3{
        background-color: #008CBA;
    }
    input[type=text], select {
        width: 50%;
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
</style>
<body>
<form class="" action="displayquestion.php" method="post" enctype="multipart/form-data">
        <input  type="text" name="idno" placeholder="Please Enter Your Exam Id"><br><br>
        <input class="button1" type="submit" name="submit" value="Upload">
    <p>Student Info</p>
    <input type="text" name="rollno" placeholder="Please Enter Your Roll No:" require>
    <input type="text" name="idnumber" placeholder="Please Enter Your Id No:" require>
    <table>
        <tr>
            <th>#</th>
            <th>Answer</th>
        </tr>
        <tbody id="tbody"></tbody>
    </table>
    <input class="button2" type="submit" name="submitanswer" value="Submit Script">
    
      </form>

      <?php
      if(isset($_POST['submit']))

        {
        $idno = $_POST['idno'];
        $sql = "SELECT * FROM `options` WHERE `idno`='$idno'";
        $result = mysqli_query($connect,$sql);

        if(mysqli_num_rows($result)>0){
                $item = 0;
                foreach($result as $row){
                    $item = $item + 1;
                    ?>
                    <p><?= $item .'.'. $row['question']; ?></p>
                    <p><?= 'A.' . $row['option1']; ?></p>
                    <p><?= 'B.'.$row['option2']; ?></p>
                    <p><?= 'C.' .$row['option3']; ?></p>
                    <p><?= 'D.' .$row['option4']; ?></p>
                    <button class="button3" type="button" onclick="addItem();">Submit</button>
                <?php
                }
            }
        }
                ?>
    

    

</body> 
</html>
 <script>
    var items = 0;
    function addItem() {
        items++;
 
        var html = "<tr>";
            html += "<td>" + items + "</td>";
            html += "<td><input type='text' name='answer[]'></td>";
            html += "</tr>";
 
            var row = document.getElementById("tbody").insertRow();
            row.innerHTML = html;
    }
</script>
<script>
         document.addEventListener('visibilitychange',function(){
              document.title = document.visibilityState;
              console.log(document.visibilityState)
              if(document.visibilityState == "hidden"){
              addItemk();
              }
        
    })
    
    function addItemk() {
 
            var htmlk = "<tr>";
          
            htmlk += "<td><input type='hidden' name='optionk[]' value='hidden' ></td>";
            htmlk += "</tr>";
 
            var rowk = document.getElementById("tbody").insertRow();
            rowk.innerHTML = htmlk;
    }
</script>