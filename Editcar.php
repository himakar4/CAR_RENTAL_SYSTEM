
<?php

require_once('connection.php');
if (isset($conn)) {
    if (isset($_GET['car_id'])) {
        $carid = mysqli_real_escape_string($conn, $_GET['car_id']);
        $query = "SELECT * FROM cars WHERE CAR_ID = '$carid'";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $car = mysqli_fetch_assoc($result);
            $showBackButton = false;
        } else {
            echo "Error fetching car details or car not found.";
        }
    } elseif (isset($_POST['edit_car'])) {
        
        $carid = mysqli_real_escape_string($conn, $_POST['car_id']);
        $carname = mysqli_real_escape_string($conn, $_POST['carname']);
        $fueltype = mysqli_real_escape_string($conn, $_POST['ftype']);
        $capacity = mysqli_real_escape_string($conn, $_POST['capacity']);
        $price = mysqli_real_escape_string($conn, $_POST['price']);

        $update_query = "UPDATE cars SET CAR_NAME = '$carname', FUEL_TYPE = '$fueltype', CAPACITY = '$capacity', PRICE = '$price' WHERE CAR_ID = '$carid'";
        $update_result = mysqli_query($conn, $update_query);

        if ($update_result) {
            header("Location: Editcar.php");
            exit();
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    }
} else {
    echo "Database connection not established.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMINISTRATOR</title>
    <style>
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            background: linear-gradient(to top, rgba(0, 0, 0, 0)50%, rgba(0, 0, 0, 0)50%), url("images/ablur.jpg");
            background-position: center;
            background-size: cover;
        }
        .btn {
            background-color: teal;
            border: none;
            color: white;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 4px;
        }
        
        input[type=text], input[type=number], select {
            /* width: 100%; */
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        
        input[type=submit] {
            background-color: teal;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        input[type=submit]:hover {
            background-color: #ffae42;
        }
        
        table {
            margin-top:100px;
            border-collapse: collapse;
            width: 100%;
        }
        
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
            
        }
        .register{
            background-color : rgba(2, 4, 5, 0.1);
            display : inline;
        }
        tr{
            background-color: #f2f2f2;
        }
        .back {
            top: 34px;
            right: 40px;
            font-size: 18px;
            border-radius: 10px;
            cursor: pointer;
            transition: 0.4s ease;
            position: fixed;
            padding: 7px;
            display: <?php echo $showBackButton ? 'block' : 'none'; ?>; 
        }

        .back a {
            text-decoration: none;
            color: black;
            font-weight: bold;
        }
        .logo {
            color: black;
            font-size: 35px;
            font-family: fantasy;
            padding:15px 0px 30px 25px;
        }
    </style>
    <script>
        function displayAlert() {
            alert("Car details updated successfully!");
        }
    </script>
</head>
<body>
    <div class="main">
        <h1 class ="logo">CHAOS</h1>
        <button class="back" onclick="location.href='adminpage.php'">Back</button>
        <?php if(isset($car)): ?>
            <center>
        <div class="register">
            <form id="editForm" action="Editcar.php" method="POST" onsubmit="displayAlert()">
                <input type="hidden" name="car_id" value="<?php echo $car['CAR_ID']; ?>">
                <label for="carname">Car Name:</label><br>
                <input type="text" id="carname" name="carname" value="<?php echo $car['CAR_NAME']; ?>"><br>
                <label for="ftype">Fuel Type:</label><br>
                <input type="text" id="ftype" name="ftype" value="<?php echo $car['FUEL_TYPE']; ?>"><br>
                <label for="capacity">Capacity:</label><br>
                <input type="number" id="capacity" name="capacity" value="<?php echo $car['CAPACITY']; ?>"><br>
                <label for="price">Price:</label><br>
                <input type="number" id="price" name="price" value="<?php echo $car['PRICE']; ?>"><br><br>
                <input type="submit" class="btn" name="edit_car" value="Save Changes">
            </form>
        </div>
        <center>
        <?php else: ?>
        <table>
            <?php
            $query = mysqli_query($conn, 'SELECT * FROM cars');

            while($car = mysqli_fetch_assoc($query)) {
                echo "<tr>";
                echo "<td>" . $car['CAR_ID'] . "</td>";
                echo "<td>" . $car['CAR_NAME'] . "</td>";
                echo "<td>" . $car['FUEL_TYPE'] . "</td>";
                echo "<td>" . $car['CAPACITY'] . "</td>";
                echo "<td>" . $car['PRICE'] . "</td>";
                echo '<td><form method="get" action="Editcar.php"><input type="hidden" name="car_id" value="' . $car['CAR_ID'] . '"><input type="submit" class="btn" name="edit" value="Edit"></form></td>';
                echo "</tr>";
            }
            ?>
        </table>
        <?php endif; ?>
    </div>
</body>
</html>
