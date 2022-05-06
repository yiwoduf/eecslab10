<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "s661a552", "ohz3heet", "s661a552");
    if ($mysqli->connect_error){
        printf("Connection failed %s\n", $mysqli->connect_error);
        exit();
    }

    $user = $_POST["user_id"];
    $post = $_POST["post"];

    if ($post == ""){
        echo "Posts cannot be empty.";
        exit();
    }

    $query = "SELECT user_id from Users";
    $result = $mysqli->query($query);

    $found = FALSE;
    if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
            if ($row["user_id"] == $user){
                $found = TRUE;
            }
        }
    }
    if (!$found){
        echo "User not found!";
        exit();
    }

    $query = "INSERT INTO Posts (content, author_id) VALUES ('" . $post . "', '" . $user .  "')";
    if ($result = $mysqli->query($query)){
        echo "Posted successfully!";
    }
    else{
        echo "Unexpected Error.";
    }

    $mysqli->close();
?>