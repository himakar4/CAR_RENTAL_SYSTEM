<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    session_start();
    require_once('connection.php');
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $uname = $_POST['username'];
        $pas = $_POST['password'];

        if(empty($uname) || empty($pas)){
            echo "Please fill all the fields";
        }
        else{
            $sql = "SELECT FNAME,PASSWORD from users";
            $res=mysqli_query($conn,$sql);
            $F=0;
            if($res -> num_rows > 0)
            {
                while($row= $res -> fetch_assoc()){
                    if($row["FNAME"]== $uname && $row["PASSWORD"]== $pas){
                        $_SESSION['username'] = $uname;
                        $_SESSION['password'] = $pas;
                        $F=1;
                        echo '<script> window.location.href = "cuspage.php";</script>';
                        exit;
                    }
                }
                if($F==0){
                    echo '<script>alert("Login failed")</script>';
                    echo '<script> window.location.href = "page.html";</script>';
               }
            }
        }
    }
?>
        
</body>
</html>
