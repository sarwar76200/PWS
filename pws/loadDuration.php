<?php
    include("connection.php");

    $search_term = $_POST['duration11'];

    $sql = "SELECT distinct(duration_Type) FROM duration WHERE duration_Type LIKE '$search_term%'";
    $result = mysqli_query($conn, $sql) or die("SQL Query Failed.");

    $output = "<ul>";

        if(mysqli_num_rows($result) > 0){  
            while($row = mysqli_fetch_assoc($result)){
                $output .= "<li>{$row['duration_Type']}</li>";
            }
    }else{  
        $output .= "<li>Duration Not Found</li>";
    } 
    $output .= "</ul>";

    echo $output;



?>
