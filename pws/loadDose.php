<?php
    include("connection.php");

    $search_term = $_POST['dose'];

    $sql = "SELECT distinct(Dose_Type) FROM dose WHERE Dose_Type LIKE '$search_term%'";
    $result = mysqli_query($conn, $sql) or die("SQL Query Failed.");

    $output = "<ul>";

        if(mysqli_num_rows($result) > 0){  
            while($row = mysqli_fetch_assoc($result)){
                $output .= "<li>{$row['Dose_Type']}</li>";
            }
    }else{  
        $output .= "<li>Dose Not Found</li>";
    } 
    $output .= "</ul>";

    echo $output;



?>
