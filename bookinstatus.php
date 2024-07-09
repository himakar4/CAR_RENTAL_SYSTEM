<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOOKING STATUS</title>
    <style>

*{
    margin: 0;
    padding: 0;

}

body{
    background: url("images/cblur.jpg");
    background-position: center;
   
}
.box{
    
    position:center;    
    top: 50%;
    left: 50%;
    padding: 20px;
    box-sizing: border-box;
    background: #fff;
    border-radius: 4px;
    box-shadow: 0 5px 15px rgba(0,0,0,.5);
    background: linear-gradient(to top, rgba(255, 251, 251, 1)70%,rgba(250, 246, 246, 1)90%);
    display: flex;
    align-content: center;
    width: 700px;
    height: 250px;
    margin-top: 100px;
    margin-left: 350px;
  
    
}


.box .content{
    margin-left: 5px;
    font-size: 15px;
}

.box .button{
    width: 240px;
    height: 40px;
    background: #ff7200;
    border:none;
    margin-top: 30px;
    font-size: 18px;
    border-radius: 10px;
    cursor: pointer;
    color:#fff;
    transition: 0.4s ease;
}

.utton{
    width: 200px;
    height: 40px;
   
    background: #ff7200;
    border:none;
    font-size: 18px;
    border-radius: 5px;
    cursor: pointer;
    color:#fff;
    transition: 0.4s ease;
    margin-top: 10px;
    margin-left: 10px;
}
.utton a{
    text-decoration: none;
    color: white;
    font-weight: bold;
}

ul{
    float: left;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 100px;
}

ul li{
    list-style: none;
    margin-left: 200px;
    margin-top: -130px;
    font-size: 25px;

}
.name{
    font-weight: bold;
}
.back {
            top: 34px;
            right: 40px;
            font-size: 18px;
            border-radius: 10px;
            cursor: pointer;
            color: white;
            transition: 0.4s ease;
            position: fixed;
            padding: 7px;
        }

        .back a {
            text-decoration: none;
            color: black;
            font-weight: bold;
        }

</style>
</head>
<body>

<button class="back"><a href="cuspage.php">Back</a></button>




<?php
    require_once('connection.php');
    session_start();
    $username = $_SESSION['username'];
    $passw = $_SESSION['password'];

    // Query to fetch email
    $email_query = "SELECT EMAIL FROM users WHERE FNAME='$username' AND PASSWORD='$passw' ";
    $email_result = mysqli_query($conn, $email_query);

    // Check if query was successful
    if (!$email_result) {
        echo '<script>alert("Error: ' . mysqli_error($conn) . '")</script>'; // Display error message
        echo '<script>window.location.href = "cardetails.php";</script>';
        exit(); // Stop further execution
    }

    // Fetch the email
    $email_row = mysqli_fetch_assoc($email_result);
    $email = $email_row['EMAIL'];

    // Query to fetch booking details
    $booking_query = "SELECT * FROM booking WHERE EMAIL='$email' ORDER BY BOOK_ID DESC LIMIT 1";
    $booking_result = mysqli_query($conn, $booking_query);

    // Check if query was successful
    if (!$booking_result) {
        echo '<script>alert("Error: ' . mysqli_error($conn) . '")</script>'; // Display error message
        echo '<script>window.location.href = "cardetails.php";</script>';
        exit(); // Stop further execution
    }

    // Fetch the booking details
    $rows = mysqli_fetch_assoc($booking_result);

    // Check if booking details exist
    if (!$rows) {
        echo '<script>alert("There are no booking details")</script>';
        echo '<script>window.location.href = "cardetails.php";</script>';
        exit(); // Stop further execution
    }

    // Fetch additional user and car details if needed
    $user_query = "SELECT * FROM users WHERE EMAIL='$email'";
    $user_result = mysqli_query($conn, $user_query);
    $rows2 = mysqli_fetch_assoc($user_result);

    $car_id = $rows['CAR_ID'];
    $car_query = "SELECT * FROM cars WHERE CAR_ID='$car_id'";
    $car_result = mysqli_query($conn, $car_query);
    $rows3 = mysqli_fetch_assoc($car_result);

    // Now you can use $rows, $rows2, and $rows3 as needed
?>


</ul>
    <div class="box">
         <div class="content">
             <h1>CAR NAME : <?php echo $rows3['CAR_NAME']?></h1><br>
             <h1>NO OF DAYS : <?php echo $rows['DURATION']?></h1><br>
             <h1>BOOKING STATUS : <?php echo $rows['BOOK_STATUS']?></h1><br>
             
         </div>
     </div>



<?php 
?>
    
</body>
</html>