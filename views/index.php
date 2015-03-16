<!DOCTYPE html>
<html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
    <head>
        <meta charset="UTF-8">
        <title>Helpdesk</title>        
        <link rel="stylesheet" type="text/css" href="../public/css/style.css"> 
	<link rel="shortcut icon" href="../public/imgs/favicon.png">
    </head>
    
    <body>  
        <div id="container">
            <img src ="../public/imgs/cms.jpg" alt="logo"/>
            <?php

                // define variables and set to empty values
                $username = $password = $nameErr = $passErr = "";
                
                if ($_SERVER["REQUEST_METHOD"] == "POST"){
                    
                    if (empty(filter_input(INPUT_POST, "username"))) {
                        $nameErr = "Name is required";
                      } else {
                        $username = test_input(filter_input(INPUT_POST, "username"));
                        // check if name only contains letters and whitespace
                        if (!\preg_match("/^[a-zA-Z ]*$/",$username)) {
                            $nameErr = "Only letters and white space allowed"; 
                        }
                      }
                    if (empty(filter_input(INPUT_POST, "password"))) {
                        $passErr = "Password is required";
                      } else {
                        $password = test_input(filter_input(INPUT_POST, "password"));
                      }
                }
                
                function test_input($data) {
                   $data = trim($data);
                   $data = stripslashes($data);
                   $data = htmlspecialchars($data);
                   return $data;
                }
            ?>
            
            <div id="loginForm">
                <h2>Login</h2>
                <form id="login" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <label>Name:&nbsp</label>
                    <input type="text" name="username" maxlength="20">
                    <span id="error"><?php echo "<br>$nameErr" ?></span>
                    <br>
                    <label>Password: &nbsp</label>
                    <input type="password" name="password" maxlength="20">
                    <span id="error"><?php echo "<br>$passErr" ?></span>
                    <br>
                    <button type="submit" name="Login" value="Login" style="width:100px; border-style:groove">Login</button>
                </form>
            </div>
            
            <?php
                echo "<h3>Your Input:</h3>";
                echo "Username: " . $username;
                echo "<br>Password: " . $password;
            ?>
        </div>
        
        <div id="footer">
            <p>Copyright 2015</p>
        </div>
    </body>
</html>