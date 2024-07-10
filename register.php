<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Registration</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e9e9e9;
            background: url('car2.jpg') no-repeat;
            background-size: cover;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: transparent;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0);
        }

        h2 {
            text-align: center;
            color: #fbf8f8;
        }

        .form-group {
            margin-bottom: 20px;
            color: white;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        #phone{
            padding: 7px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        #license
        {
            padding: 7px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .form-group1 {
    text-align: center;
}

.btnn {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 4px;
}

.btnn:hover {
    background-color: #45a049; /* Darker Green */
}

        button:hover {
            background-color: #45a049;
        }
        .back {
        position: fixed;
        top: 50px;
        right: 55px;
        }
        .back a{
            text-decoration : none;
            color: bisque;

        }
        .back button{
            background-color: rgb(50, 43, 43);
            color: white;
            padding: 7px;
            border-radius: 5px;
        }

    </style>
</head>
<body>
    <?php

require_once('connection.php');
if(isset($_POST['regs']))
{
    $uname=mysqli_real_escape_string($conn,$_POST['uname']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $lic=mysqli_real_escape_string($conn,$_POST['lic']);
    $ph=mysqli_real_escape_string($conn,$_POST['ph']);
    $pass=mysqli_real_escape_string($conn,$_POST['pass']);
    $cpass=mysqli_real_escape_string($conn,$_POST['cpass']);
    if(empty($uname)|| empty($email)|| empty($lic)|| empty($ph)|| empty($pass))
    {
        echo '<script>alert("please fill the place")</script>';
    }
    else{
        if($pass==$cpass){
        $sql2="SELECT *from users where EMAIL='$email'";
        $res=mysqli_query($conn,$sql2);
        if(mysqli_num_rows($res)>0){
            echo '<script>alert("EMAIL ALREADY EXISTS PRESS OK FOR LOGIN!!")</script>';
            echo '<script> window.location.href = "page.html";</script>';

        }
        else{
        $sql="insert into users (FNAME,EMAIL,LIC_NUM,PHONE_NUMBER,PASSWORD) values('$uname','$email','$lic',$ph,'$pass')";
        $result = mysqli_query($conn,$sql);
          

          
        if($result){
            echo '<script>alert("Registration Successful Press ok to login")</script>';
            echo '<script> window.location.href = "page.html";</script>';       
           }
        else{
            echo '<script>alert("please check the connection")</script>';
        }
    
        }

        }
        else{
            echo '<script>alert("PASSWORD DID NOT MATCH")</script>';
            echo '<script> window.location.href = "register.php";</script>';
        }
    }
}


?>
    <div class="back">
        <button ><a href="page.html">HOME</a></button>
    </div>
    
    <div class="container">
        <h2>Register for Car Rental</h2>
        <form action="register.php" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="uname" placeholder="Enter Username" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter email-id" required>
            </div>
            <div class="form-group">
                <label for="license" >License Number:</label>
                <input type="tel" id="license" name="lic" pattern="[A-Za-z]{2}\d{2} \d{12}" placeholder="Enter license number" required>
            </div>
            <div class="form-group">
                <label for="phone" >Phone Number:</label>
                <input type="tel" id="phone" name="ph" maxlength="10" pattern="\d{10}" placeholder="Enter mobile number" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="pass" placeholder="Enter Password" required>
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirm Password:</label>
                <input type="password" id="confirm-password" name="cpass" placeholder="Confirm Password" required>
            </div>
            <div class="form-group1">
            <input type="submit" class="btnn"  value="REGISTER" name="regs" >
            </div>
        </form>
    </div>
    <script>
        var myInput = document.getElementById("psw");
        var letter = document.getElementById("letter");
        var capital = document.getElementById("capital");
        var number = document.getElementById("number");
        var length = document.getElementById("length");
        
        // When the user clicks on the password field, show the message box
        myInput.onfocus = function() {
          document.getElementById("message").style.display = "block";
        }
        
        // When the user clicks outside of the password field, hide the message box
        myInput.onblur = function() {
          document.getElementById("message").style.display = "none";
        }
        
        // When the user starts to type something inside the password field
        myInput.onkeyup = function() {
          // Validate lowercase letters
          var lowerCaseLetters = /[a-z]/g;
          if(myInput.value.match(lowerCaseLetters)) {
            letter.classList.remove("invalid");
            letter.classList.add("valid");
          } else {
            letter.classList.remove("valid");
            letter.classList.add("invalid");
        }
        
          // Validate capital letters
          var upperCaseLetters = /[A-Z]/g;
          if(myInput.value.match(upperCaseLetters)) {
            capital.classList.remove("invalid");
            capital.classList.add("valid");
          } else {
            capital.classList.remove("valid");
            capital.classList.add("invalid");
          }
        
          // Validate numbers
          var numbers = /[0-9]/g;
          if(myInput.value.match(numbers)) {
            number.classList.remove("invalid");
            number.classList.add("valid");
          } else {
            number.classList.remove("valid");
            number.classList.add("invalid");
          }
        
          // Validate length
          if(myInput.value.length >= 8) {
            length.classList.remove("invalid");
            length.classList.add("valid");
          } else {
            length.classList.remove("valid");
            length.classList.add("invalid");
          }
        }
        </script>  
        <script>
            function onlyNumberKey(evt) {
                  
                // Only ASCII character in that range allowed
                var ASCIICode = (evt.which) ? evt.which : evt.keyCode
                if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                    return false;
                return true;
            }
        </script>
</body>
</html>


</html>