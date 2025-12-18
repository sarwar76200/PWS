<?php
    include("connection.php");

    $search_term = $_POST['instruction11'];

    $sql = "SELECT distinct(Instruction_Type) FROM instruction WHERE Instruction_Type LIKE '$search_term%'";
    $result = mysqli_query($conn, $sql) or die("SQL Query Failed.");

    $output = "<ul>";

        if(mysqli_num_rows($result) > 0){  
            while($row = mysqli_fetch_assoc($result)){
                $output .= "<li>{$row['Instruction_Type']}</li>";
            }
    }else{  
        $output .= "<li>Instruction Not Found</li>";
    } 
    $output .= "</ul>";

    echo $output;



?>
