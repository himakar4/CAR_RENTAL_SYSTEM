<?php
    require_once('connection.php');
    session_start();
    if(isset($_SESSION['username']) && isset($_SESSION['password'])) {
        $username = $_SESSION['username'];
        $passw = $_SESSION['password'];
        $sql = "SELECT * FROM users WHERE FNAME = '$username' AND PASSWORD = '$passw'";
        $res = mysqli_query($conn, $sql);
        if($res->num_rows > 0) {
            $row = $res->fetch_assoc();

            // Check if edit button is pressed
            if(isset($_GET['edit'])) {
                // Display the edit form
                ?>
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Edit Profile</title>
                    <style>
                        html, body {
                            margin: 0;
                            padding: 0;
                            height: 100%;
                            background: linear-gradient(to top, rgba(0, 0, 0, 0)50%, rgba(0, 0, 0, 0)50%), url("images/cblur.jpg");
                            background-position: center;
                            background-size: cover;
                            /* background-color: #f0f0f0; Change background color as needed */
                        }
                        .details {
                            border: 2px solid brown;
                            padding: 20px;
                            margin: 20px;
                            display: flex;
                            flex-direction: column;
                        }
                        .details > div {
                            display: flex;
                            margin-bottom: 10px;
                        }
                        .details > div > p {
                            margin: 0;
                            margin-left: 10px;
                        }
                        .password-toggle {
                            cursor: pointer;
                            color: blue;
                            text-decoration: underline;
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
                        /* .edit-form{
                            margin-top :75px;
                        } */
                    </style>
                </head>
                <body>
                    <center>
                    <div class="edit-form">
                        <form action="profile.php" method="POST">
                            <label for="email">Username:</label><br>
                            <input type="text" id="uname" name="uname" value="<?php echo $row['FNAME']; ?>"><br>
                            <label for="email">Email:</label><br>
                            <input type="text" id="email" name="email" value="<?php echo $row['EMAIL']; ?>"><br>
                            <label for="lic_num">License Number:</label><br>
                            <input type="text" id="lic_num" name="lic_num" value="<?php echo $row['LIC_NUM']; ?>"><br>
                            <label for="phone_number">Phone Number:</label><br>
                            <input type="text" id="phone_number" name="phone_number" value="<?php echo $row['PHONE_NUMBER']; ?>"><br>
                            <label for="password">Password:</label><br>
                            <input type="password" id="password" name="password" value="<?php echo $row['PASSWORD']; ?>"><br><br>
                            <input type="submit" name="save_changes" value="Save Changes">
                        </form>
                    </div>
                    <center>
                </body>
                </html>
                <?php
            } elseif(isset($_POST['save_changes'])) {
                // Handle form submission to update user details\
                $uname = mysqli_real_escape_string($conn, $_POST['uname']);
                $email = mysqli_real_escape_string($conn, $_POST['email']);
                $lic_num = mysqli_real_escape_string($conn, $_POST['lic_num']);
                $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
                $password = mysqli_real_escape_string($conn, $_POST['password']);

                // Update query
                $update_query = "UPDATE users SET FNAME = '$uname', EMAIL = '$email', LIC_NUM = '$lic_num', PHONE_NUMBER = '$phone_number', PASSWORD = '$password' WHERE FNAME = '$username'";
                $update_result = mysqli_query($conn, $update_query);

                if ($update_result) {
                    // Redirect back to profile.php after updating
                    header("Location: profile.php");
                    exit();
                } else {
                    echo "Error updating record: " . mysqli_error($conn);
                }
            } else {
                // Display user details if not in edit mode
                ?>
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>User Details</title>
                    <style>
                        html, body {
                            margin: 0;
                            padding: 0;
                            /* height: 100%; */
                            /* background: linear-gradient(to top, rgba(0, 0, 0, 0)50%, rgba(0, 0, 0, 0)50%), url("cblur.jpg"); */
                            /* background-position: center; */
                            background-size: cover;
                        }
                        .details {
                            padding: 20px;
                            margin: 20px;
                            margin-top: 180px;
                            display: flex;
                            flex-direction: column;
                        }
                        .details > div {
                            display: flex;
                            margin-bottom: 10px;
                        }
                        .details > div > p {
                            margin: 0;
                            margin-left: 10px;
                        }
                        .password-toggle {
                            cursor: pointer;
                            color: blue;
                            text-decoration: underline;
                        }
                        #back{
                            width: 100px;
                            height: 40px;
                            background: dimgrey;
                            border:none;
                            position: absolute;
                            top:45px;
                            right : 75px;
                            font-size: 17px;
                            border-radius: 4px;

                        }
                        .name {
                            width: 100px;
                            height: 40px;
                            background: cadetblue;
                            border: none;
                            position: absolute;
                            top: 95px;
                            right: 75px;
                            font-size: 17px;
                            border-radius: 4px;
                            display: flex; /* Added */
                            justify-content: center; /* Added */
                            align-items: center; /* Added */
                            font-weight: bold;
                        }

                        input[type="submit"] {
                            background: transparent; /* Changed */
                            border: none;
                            color: white; /* Changed */
                            cursor: pointer;
                            outline: none; /* Added */
                            font-size: 16px; /* Adjusted */
                        }

                        input[type="submit"]:hover {
                            color: red; /* Changed */
                        }


                        #back a{
                            text-decoration: none;
                            color: white;
                            font-weight: bold;
                        }

                        table {
                            width: 100%;
                            border-collapse: collapse;
                        }

                        table, th, td {
                            border: 1px solid black;
                        }

                        th, td {
                            padding: 10px;
                        }

                        th {
                            background-color: #f2f2f2;
                        }

                        .password-field {
                            display: inline-block;
                            padding: 2px 6px;
                            border: 1px solid #ccc;
                            border-radius: 3px;
                        }

                        .password-toggle {
                            cursor: pointer;
                            color: blue;
                            margin-left: 10px;
                        }

                        .password-toggle:hover {
                            text-decoration: underline;
                        }

                    </style>
                </head>
                <body>
                <form method="get" action="profile.php">
                    <div class="name">
                    <input type="submit" name="edit" value="Edit">
                    </div>
                            
                        </form>
                        <button id="back"><a href="cuspage.php">BACK</a></button>
                        <div class="details">
                            <h1>My Account</h1>
                            <hr>
                            <hr style="border-color: red;">
                            <table>
                                <tr>
                                    <td>USERNAME:</td>
                                    <td><?php echo $row['FNAME']?></td>
                                </tr>
                                <tr>
                                    <td>EMAIL:</td>
                                    <td><?php echo $row['EMAIL']?></td>
                                </tr>
                                <tr>
                                    <td>LICENSE NUMBER:</td>
                                    <td><?php echo $row['LIC_NUM']?></td>
                                </tr>
                                <tr>
                                    <td>PHONE NUMBER:</td>
                                    <td><?php echo $row['PHONE_NUMBER']?></td>
                                </tr>
                                <tr>
                                    <td>PASSWORD:</td>
                                    <td>
                                        <span class="password-field"><?php echo str_repeat("*", strlen($row['PASSWORD'])); ?></span>
                                        <span class="password-toggle">Show</span>
                                    </td>
                                </tr>
                            </table>
                        </div>

                </body>
                </html>
                <?php
            }
        }
    } else {
        // Redirect user to login page or handle accordingly if session variables are not set
    }
    
?>
 <script>
        // JavaScript to toggle password visibility
        document.addEventListener("DOMContentLoaded", function() {
            var togglePassword = document.querySelector(".password-toggle");
            var passwordField = document.querySelector(".password-field");

            togglePassword.addEventListener("click", function() {
                if (passwordField.getAttribute("data-visible") === "true") {
                    passwordField.textContent = passwordField.textContent.replace(/./g, "*");
                    passwordField.setAttribute("data-visible", "false");
                    togglePassword.textContent = "Show";
                } else {
                    passwordField.textContent = "<?php echo $row['PASSWORD']; ?>";
                    passwordField.setAttribute("data-visible", "true");
                    togglePassword.textContent = "Hide";
                }
            });
        });
    </script>
