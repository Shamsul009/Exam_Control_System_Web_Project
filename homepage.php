<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="homepagestyle.css">
    <title>Home</title>
    <style>
        li {
 display: block;
 transition-duration: 0.5s;
}

li:hover {
  cursor: pointer;
}

ul li ul {
  visibility: hidden;
  opacity: 0;
  position: absolute;
  transition: all 0.5s ease;
  margin-top: 1rem;
  left: 0;
  display: none;
}

ul li:hover > ul,
ul li:focus-within > ul,
ul li ul:hover {
  visibility: visible;
  opacity: 1;
  display: block;
}

ul li ul li {
  clear: both;
  width: 100%;
}

    </style>
    
</head>
<body>
    <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">Login</a>
            <ul class="dropdown">
                <li><a href="tlogin.php">Login As A Teacher</a></li>
                <li><a href="slogin.php">Login As A Student</a></li>
               
            </ul>
        </li>
        <li><a href="#">Reg</a>
            <ul class="dropdown">
                <li><a href="treg.php">Registration As A Teacher</a></li>
                <li><a href="sreg.php">Registration As A Student</a></li>
            </ul>
        </li>
        <li><a href="admin.php">Admin</a></li>
<!--        
        <div class ="dropdown">
            <li style="float:right"><a href="#">Login</a></li>
                <div class="dropdown-content">
                <a href="tlogin.php">As A Teacher</a>
                <a href="slogin.php">As A Student</a>
                </div>
        </div> 
        <li><a href="admin.php">Admin</a></li>
        <div class ="dropdown">
            <li><a href="#">Registration</a></li>
                <div class="dropdown-content">
                <a href="treg.php">As A Teacher</a>
                <a href="sreg.php">As A Student</a>
                </div>
        </div> -->

    </ul>
</body>
</html>