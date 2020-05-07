<?php
 //#Renan(201830362) 26/04/2020 Created
//define("localhost", HOST);
//define("Project2_Renan", DATABASE);
//define("phpuser", "USER");
//define("123", "PASSWORD");
//The constants are crashing my connection
$connection = new PDO("mysql:host=localhost;dbname=Project2_renan", "phpuser", "123");
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
