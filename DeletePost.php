<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "s661a552", "ohz3heet", "s661a552");
    if ($mysqli->connect_error){
        printf("Connection failed %s\n", $mysqli->connect_error);
        exit();
    }

    $user = $_POST["user_id"];

    $query = "SELECT post_id, content, author_id from Posts";
    $result = $mysqli->query($query);

    if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
            $delete = $_POST[$row["post_id"]];
            if ($delete == "on"){
                $query = "DELETE FROM Posts WHERE post_id='" . $row["post_id"] . "'";
                $deleted = $mysqli->query($query);
                echo "Post ID: " . $row["post_id"] . " has been deleted.<br>";
            }
        }
    }
    $mysqli->close();
?>