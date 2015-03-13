<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Helpdesk</title>        
       <!-- <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>http://127.0.0.1/cradar/public/css/style.css"> -->
	<link rel="shortcut icon" href="imgs/favicon.png">
        <style>
                body{
                margin: 0px;
                padding: 0px;
                height: auto;
                font-family: Arial, Sans-serif;
                background-color: #FFFEF6;
                }
                #container{
                    text-align: center;
                    //padding-top: 10px;
                }
                #login{ 
                    vertical-align: text-top;
                }
                
        </style>
    </head>
    
    <body>  
            <div id="container">
                <img src ="public/imgs/cmsb.jpg" heigt="100" width="200"/>
                <?php
              // define variables and set to empty values
              $username = $password = "";

                if (filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST") {
                   $username = test_input(filter_input(INPUT_POST, "username"));
                   $password = test_input(filter_input(INPUT_POST, "password"));
                }

                function test_input($data) {
                   $data = trim($data);
                   $data = stripslashes($data);
                   $data = htmlspecialchars($data);
                   return $data;
                }
                ?>

                <h2>Login</h2>
                <form id="login" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
                   Name: <input type="text" name="username">
                   <br><br>
                   Password: <input type="password" name="password">
                   <br><br>
                   <input type="submit" name="Login" value="Submit"> 
                </form>

                <?php
                echo "<h3>Your Input:</h3>";
                echo "Username: " . $username;
                echo "<br>Password: " . $password;
                ?>
            </div>
        </body>
</html>
