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
        <link rel="stylesheet" type="text/css" href="../public/css/style.css"> 
	<link rel="shortcut icon" href="../public/imgs/favicon.png">
    </head>
    
    <body>  
        <div id="container">
            <img src ="../public/imgs/cmsb.jpg" height="80" width="140"/>
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
            
            <div id="loginForm">
                <h2>Login</h2>
                <form id="login" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
                    <label>Name:&nbsp</label>
                    <input type="text" name="username" maxlength="20">
                    <br><br>
                    <label>Password: &nbsp</label>
                    <input type="password" name="password" maxlength="20">
                    <br><br>
                    <input type="submit" name="Login" value="Submit" style="width:100px; border-style:groove"> 
                </form>
            </div>
            
            <?php
                echo "<h3>Your Input:</h3>";
                echo "Username: " . $username;
                echo "<br>Password: " . $password;
            ?>
        </div>
    </body>
</html>
