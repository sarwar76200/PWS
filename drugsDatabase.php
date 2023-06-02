<?php

    include("PHPConnect.php");


    $query = "SELECT * FROM drugs LIMIT 500";
    $final_query = mysqli_query($conn,$query);
    $count = mysqli_num_rows($final_query);


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="drugsDatabase.css">
</head>
<body>
    
    <header>
        <nav>
            <a href="homepage.php">Home</a>
            <a href="ViewAllPrescription.php">View All Prescription</a>
            <a href="drugsDatabase.php">Drugs Database</a>
            <a href="sms.php">SMS</a>
            <!-- <a href="appointment.php">Appointment</a> -->
            <div class="animation start-home"></div>
        </nav>
    </header>


    <table>
        <thead>
            <th class="id">ID</th>
            <th class="brandNane">Brand Name</th>
            <th class="genericName">Generic Name</th>
            <th class="dosageType">Dosage Type</th>
            <th class="strength">Strength</th>
            <th class="pharmaceutical">Pharmaceutical</th>
            <th class="price">Unit Price</th>
        </thead>

        <?php

            if($count != 0)
            {
                while($row = mysqli_fetch_assoc($final_query)){
                    $id = $row['ID'];
                    $BrandName = $row['Brand_Name'];
                    $GenericName = $row['Generic_Name'];
                    $DosageType = $row['Dosage_Type'];
                    $Strength = $row['Strength'];
                    $Pharmaceutical = $row['Pharmaceutical'];
                    $Price = $row['Unit_Price'];

                    
                    echo "<tbody><tr>
                    <td>".$row['ID']."</td>
                    <td>".$row['Brand_Name']."</td>
                    <td>".$row['Generic_Name']."</td>
                    <td>".$row['Dosage_Type']."</td>
                    <td>".$row['Strength']."</td>
                    <td>".$row['Pharmaceutical']."</td>
                    <td>".$row['Unit_Price']."</td>

                    </td></tr></tbody>";
                }
            
            }
            else{

            }
            
        ?>
    </table>



</body>
</html>