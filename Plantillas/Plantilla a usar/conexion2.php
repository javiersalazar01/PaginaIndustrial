<?php 
 $servername = "localhost";
    $username = "dii";
    $password = "dii2014%";
    $dbname = "dii";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
    }

 ?