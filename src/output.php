<?php

// error_reporting(0);
// include("PHPConnect.php");
// include("homepage.php");

/**----------------------------------------------------------------------------------- 
 * This Code is show the value in RegNO field and auto increment value after SUBMIT 
    -------------------------------------------------------------------------------------*/
// $query = "SELECT * FROM patientdatabase ORDER BY RegNo DESC LIMIT 1";
// $result = mysqli_query($conn, $query);
// $row = mysqli_fetch_array($result);
// $last_RegNo = $row['RegNo'];

// if ($last_RegNo == " ") {
//     $patient_RegNo = 1;
// } else {
//     $patient_RegNo = ($last_RegNo + 1);
// }


// $Name = $Age = $Sex;

// $Name = '';
// $Age = '';

if (isset($_POST['submit_btn']) || isset($Name)) {

    $Name = $_POST['name'];
    $Age = $_POST['age'];
    $Sex = $_POST['sex'];
    $Mobile = $_POST['mobile'];
    $Reg = $_POST['reg'];
    $Address = $_POST['address'];
    $Date = $_POST['date'];


    // echo 'Name : '.$Name.'<br>';
    // echo $Age;
    // echo $Sex;
    // echo $Mobile;
    // echo $Reg;
    // echo $Address;
    // echo $Date;


    $sql = "INSERT INTO patientdatabase(RegNo,Patient_Name,Age,Sex,Mobile,Address,Date) 
        VALUES('$Reg','$Name','$Age','$Sex','$Mobile','$Address','$Date')";





    $BP = $_POST['BP'];
    $Pulse = $_POST['Pulse'];
    $Temp = $_POST['Temp'];
    $SpO2 = $_POST['SpO2'];
    $Heart = $_POST['Heart'];
    $Lungs = $_POST['Lungs'];
    $Abd = $_POST['Abd'];
    $Anaemia = $_POST['Anaemia'];
    $Janudice = $_POST['Janudice'];
    $Cyanosis = $_POST['Cyanosis'];
    $Oedema = $_POST['Oedema'];

    $BpUnit = $_POST['bpUnit'];
    $PulseUnit = $_POST['pulseUnit'];
    $TempUnit = $_POST['tempUnit'];
    $SpO2Unit = $_POST['spO2Unit'];
    $HeartUnit = $_POST['heartUnit'];
    $LungsUnit = $_POST['lungsUnit'];
    $AbdUnit = $_POST['abdUnit'];
    $AnaemiaUnit = $_POST['anaemiaUnit'];
    $JanudiceUnit = $_POST['janudiceUnit'];
    $CyanosisUnit = $_POST['cyanosisUnit'];
    $OedemaUnit = $_POST['oedemaUnit'];


    $ho = $_POST['H/O'];
    $HO = "";

    foreach ($ho as $ho2) {
        $HO .= " *" . $ho2;
    }



    $sql1 = "INSERT INTO prescriptiontablehistory(BP,BP_Unit,Pulse,Pulse_Unit,Temp,Temp_Unit,SpO2,SpO2_Unit,Heart,Heart_Unit,Lungs,Lungs_Unit,Abd,Abd_Unit,Anaemia,Anaemia_Unit,Janusice,Janudice_Unit,Cyanosis,Cyanosis_Unit,Oedema,Oedema_Unit,HO,regNo) 
        VALUES('$BP','$BpUnit','$Pulse','$PulseUnit','$Temp','$TempUnit','$SpO2','$SpO2Unit','$Heart','$HeartUnit','$Lungs','$LungsUnit','$Abd','$AbdUnit','$Anaemia','$AnaemiaUnit','$Janudice','$JanudiceUnit','$Cyanosis','$CyanosisUnit','$Oedema','$OedemaUnit','$HO','$Reg')";




    echo $tempUnit . '<br>';
    echo $BP . '<br>';
    echo $BpUnit . '<br>';
    echo $Pulse . '<br>';
    echo $PulseUnit . '<br>';
    echo $Temp . '<br>';
    echo $TempUnit . '<br>';
    echo $Heart . '<br>';
    echo $HeartUnit . '<br>';
    echo $Lungs . '<br>';
    echo $LungsUnit . '<br>';
    echo $HO;


    $No1 = $_POST['no1'];
    $Brand1 = $_POST['brand1'];
    $Dose1 = $_POST['dose1'];
    $Instruction1 = $_POST['instruction1'];
    $Duration1 = $_POST['duration1'];

    echo $No1;
    // echo $Brand1;
    // echo $Dose1;
    // echo $Instruction1;
    // echo $Duration1;


    $No2 = $_POST['no2'];
    $Brand2 = $_POST['brand2'];
    $Dose2 = $_POST['dose2'];
    $Instruction2 = $_POST['instruction2'];
    $Duration2 = $_POST['duration2'];


    $No3 = $_POST['no3'];
    $Brand3 = $_POST['brand3'];
    $Dose3 = $_POST['dose3'];
    $Instruction3 = $_POST['instruction3'];
    $Duration3 = $_POST['duration3'];

    $No4 = $_POST['no4'];
    $Brand4 = $_POST['brand4'];
    $Dose4 = $_POST['dose4'];
    $Instruction4 = $_POST['instruction4'];
    $Duration4 = $_POST['duration4'];


    $No5 = $_POST['no5'];
    $Brand5 = $_POST['brand5'];
    $Dose5 = $_POST['dose5'];
    $Instruction5 = $_POST['instruction5'];
    $Duration5 = $_POST['duration5'];



    $sql2 = "INSERT INTO prescriptiontable(reg_no,Medicine,Dose,Instruction,Duration) 
        VALUES('$Reg','$Brand1, $Brand2, $Brand3, $Brand4, $Brand5',
                '$Dose1, $Dose2, $Dose3, $Dose4, $Dose5',
                '$Instruction1, $Instruction2, $Instruction3, $Instruction4, $Instruction5',
                '$Duration1, $Duration2, $Duration3, $Duration4, $Duration5')";



    $query1 = mysqli_query($conn, $sql);
    $query2 = mysqli_query($conn, $sql1);
    $query3 = mysqli_query($conn, $sql2);
    header("Refresh:0;");
}




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Output</title>
    <link rel="stylesheet" href="output.css">
</head>

<body>

    <div class="mainOutput">

        <div class="header">

            <h1>Dr. Hasan Chowdhury</h1>
            MBBS, MD (Medicine). FCPS <br>
            Professor & Head (Medicine) <br>
            ZilSOft Demo Medical College <br>
            Medicine Specialist <br>
            BMDC Reg No A-0000 <br>
            Moble: 0171-00-000 <br>


        </div>

        <div class="patient_Details">

            <?php


            ?>

            Name: <?php echo $Name;  ?>
            Age: <?php echo $Age; ?>

            <!-- <table>
                <tr>
                    <td>Name :</td>
                    <td><?php echo $Name ?></td>
                    <td>Age :</td>
                    <td><?php echo $Age ?></td>
                    <td>Sex :</td>
                    <td><?php echo $Sex ?></td>
                    <td>Reg No. :</td>
                    <td><?php echo $Reg ?></td>
                </tr>
                <tr>
                    <td>Mobile :</td>
                    <td><?php echo $Mobile ?></td>
                    <td>Address :</td>
                    <td><?php echo $Address ?></td>
                    <td>Date :</td>
                    <td><?php echo $Date ?></td>
                </tr>

            </table> -->


        </div>

        <div class="prescription_Bar">

            <div class="history_Bar">

            </div>

            <div class="prescription_Details">

            </div>

        </div>


    </div>


</body>

</html>

<script type="text/javascript" src="js/jquery.js"></script>
<script>
    document.getElementById('Date').value = new Date().toISOString().substring(0, 10);
</script>