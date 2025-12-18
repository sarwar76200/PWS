<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PWS - Prescription Generator</title>
    <link rel="stylesheet" href="drugsDatabase.css">
    <!-- <link rel="stylesheet" href="drugsDatabase.css"> -->
</head>

<body>

    <header>
        <nav>
            <a href="homepage.php">Home</a>
            <a href="#">Prescriptions</a>
            <a href="drugs.php">Drug Database</a>
            <a href="sms.php">SMS</a>
            <!-- <a href="appointment.php">Appointment</a> -->
            <div class="animation start-home"></div>
        </nav>
    </header>

    <form align="right" action="" method="post">
        <input type="text" id="search_drug" name="search_drug">
        <button class="submit" type="submit" name="search_btn">Search</button>
    </form>



    <table>
        <thead>
            <th>Reg No</th>
            <th>Patient Name</th>
            <th>Age</th>
            <th>Sex</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Date</th>
            <th>Action</th>
            <!-- <th class="genericName">Generic Name</th>
            <th class="dosageType">Dosage Type</th>
            <th class="strength">Strength</th>
            <th class="pharmaceutical">Pharmaceutical</th>
            <th class="price">Unit Price</th> -->
        </thead>


        <?php

        include("connection.php");

        // $query = "SELECT MAX(`Reg`) FROM `prescriptions`";
        $query = "SELECT * FROM `patientdatabase` WHERE 1 ORDER BY `RegNo` DESC LIMIT 50";
        if (isset($_POST['search_btn'])) {
            $query = "SELECT * FROM `patientdatabase` WHERE `RegNo` LIKE '%" . $_POST["search_drug"] . "%' OR `Patient_Name` LIKE '%" . $_POST["search_drug"] . "%' ORDER BY `RegNo` DESC LIMIT 50";
        }
        $result = mysqli_query($conn, $query);



        while ($row = mysqli_fetch_array($result)) {
            // echo ($row['RegNo'] . ' ' . $row['Patient_Name'] . '<br/>');

            $reg = $row['RegNo'];
            $name = $row['Patient_Name'];
            $age = $row['Age'];
            $sex = $row['Sex'];
            $mobile = $row['Mobile'];
            $address = $row['Address'];
            $date = $row['Date'];
            if ($reg == 0) continue;
            // $GenericName = $row['Generic_Name'];
            // $DosageType = $row['Dosage_Type'];
            // $Strength = $row['Strength'];
            // $Pharmaceutical = $row['Pharmaceutical'];
            // $Price = $row['Unit_Price'];


            echo "<tbody><tr >
                    <td>" . $reg . "</td>
                    <td>" . $name . "</td>
                    <td>" . $age . "</td>
                    <td>" . $sex . "</td>
                    <td>" . $mobile . "</td>
                    <td>" . $address . "</td>
                    <td>" . $date . "</td>
                    <td>" . '<a href="index.php?regid=' . $reg . '">Edit</a>' . '&nbsp; &nbsp; &nbsp;<a href="deletePrescription.php?regid=' . $reg . '">Delete</a>' . "</td>
                    </td></tr></tbody>";
        }





        ?>

    </table>

    <script>
        function ret(reg_id) {
            sessionStorage.setItem("reg_id", reg_id);
            localStorage.setItem("reg_id", reg_id);
            window.location.href = "index.php";
        }
    </script>


</body>

</html>