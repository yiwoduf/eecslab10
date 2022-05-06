<style> <?php include '/style.css'; ?> </style>
<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "s661a552", "ohz3heet", "s661a552");
    if ($mysqli->connect_error){
        printf("Connection failed %s\n", $mysqli->connect_error);
        exit();
    }

    $user = $_POST["user_id"];

    if ($user == ""){
        echo "Please enter a username.";
        exit();
    }

    $query = "INSERT INTO Users (user_id) VALUES ('" . $user .  "')";
    if ($result = $mysqli->query($query)){
        echo "User created successfully!";
    }
    else{
        echo "Username :" . $user . " already exists.";
    }
    $mysqli->close();
?>