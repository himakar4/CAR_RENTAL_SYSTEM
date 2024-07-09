
<!DOCTYPE html>
<html lang="en">
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
            background: linear-gradient(to top, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0) 50%), url('images/adpa.jpg');
            background-position: center;
            background-size: cover;
            height: 109vh;
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
            height: 75px;
            margin-left: 40px;
        }

        .icon {
            width: 200px;
            float: left;
            height: 65px;
            
        }

        .logo {
            color: black;
            font-size: 35px;
            font-family: fantasy;
            float: left;
            padding-left: 0px;
            padding-top: 30px;
        }

        .menu {
            width: 900px;
            float: left;
            height: 70px;
            margin: 23px;
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
            font-size: 18px;
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
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 12px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: grey;
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
        #home {
    display: inline-block;
    margin: 20px 20px 20px 80px;
    color: midnightblue;
}

.rent {
    font-size: 37px;
}

.dream {
    font-size: 50px;
    text-decoration: solid;
    color: paleturquoise;
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
                    <li class="dropdown">
                        <a href="#" class="dropbtn">VEHICLE MANAGEMENT</a>
                        <div class="dropdown-content">
                            <a href="addcar.php">Add new Car</a>
                            <a href="Delectcar.php">Delete Car</a>
                            <a href="Editcar.php">Edit Car</a>
                            <a href="adminCars.php">View Car Details</a>
                        </div>
                    </li>
                    <li class = "dropdown">
                        <a href="#" class = "dropbtn">USERS</a>
                        <div class="dropdown-content">
                            <a href="Deleteuser.php">Delete User</a>
                            <a href="Userdetails.php">View User Details</a>
                        </div>
                    </li>
                    <li class = "dropdown">
                        <a href="feedback.php" class = "dropbtn">FEEDBACKS</a>
                        <!-- <div class="dropdown-content">
                            <a href="NewCar.php">View Feedback</a>
                            <a href="DeleteCar.php">Delete Feedback</a>
                        </div> -->
                    </li>
                    <li class = "dropdown" >
                        <!-- <div class="bbtn"> -->
                            <a href="adminbook.php" >BOOKING REQUEST</a>
                        <!-- </div> -->
                        
                        <!-- <div class="dropdown-content">
                            <a href="DeleteCar.php">Approve Booking</a>
                            <a href="EditCar.php">Reject Booking</a>
                            <a href="adminbook.php">View Booking Details</a>
                        </div> -->
                    </li>
                    <li class = "dropdown">
                        <!-- <a href="#" class = "dropbtn">PAYMENTS</a>
                        <div class="dropdown-content">
                            <a href="NewCar.php">View Feedback</a>
                            <a href="DeleteCar.php">Delete Feedback</a>
                        </div> -->
                    </li>
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