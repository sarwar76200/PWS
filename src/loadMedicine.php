<?php
    $host = "localhost";
    $user = "root";
    $password ="";
    $dataBaseName = "pws"; //database name means table name 

    //connect database with php 
    $conn = mysqli_connect($host,$user,$password,$dataBaseName);


    // if($conn){
    //     echo "Connect ok";
    // }
    // else{
    //     echo "Connect faild";
    // }


    $search_term = $_POST['Drugs'];

    $sql = "SELECT distinct(Brand_Name) FROM drugs WHERE Brand_Name LIKE '$search_term%' ORDER BY Brand_Name ASC LIMIT 10";
    $result = mysqli_query($conn, $sql) or die("SQL Query Failed.");

    $output = "<ul>";

        if(mysqli_num_rows($result) > 0){  
            while($row = mysqli_fetch_assoc($result)){
                $output .= "<li>{$row['Brand_Name']}</li>";
            }
    }else{  
        $output .= "<li>Medicine Not Found</li>";
    } 
    $output .= "</ul>";

    echo $output;



?>
