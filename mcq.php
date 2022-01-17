<?php
 
    $conn = mysqli_connect("localhost", "root", "", "kuetproject");
    $phone = $_GET['phone'];
    if (isset($_POST["addInvoice"]))
    {
        $idno = $_POST['idno'];
        $phonenumber = $_POST['phonenumber'];
 
        $sql = "INSERT INTO mcq (`idno`,`phonenumber`) VALUES ('$idno','$phonenumber')";
        mysqli_query($conn, $sql);
        $invoiceId = mysqli_insert_id($conn);
 
        for ($a = 0; $a < count($_POST["question"]); $a++)
        {
            $sql = "INSERT INTO options (`idno`, `question`, `option1`,`option2`,`option3`,`option4`) VALUES ('$idno', '" . $_POST["question"][$a] . "', '" . $_POST["option1"][$a] . "', '" . $_POST["option2"][$a] . "','" . $_POST["option3"][$a] . "','" . $_POST["option4"][$a] . "')";
            $result = mysqli_query($conn, $sql);
        }
        if($result){
            //$phone = $_GET['phone'];
            echo "<p>Invoice has been added.</p>";
            $_SESSION['user_login'] = $phone;
            header('location: thome.php');
           
        }
    }
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Document</title>
    
<style>
    .button1{
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
    margin-left:15px;
    }

    .button1 {
    background-color: white; 
    color: black; 
    border: 2px solid #4CAF50;
    }
.w3-input{
    margin-left:15px;
    margin-top:20px;
}
.table1{
    margin-left:15px;
}

</style>
</head>
<body>

<form method="POST" action="mcq.php">
    <input type="text" class="w3-input w3-border" style="width:15%" name="idno" placeholder="Enter Id No" required>
    <br><br>
    <input type="text" class="w3-input w3-border" style="width:15%" name="phonenumber" placeholder="Phone Number" value="<?php echo $phone ?>" required>
    <br><br>
    <table class="table1">
        <tr>
            <th>#</th>
            <th>Question</th>
            <th>Option-1</th>
            <th>Option-2</th>
            <th>Option-3</th>
            <th>Option-4</th>
        </tr>
        <tbody id="tbody"></tbody>
    </table>
 
    <button type="button" class="button1" onclick="addItem();">Add More Question</button>
    <input type="submit" class="button1" name="addInvoice" value="Submit Question">
</form>
<script>
    var items = 0;
    function addItem() {
        items++;
 
        var html = "<tr>";
            html += "<td>" + items + "</td>";
            html += "<td><input type='text' name='question[]'></td>";
            html += "<td><input type='text' name='option1[]'></td>";
            html += "<td><input type='text' name='option2[]'></td>";
            html += "<td><input type='text' name='option3[]'></td>";
            html += "<td><input type='text' name='option4[]'></td>";
            html += "<td><button type='button' onclick='deleteRow(this);'>Delete</button></td>"
        html += "</tr>";
 
        var row = document.getElementById("tbody").insertRow();
        row.innerHTML = html;
    }
 
function deleteRow(button) {
    button.parentElement.parentElement.remove();
    // first parentElement will be td and second will be tr.
}
</script>

   
</body>
</html>
