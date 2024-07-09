<!DOCTYPE html>
<html>

<head>
    <style>
        * {
            background: dimgray;
        }

        a {
            text-decoration: none;
        }
        

        .row {
            display: flex;
            flex-wrap: wrap;
            /* justify-content: center; */
        }

        .column {
            flex: 0 1 calc(25% - 20px); /* Adjust the width for 4 columns */
            max-width: calc(25% - 20px); /* Adjust the width for 4 columns */
            padding: 10px;
        }

        .box {
            background-color: rgb(255, 255, 255);
            border-radius: 20px;
            padding: 10px;
            /* margin: 10px;  */
            margin-bottom: 50px;
        }

        .box:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.5);
            transform: scale(0.55);
        }

        .box img {
            position: center;
            width: 320px;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .box p img {
            position: center;
            width: 50px;
            height: 100px;
            object-fit: cover;
        }

        .column p {
            text-align: right;
            font-size: 16px;
            color: black;
            margin: 5px 10px 5px 10px;
            /* border-color: white; */

        }

        .box p {
            display: block;
            background-color: rgb(255, 255, 255);
        }

        .box p img {
            width: 5%;
            height: 5%;
        }

        .box span img {
            width: 5%;
            height: 5%;
        }

        #seat,
        #speedo {
            display: flex;
            align-items: center;
            background: white;
        }

        #seat img{
            width: 30px;
            height: 30px;
            margin-right: 10px;
            margin-left: 20px;
            background: white;
        }
        #speedo img {
            width: 40px;
            height: 40px;
            margin-right: 10px;
            margin-left: 20px;
            background: white;
        }

        #seat p,
        #speedo p {
            margin: 0;
            width: 225px
        }

        #carname {
            background: white;
        }

        #carname p {
            text-align: center;
            /* background: white; */
            /* background-color: white; */
        }

        #button1 {
            margin-left: 40px;
            
        }

        button {
            width: 100px;
            height: 40px;
            font-size: 20px;
            background-color : cadetblue;
        }

        button:hover {
            /* box-shadow: 0 8px 16px rgba(0, 0, 0, 0.5); */
            transform: scale(0.55);
            background-color: rgba(128, 128, 128, 0.527);
            border: none;
        }

        h2 {
            margin: 0;
            /* Remove default margin */
        }
        .de {
            list-style :none;
        }
        .de ul li {
            display: block;
            /* margin-right: 20px; */
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.box ,button').mouseenter(function () {
                $(this).css('transform', 'scale(1.05)');
            }).mouseleave(function () {
                $(this).css('transform', 'scale(1)');
            });
        });
    </script>

</head>

<body>
    <center>
        <h2>AVAILABLE CARS</h2>
    </center>
    <div id="button1"><button onclick="window.location.href='cuspage.php'">Home</button></div>
<div class="row">
        <?php 
        require_once('connection.php');
        session_start();

        $username = $_SESSION['username'];
        $passw = $_SESSION['password'];
        $_SESSION['password'] = $passw;
        $_SESSION['username'] = $username;
        
        $sql="select * from users where FNAME = '$username' and PASSWORD = '$passw'";
        $name = mysqli_query($conn,$sql);
        $rows=mysqli_fetch_assoc($name);
        $sql2="select *from cars where AVAILABLE='Y'";
        $cars= mysqli_query($conn,$sql2);
        ?>

<?php
while($result= mysqli_fetch_array($cars))
{
    $car_id = $result['CAR_ID']; // Get the car ID
?>
    <div class="column">
        <a href="booking.php?id=<?php echo $car_id ?>"> <!-- Add car ID to the URL -->
            <div class="box">
                <img src="<?php echo $result['CAR_IMG']?>" alt="Bugati Car">
                <div id="carname">
                    <p><?php echo $result['CAR_NAME']?></p>
                </div>
                <div id="seat">
                    <img src="seat.jpg">
                    <p><?php echo $result['CAPACITY']?></p>
                </div>
                <div id="speedo">
                    <img src="flogo.png">
                    <p><?php echo $result['FUEL_TYPE']?></p>
                </div>
                <p>Per Day :₹<?php echo $result['PRICE']?>/-</p> 
                <center><a href="booking.php?id=<?php echo $car_id ?>" style="font-size: 15px; background-color: green; display: inline-block; padding: 10px 20px; color: white; text-decoration: none;">BOOK NOW</a></center>
            </div>
        </a>
    </div>
<?php
}
?>
    </div>

</body>

</html>