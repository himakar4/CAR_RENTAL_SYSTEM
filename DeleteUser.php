<?php

require_once('connection.php');
$query = "select * from users";
$queryy = mysqli_query($conn, $query);
$num = mysqli_num_rows($queryy);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete_query = "DELETE FROM users WHERE EMAIL='$id'";
    $delete_result = mysqli_query($conn, $delete_query);
    if ($delete_result) {
        echo "<script>alert('User deleted successfully!');</script>";
    } else {
        echo "<script>alert('Error deleting user.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMINISTRATOR</title>
    <style>
*{
    margin: 0;
    padding: 0;

}
body {
    background-image: url("images/ablur.jpg");
    background-repeat: no-repeat;
    background-size: cover;
}
.hai{
    width: 100%;
    background: linear-gradient(to top, rgba(0,0,0,0)50%, rgba(0,0,0,0)50%);
    background-position: center;
    background-size: cover;
    height: 109vh;
    animation: infiniteScrollBg 50s linear infinite;
}
.main{
    width: 100%;
    /* background: linear-gradient(to top, rgba(0,0,0,0)50%, rgba(0,0,0,0)50%); */
    background-position: center;
    background-size: cover;
    height: 109vh;
    animation: infiniteScrollBg 50s linear infinite;
}
.navbar{
    width: 1200px;
    height: 75px;
    margin: auto;
}

.icon{
    width:200px;
    float: left;
    height : 70px;
}

.logo{
    color: #ff7200;
    font-size: 35px;
    font-family: Arial;
    padding-left: 20px;
    float:left;
    padding-top: 10px;

}
.menu{
    width: 400px;
    float: left;
    height: 70px;

}

ul{
    float: left;
    display: flex;
    justify-content: center;
    align-items: center;
}

ul li{
    list-style: none;
    margin-left: 62px;
    margin-top: 27px;
    font-size: 14px;

}

ul li a{
    text-decoration: none;
    color: black;
    font-family: Arial;
    font-weight: bold;
    transition: 0.4s ease-in-out;

}

.content-table{
   border-collapse: collapse;
    
    font-size: 0.9em;
    min-width: 400px;
    border-radius: 5px 5px 0 0;
    overflow: hidden;
    box-shadow:0 0  20px rgba(0,0,0,0.15);
    margin-left : 350px ;
    margin-top: 170px;
    margin-right : 250px;
    width: 800px;
    height: 350px;
}
.content-table thead tr{
    background-color: cadetblue;
    color: white;
    text-align: left;
}

.content-table th,
.content-table td{
    padding: 12px 15px;


}

.content-table tbody tr{
    border-bottom: 1px solid #dddddd;
}
.content-table tbody tr{
    background-color: white;

}
.content-table tbody tr{
    border-bottom: 2px solid cadetblue;
}

.content-table thead .active-row{
    font-weight:  bold;
    color: orange;
}


.header {
    color: black;
    font-family : fantasy;
    position: absolute;
    top : 35px;
    left :50px;
}



.nn{
    width:100px;
    /* background: #ff7200; */
    border:none;
    height: 40px;
    font-size: 18px;
    border-radius: 10px;
    cursor: pointer;
    color:white;
    transition: 0.4s ease;

}


.nn a{
    text-decoration: none;
    color: black;
    font-weight: bold;
    
}

.but a{
    text-decoration: none;
    color: black;
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
    <div>
        <h1 class="header">CHAOS</h1>
        <button class="back"><a href="adminpage.php">Back</a></button>
        <div>
            <div>
                <table class="content-table">
                    <thead>
                        <tr>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>LICENSE NUMBER</th>
                            <th>PHONE NUMBER</th>
                            <th>DELETE USERS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = mysqli_query($conn, "SELECT * FROM users");
                        while ($res = mysqli_fetch_array($query)) {
                            ?>
                            <tr class="active-row">
                                <td><?php echo $res['FNAME']; ?></td>
                                <td><?php echo $res['EMAIL']; ?></td>
                                <td><?php echo $res['LIC_NUM']; ?></td>
                                <td><?php echo $res['PHONE_NUMBER']; ?></td>
                                <td><button type="button" class="but" name="approve" onclick="deleteUser('<?php echo $res['EMAIL']; ?>')">DELETE USER</button></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function deleteUser(userId) {
            if (confirm("Are you sure you want to delete this user?")) {
                window.location.href = "DeleteUser.php?id=" + userId;
            }
        }
    </script>
</body>
</html>






