<!DOCTYPE html>
<html lang="en">
<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    session_start();
    $username = $_SESSION['username'];
    $passw = $_SESSION['password'];
    $_SESSION['password'] = $passw;
    $_SESSION['username'] = $username;
    // require_once('connection.php');
    // $sql="SELECT EMAIL FROM users where FNAME = $username and PASSWORD = $passw";
    // $res=mysqli_query($conn,$sql);
    // if($res->num_rows > 0) {
        // $row = $res->fetch_assoc();
        // $_SESSION['email'] = $row['EMAIL'];
    // }
    // Check if user is logged in
    // if (!isset($_SESSION['username'])) {
    //     header("Location: login.php"); // Redirect to login page if not logged in
    //     exit;
    // }
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMINISTRATOR</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .hai {
            width: 100%;
            background: linear-gradient(to top, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0) 50%), url('images/car3.jpg');
            background-position: center;
            background-size: cover;
            height: 100vh;
            animation: infiniteScrollBg 50s linear infinite;
        }

        .main {
            width: 100%;
            background: linear-gradient(to top, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0) 50%);
            background-position: center;
            background-size: cover;
            height: 109vh;
            animation: infiniteScrollBg 50s linear infinite;
        }

        .navbar {
            width: 1200px;
            height: 15px;
            margin: auto;
        }

        .logo {
            /* color: #ff7200; */
            font-size: 35px;
            font-family: fantasy;
            position: fixed;
            top: 30px;
            left: 12px;
            padding: 5px;
            display: inline;
            margin: 50;
            /* border: 2px solid brown; */
        }

        .menu {
            width: 900px;
            height: 70px;
            margin: 15px 0 0 170px;
            position: fixed;
            /* border: 2px solid brown; */
        }

        ul {
            float: left;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        ul li {
            list-style: none;
            margin-left: 62px;
            margin-top: 27px;
            font-size: 14px;
        }

        ul li a {
            text-decoration: none;
            color: black;
            font-family: Arial;
            font-weight: bold;
            transition: 0.4s ease-in-out;
        }

        .content-table {
            border-collapse: collapse;
            font-size: 0.9em;
            border-radius: 5px 5px 0 0;
            overflow: hidden;
            box-shadow: 0 0 20px rgb(251, 206, 83);
            margin-left: 350px;
            margin-top: 25px;
            width: 800px;
            height: 500px;
        }

        .content-table thead tr {
            background-color: orange;
            color: white;
            text-align: left;
        }

        .content-table th,
        .content-table td {
            padding: 12px 15px;
        }

        .content-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .content-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .content-table tbody tr:last-of-type {
            border-bottom: 2px solid orange;
        }

        .content-table thead .active-row {
            font-weight: bold;
            color: orange;
        }

        .header {
            margin-top: 70px;
            margin-left: 650px;
        }

        .nn {
            top: 34px;
            right: 40px;
            font-size: 14px;
            border-radius: 10px;
            cursor: pointer;
            color: white;
            transition: 0.4s ease;
            position: fixed;
            padding: 7px;
        }

        .nn a {
            text-decoration: none;
            color: black;
            font-weight: bold;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f900;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .bbtn a:hover {
            cursor: pointer;
            background-color: rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .bbtn a {
            color: black;
            text-decoration: none;
            padding: 10px;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 12px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #ff7200;
        }


        #contact ul li a:hover {
            cursor: pointer;
            background-color: rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .name {
            position: absolute;
            top: 10px;
        }
        .name a {
            text-decoration: none;
        }

        .profile {
            top: 28px;
            right: 215px;
            font-size: 14px;
            border-radius: 10px;
            cursor: pointer;
            color: rgb(0, 0, 0);
            transition: 0.4s ease;
            position: fixed;
            padding: 7px;
        }

        .pogo {
            top: 28px;
            right: 225px;
            border-radius: 10px;
            cursor: pointer;
            color: rgb(0, 0, 0);
            transition: 0.4s ease;
            position: fixed;
            padding: 7px;
        }
        #home {
    display: inline-block;
    margin: 150px 20px 20px 880px;
    color: #fffa90;
}

.rent {
    font-size: 37px;
}

.dream {
    font-size: 50px;
    text-decoration: solid;
    color: black;
}

.lines {
    font-size: 27px;
}

#services {

    margin: 120px;
}

#about {

    margin: 120px;
}
    </style>
</head>

<body>

    <div class="hai">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">CHAOS</h2>
            </div>
            <div class="menu"> 
                <ul>
                    <li class="bbtn">
                        <a href="cardetails.php">BOOK NOW</a>
                    </li>
                    <li class="bbtn">
                        <a href="bookinstatus.php" >BOOKING STATUS</a>
                    </li>
                    <li class="bbtn">
                        <a href="feedback.html">FEEDBACK</a>
                    </li>
                    <li class="bbtn">
                        <a href="contactus.php" >CONTACT US</a>
                    </li>
                    <img src="plogo.png" class="pogo" width="37px">
                    <div class="profile">
                        <p class="name" style="font-size: 25px;"><a href="profile.php"><?php echo "$username" ?></a></p>
                    </div>
                    <li><button class="nn"><a href="page.html">LOGOUT</a></button></li>
                </ul>
            </div>
        </div>
        <div class="cont">
        <div id="home">
            <div class="rent">Rent Your</div>
            <div class="dream">Dream Car</div>
            <div class="lines">Live the life of Journey,</div>
            <div class="lines">Just rent a car of your wish from our vast collection,</div>
            <div class="lines">Enjoy every moment with your family,</div>
            <div class="lines">Join us to make this family vast.</div>
        </div>
    </div>
    </div>

</body>

</html>