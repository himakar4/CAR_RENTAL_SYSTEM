<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMINISTRATOR</title>
</head>
<body>
<style>
html, body {
    margin: 0;
    padding: 0;
    height: 100%;
    background: linear-gradient(to top, rgba(0, 0, 0, 0)50%, rgba(0, 0, 0, 0)50%), url("images/ablur.jpg");
    background-position: center;
    background-size: cover;
}
*{
    margin: 0;
    padding: 0;

}
.hai{
    width: 100%;
    background: linear-gradient(to top, rgba(0,0,0,0)50%, rgba(0,0,0,0)50%);
    background-position: center;
    background-size: cover;
    height: 25vh;
    animation: infiniteScrollBg 50s linear infinite;
}
.main{
    width: 100%;
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
    font-family: fantasy;
    font-weight: bold;
    transition: 0.4s ease-in-out;
    font-size:30px;
}

.content-table{
    border-collapse: collapse;
    
    font-size: 1em;
    min-width: 400px;
    border-radius: 5px 5px 0 0;
    overflow: hidden;
    box-shadow:0 0  20px rgba(0,0,0,0.15);
    margin-left : 100px ;
    margin-top: 25px;
    width: 1300px;
    height: 300px;
}
.content-table thead tr{
    background-color: darkslategrey;
    color: white;
    text-align: center;
}

.content-table th,
.content-table td{
    padding: 12px 15px;


}

.content-table tbody tr{
    background-color: #f3f3f3;
    text-align:center;
}

.content-table tbody tr:last-of-type{
    border-bottom: 2px solid darkslategrey;
}

.content-table thead .active-row{
    font-weight:  bold;
    color: darkslategrey;
    text-align:center;
}


.header{
    margin-top: -700px;
    margin-left: -650px;
    align:center;
}

.add{
    width: 200px;
    height: 40px;
    
    background: #ff7200;
    border:none;
    font-size: 18px;
    border-radius: 10px;
    cursor: pointer;
    color:#fff;
    transition: 0.4s ease;
    margin-left: 1200px;
}

.add a{
    text-decoration: none;
    color: black;
    font-weight: bolder;
    align:center;
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
<?php

require_once('connection.php');
$query="SELECT *from feedback";    
$queryy=mysqli_query($conn,$query);
$num=mysqli_num_rows($queryy);


?>
<div class="hai">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">CHAOS</h2>
                <button class="back"><a href="adminpage.php">Back</a></button>
            </div>
         </div>

         </div>
        <div>
            <!-- <h1 class="header">CARS</h1> -->
            <div>
                <div>
                    <table class="content-table">
                <thead>
                    <tr>
                        
                    <th>FEEDBACK_ID</th> 
                            <th>EMAIL</th>
                        <th>COMMENT</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                
                
                while($res=mysqli_fetch_array($queryy)){
                
                
                ?>
                <tr  class="active-row">
                    
                <tr class="active-row">
                            <td><?php echo $res['FED_ID']; ?></td>
                            <td><?php echo $res['EMAIL']; ?></td>
                            <td><?php echo $res['COMMENT']; ?></td>
                        </tr></php></td>
                    
    
                </tr>
               <?php } ?>
                </tbody>
                </table>
                
                </div>
            </div>
        </div>
</body>
</html>