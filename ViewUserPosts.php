<style> <?php include '/style.css'; ?> </style>
<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "s661a552", "ohz3heet", "s661a552");
    if ($mysqli->connect_error){
        printf("Connection failed %s\n", $mysqli->connect_error);
        exit();
    }

    $user = $_POST["user_id"];
    echo $user . "'s Posts:<br>";

    $query = "SELECT content from Posts WHERE author_id='$user' ";
    $result = $mysqli->query($query);

    echo "<table style='border: 1px solid black, width: 100%'>";
    if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
            echo "<tr>";
            echo "<td style='border: 1px solid black'>" . $row["content"] . "</td>";
            echo "</tr>";
        }
    }
    echo "</table>";


    $mysqli->close();
?>