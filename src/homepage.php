<?php

// error_reporting(0);
include("PHPConnect.php");

/**----------------------------------------------------------------------------------- 
 * This Code is show the value in RegNO field and auto increment value after SUBMIT 
    -------------------------------------------------------------------------------------*/
$actual_link = "https://$_SERVER[REQUEST_URI]";

$USER = '';
if (sizeof(explode('=', $actual_link)) > 1) {
    $USER = explode('=', $actual_link)[1];
}

$DOC_NAME = '';
$DOC_EMAIL = '';


$SQL = "SELECT * FROM `user` WHERE `user` = '$USER'";
$ROW = mysqli_fetch_array(mysqli_query($conn, $SQL));
if ($ROW) {
    $DOC_NAME .= $ROW['fname'];
    $DOC_NAME .= ' ' . $ROW['lname'];
    $DOC_EMAIL .= ' ' . $ROW['email'];
} else {
    $DOC_NAME = 'ABC';
    $DOC_EMAIL = 'abc@yahoo.com';
}



$REG_ID = -1;
$PAT_DATA = array_fill(0, 5, "");
$OE_DATA = array("120/80", "98.6", "S1+S2+M0", "NAD", "Soft, Non-Tender");
$HO_DATA = '';
$DRUG_DATA = array_fill(0, 5, "");
$DOSE_DATA = array_fill(0, 5, "");
$INS_DATA = array_fill(0, 5, "");
$DUR_DATA = array_fill(0, 5, "");
if (isset($_GET['regid'])) {
    $REG_ID = $_GET['regid'];
    // echo ($_GET['regid']);
    $P_QUERY = "SELECT * FROM `patientdatabase` WHERE `RegNo` = $REG_ID";
    $RES = mysqli_query($conn, $P_QUERY);
    $PAT_INFO = '';
    while ($ROW = mysqli_fetch_array($RES)) {
        $PAT_INFO .= $ROW['Patient_Name'] . '$';
        $PAT_INFO .= $ROW['Age'] . '$';
        $PAT_INFO .= $ROW['Sex'] . '$';
        $PAT_INFO .=  $ROW['Mobile'] . '$';
        $PAT_INFO .=  $ROW['Address'] . '$';
        $PAT_INFO .=  $ROW['Date'];

        $PAT_DATA  = explode('$', $PAT_INFO);

        // echo ($EXP[1]);
    }

    $DRUG_QUERY = "SELECT * FROM `prescriptiontable` WHERE `reg_no` = $REG_ID";

    $RES = mysqli_query($conn, $DRUG_QUERY);
    while ($ROW = mysqli_fetch_array($RES)) {
        // echo ($ROW['Medicine']);
        $DRUG_DATA  = explode('$', $ROW['Medicine']);
        $DOSE_DATA  = explode('$', $ROW['Dose']);
        $INS_DATA  = explode('$', $ROW['Instruction']);
        $DUR_DATA  = explode('$', $ROW['Duration']);

        // echo ($DRUG_DATA[0]);
        // echo ($EXP[1]);
    }

    $OE_QUERY = "SELECT * FROM `prescriptiontablehistory` WHERE `regNo` = $REG_ID";

    $RES = mysqli_query($conn, $OE_QUERY);
    while ($ROW = mysqli_fetch_array($RES)) {
        $OE_DATA[0] = $ROW['BP'];
        $OE_DATA[1] = $ROW['Temp'];
        $OE_DATA[2] = $ROW['Heart'];
        $OE_DATA[3] = $ROW['Lungs'];
        $OE_DATA[4] = $ROW['Abd'];
        $HO_DATA .= $ROW['HO'];
    }
}


$PAT_NAME = '';


$query = "SELECT * FROM patientdatabase ORDER BY RegNo DESC LIMIT 1";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
$last_RegNo = $row['RegNo'];

if ($last_RegNo == " ") {
    $patient_RegNo = 1;
} else {
    $patient_RegNo = ($last_RegNo + 1);
}

// if ($REG_ID != -1) {
//     $patient_RegNo = $REG_ID;
// }


// $Name = $Age =$Sex;

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
    $Jaundice = $_POST['Jaundice'];
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
    $JaundiceUnit = $_POST['jaundiceUnit'];
    $CyanosisUnit =  $_POST['cyanosisUnit'];
    $OedemaUnit =  $_POST['oedemaUnit'];


    $ho = array_key_exists('H/O', $_POST) ? $_POST['H/O'] : array();
    // print_r($ho);
    $HO = "";

    foreach ($ho as $ho2) {
        $HO .= " *" . $ho2;
    }



    $sql1 = "INSERT INTO prescriptiontablehistory
        VALUES('$patient_RegNo','$BP','$BpUnit','$Pulse','$PulseUnit','$Temp','$TempUnit','$SpO2','$SpO2Unit','$Heart','$HeartUnit','$Lungs','$LungsUnit','$Abd','$AbdUnit','$Anaemia','$AnaemiaUnit','$Jaundice','$JaundiceUnit','$Cyanosis','$CyanosisUnit','$Oedema','$OedemaUnit','$HO')";




    // echo $tempUnit.'<br>';
    // echo $BP.'<br>';
    // echo $BpUnit.'<br>';
    // echo $Pulse.'<br>';
    // echo $PulseUnit.'<br>';
    // echo $Temp.'<br>';
    // echo $TempUnit.'<br>';
    // echo $Heart.'<br>';
    // echo $HeartUnit.'<br>';
    // echo $Lungs.'<br>';
    // echo $LungsUnit.'<br>';
    // echo $HO;


    $No1 = $_POST['no1'];
    $Brand1 = $_POST['brand1'];
    $Dose1 = $_POST['dose1'];
    $Instruction1 = $_POST['instruction1'];
    $Duration1 = $_POST['duration1'];

    // echo $No1;
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
        VALUES('$Reg','$Brand1$$Brand2$$Brand3$$Brand4$$Brand5',
                '$Dose1$$Dose2$$Dose3$$Dose4$$Dose5',
                '$Instruction1$$Instruction2$$Instruction3$$Instruction4$$Instruction5',
                '$Duration1$$Duration2$$Duration3$$Duration4$$Duration5')";



    $query1 = mysqli_query($conn, $sql);
    $query2 = mysqli_query($conn, $sql1);
    $query3 = mysqli_query($conn, $sql2);
    // header("Refresh:0;");

}




?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>

    <link rel="stylesheet" href="homepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />

    <link rel="stylesheet" href="css/jquery.cleditor.css">
</head>

<body>
    <script src="app.js"></script>
</body>

</html>

</head>

<body onload="add_doctor()" onclick="init()" onkeypress="upd_state()">


    <nav>
        <a href="#">Home</a>
        <a href="ViewAllPrescription.php">View All Prescription</a>
        <a href="drugsDatabase.php">Drug Database</a>
        <a href="sms.php">SMS</a>
        <!-- <a href="appointment.php">Appointment</a> -->
        <div class="animation start-home"></div>
    </nav>



    <?php
    // if (isset($_POST['submit_btn']) || isset($Name)) {

    //     $Name = $_POST['name'];
    //     $Age = $_POST['age'];
    //     $Sex = $_POST['sex'];
    //     $Mobile = $_POST['mobile'];
    //     $Reg = $_POST['reg'];
    //     $Address = $_POST['address'];
    //     $Date = $_POST['date'];


    //     // echo 'Name : '.$Name.'<br>';
    //     // echo $Age;
    //     // echo $Sex;
    //     // echo $Mobile;
    //     // echo $Reg;
    //     // echo $Address;
    //     // echo $Date;


    //     $sql = "INSERT INTO patientdatabase(RegNo,Patient_Name,Age,Sex,Mobile,Address,Date) 
    //     VALUES('$Reg','$Name','$Age','$Sex','$Mobile','$Address','$Date')";





    //     $BP = $_POST['BP'];
    //     $Pulse = $_POST['Pulse'];
    //     $Temp = $_POST['Temp'];
    //     $SpO2 = $_POST['SpO2'];
    //     $Heart = $_POST['Heart'];
    //     $Lungs = $_POST['Lungs'];
    //     $Abd = $_POST['Abd'];
    //     $Anaemia = $_POST['Anaemia'];
    //     $Jaundice = $_POST['Jaundice'];
    //     $Cyanosis = $_POST['Cyanosis'];
    //     $Oedema = $_POST['Oedema'];

    //     $BpUnit = $_POST['bpUnit'];
    //     $PulseUnit = $_POST['pulseUnit'];
    //     $TempUnit = $_POST['tempUnit'];
    //     $SpO2Unit = $_POST['spO2Unit'];
    //     $HeartUnit = $_POST['heartUnit'];
    //     $LungsUnit = $_POST['lungsUnit'];
    //     $AbdUnit = $_POST['abdUnit'];
    //     $AnaemiaUnit = $_POST['anaemiaUnit'];
    //     $JaundiceUnit = $_POST['jaundiceUnit'];
    //     $CyanosisUnit = $_POST['cyanosisUnit'];
    //     $OedemaUnit = $_POST['oedemaUnit'];


    //     $ho = array_key_exists('H/O', $_POST) ? $_POST['H/O'] : array();
    //     print_r($ho);


    //     // $HO = "";

    //     // foreach ($ho as $ho2) {
    //     //     $HO .= " *" . $ho2;
    //     // }

    //     $sql1 = "INSERT INTO prescriptiontablehistory(BP,BP_Unit,Pulse,Pulse_Unit,Temp,Temp_Unit,SpO2,SpO2_Unit,Heart,Heart_Unit,Lungs,Lungs_Unit,Abd,Abd_Unit,Anaemia,Anaemia_Unit,Janusice,Janudice_Unit,Cyanosis,Cyanosis_Unit,Oedema,Oedema_Unit,HO,regNo) 
    //     VALUES('$BP','$BpUnit','$Pulse','$PulseUnit','$Temp','$TempUnit','$SpO2','$SpO2Unit','$Heart','$HeartUnit','$Lungs','$LungsUnit','$Abd','$AbdUnit','$Anaemia','$AnaemiaUnit','$Jaundice','$JaundiceUnit','$Cyanosis','$CyanosisUnit','$Oedema','$OedemaUnit','$HO','$Reg')";




    //     // echo $tempUnit . '<br>';
    //     echo $BP . '<br>';
    //     echo $BpUnit . '<br>';
    //     echo $Pulse . '<br>';
    //     echo $PulseUnit . '<br>';
    //     echo $Temp . '<br>';
    //     echo $TempUnit . '<br>';
    //     echo $Heart . '<br>';
    //     echo $HeartUnit . '<br>';
    //     echo $Lungs . '<br>';
    //     echo $LungsUnit . '<br>';
    //     echo $HO;


    //     $No1 = $_POST['no1'];
    //     $Brand1 = $_POST['brand1'];
    //     $Dose1 = $_POST['dose1'];
    //     $Instruction1 = $_POST['instruction1'];
    //     $Duration1 = $_POST['duration1'];

    //     echo $No1;
    //     // echo $Brand1;
    //     // echo $Dose1;
    //     // echo $Instruction1;
    //     // echo $Duration1;


    //     $No2 = $_POST['no2'];
    //     $Brand2 = $_POST['brand2'];
    //     $Dose2 = $_POST['dose2'];
    //     $Instruction2 = $_POST['instruction2'];
    //     $Duration2 = $_POST['duration2'];


    //     $No3 = $_POST['no3'];
    //     $Brand3 = $_POST['brand3'];
    //     $Dose3 = $_POST['dose3'];
    //     $Instruction3 = $_POST['instruction3'];
    //     $Duration3 = $_POST['duration3'];

    //     $No4 = $_POST['no4'];
    //     $Brand4 = $_POST['brand4'];
    //     $Dose4 = $_POST['dose4'];
    //     $Instruction4 = $_POST['instruction4'];
    //     $Duration4 = $_POST['duration4'];


    //     $No5 = $_POST['no5'];
    //     $Brand5 = $_POST['brand5'];
    //     $Dose5 = $_POST['dose5'];
    //     $Instruction5 = $_POST['instruction5'];
    //     $Duration5 = $_POST['duration5'];



    //     $sql2 = "INSERT INTO prescriptiontable(reg_no,Medicine,Dose,Instruction,Duration) 
    //     VALUES('$Reg','$Brand1, $Brand2, $Brand3, $Brand4, $Brand5',
    //             '$Dose1, $Dose2, $Dose3, $Dose4, $Dose5',
    //             '$Instruction1, $Instruction2, $Instruction3, $Instruction4, $Instruction5',
    //             '$Duration1, $Duration2, $Duration3, $Duration4, $Duration5')";



    //     $query1 = mysqli_query($conn, $sql);
    //     $query2 = mysqli_query($conn, $sql1);
    //     $query3 = mysqli_query($conn, $sql2);
    //     header("Refresh:0;");
    // }

    ?>

    <form action="" method="post">
        <div class="formHead">

            <label for="">Name &emsp;:</label>
            <input onclick="add_patient()" type="text" class="name" name="name" value="<?php echo ($REG_ID == -1 ? "" : $PAT_DATA[0]) ?>">

            <label for="">Age &emsp;&ensp;:</label>
            <input onclick="add_patient()" type="text" class="age" name="age" value="<?php echo ($REG_ID == -1 ? "" : $PAT_DATA[1]) ?>">

            <label for="">Sex &emsp;&emsp;:</label>
            <!-- <input type="text" class="name" name="name"> -->
            <select onclick="add_patient()" id="sex" class="sex" name="sex" value="<?php echo ($REG_ID == -1 ? "" : $PAT_DATA[2]) ?>">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>

            <br>

            <label for="">Mobile &ensp;:</label>
            <input onclick="add_patient()" type="text" class="name" name="mobile" maxlength="11" value="<?php echo ($REG_ID == -1 ? "" : $PAT_DATA[3]) ?>">

            <label for="">Reg No.:</label>
            <input onclick="add_patient()" type="text" class="age" name="reg" id="Reg" value="<?php echo $patient_RegNo ?>" readonly>

            <label for="">Address&ensp;:</label>
            <input onclick="add_patient()" type="textarea" class="address" name="address" value="<?php echo ($REG_ID == -1 ? "" : $PAT_DATA[4]) ?>">

            <label for="">Date:</label>
            <input onclick="add_patient()" type="date" class="date" name="date" id="Date" value="<?php echo ($REG_ID == -1 ? "" : $PAT_DATA[5]) ?>">





        </div>

        <div class="button">
            <input type="submit" value="Submit" class="submit" name="submit_btn">
        </div>

        <div class="mainpart">

            <div class="sideBar">

                <div class="OE">

                    <table class="oeTable">
                        <thead>

                            <th>O/E</th>
                            <th>Value</th>
                            <th>Unit</th>

                        </thead>
                        <tr>
                            <td class="oe_col">BP</td>
                            <td class="value_col"><input name="BP" class="value" id="" value="<?php echo ($OE_DATA[0]) ?>"></td>
                            <td class="unit_col"><input type="text" class="unit" name="bpUnit" id="" value="mmHg"></td>
                        </tr>

                        <tr>
                            <td class="oe_col">Pulse</td>
                            <td class="value_col"><textarea name="Pulse" class="value" id="" cols="0" rows="1"></textarea></td>
                            <td class="unit_col"><input type="text" class="unit" name="pulseUnit" id="" value="b/min"></td>
                        </tr>

                        <tr>
                            <td class="oe_col">Temp</td>
                            <td class="value_col"><input name="Temp" class="value" id="" value="<?php echo ($OE_DATA[1]) ?>"></td>
                            <td class="unit_col"><input type="text" class="unit" name="tempUnit" id="" value="°F"></td>
                        </tr>

                        <tr>
                            <td class="oe_col">SpO<sub>2</sub></td>
                            <td class="value_col"><textarea name="SpO2" class="value" id="" cols="0" rows="1"></textarea></td>
                            <td class="unit_col"><input type="text" class="unit" name="spO2Unit" id="" value="%"></td>
                        </tr>

                        <tr>
                            <td class="oe_col">Heart</td>
                            <td class="value_col"><input name="Heart" class="value" id="" value="<?php echo ($OE_DATA[2]) ?>"></td>
                            <td class="unit_col"><input type="text" class="unit" name="heartUnit" id="" value=""></td>
                        </tr>

                        <tr>
                            <td class="oe_col">Lungs</td>
                            <td class="value_col"><input name="Lungs" class="value" id="" value="<?php echo ($OE_DATA[3]) ?>"></td>
                            <td class="unit_col"><input type="text" class="unit" name="lungsUnit" id="" value=""></td>
                        </tr>

                        <tr>
                            <td class="oe_col">Abd</td>
                            <td class="value_col"><input name="Abd" class="value" id="" value="<?php echo ($OE_DATA[4]) ?>"></td>
                            <td class="unit_col"><input type="text" class="unit" name="abdUnit" id="" value=""></td>
                        </tr>

                        <tr>
                            <td class="oe_col">Anaemia</td>
                            <td class="value_col"><textarea name="Anaemia" class="value" id="" cols="0" rows="1"></textarea></td>
                            <td class="unit_col"><input type="text" class="unit" name="anaemiaUnit" id="" value=""></td>
                        </tr>

                        <tr>
                            <td class="oe_col">Jaundice</td>
                            <td class="value_col"><textarea name="Jaundice" class="value" id="" cols="0" rows="1"></textarea></td>
                            <td class="unit_col"><input type="text" class="unit" name="jaundiceUnit" id="" value=""></td>
                        </tr>

                        <tr>
                            <td class="oe_col">Cyanosis</td>
                            <td class="value_col"><textarea name="Cyanosis" class="value" id="" cols="0" rows="1"></textarea></td>
                            <td class="unit_col"><input type="text" class="unit" name="cyanosisUnit" id="" value=""></td>
                        </tr>

                        <tr>
                            <td class="oe_col">Oedema</td>
                            <td class="value_col"><textarea name="Oedema" class="value" id="" cols="0" rows="1"></textarea></td>
                            <td class="unit_col"><input type="text" class="unit" name="oedemaUnit" id="" value=""></td>
                        </tr>

                    </table>

                </div>


                <div class="HO">

                    <table class="OHTable">
                        <thead class="OHTableHead">
                            <th>H/O</th>
                            <th></th>
                            <th></th>
                        </thead>
                        <tbody class="OHTableBody">
                            <tr>
                                <td><input class="checkbox" type="checkbox" name="H/O[]" value="HTN" <?php echo (str_contains($HO_DATA, 'HTN') ? "checked" : "") ?>>HTN</td>
                                <td><input class="checkbox" type="checkbox" name="H/O[]" value="DM" <?php echo (str_contains($HO_DATA, 'DM') ? "checked" : "") ?>>DM</td>
                                <td><input class="checkbox" type="checkbox" name="H/O[]" value="Asthma" <?php echo (str_contains($HO_DATA, 'Asthma') ? "checked" : "") ?>>Asthma</td>
                            </tr>

                            <tr>
                                <td><input class="checkbox" type="checkbox" name="H/O[]" value="COPD" <?php echo (str_contains($HO_DATA, 'COPD') ? "checked" : "") ?>>COPD</td>
                                <td><input class="checkbox" type="checkbox" name="H/O[]" value="IHD" <?php echo (str_contains($HO_DATA, 'IHD') ? "checked" : "") ?>>IHD</td>
                                <td><input class="checkbox" type="checkbox" name="H/O[]" value="CKD" <?php echo (str_contains($HO_DATA, 'CKD') ? "checked" : "") ?>>CKD</td>
                            </tr>

                            <tr>
                                <td><input class="checkbox" type="checkbox" name="H/O[]" value="CLD" <?php echo (str_contains($HO_DATA, 'CLD') ? "checked" : "") ?>>CLD</td>
                                <td><input class="checkbox" type="checkbox" name="H/O[]" value="CVD" <?php echo (str_contains($HO_DATA, 'CVD') ? "checked" : "") ?>>CVD</td>
                                <td><input class="checkbox" type="checkbox" name="H/O[]" value="Smoking" <?php echo (str_contains($HO_DATA, 'Smoking') ? "checked" : "") ?>>Smoking</td>
                            </tr>

                            <tr>
                                <td colspan="2"><input class="checkbox" type="checkbox" name="H/O[]" value="Tobacco Chewing" aria-colindex="2" <?php echo (str_contains($HO_DATA, 'Tobacco Chewing') ? "checked" : "") ?>>Tobacco Chewing</td>
                                <td><input class="checkbox" type="checkbox" name="H/O[]" value="Malignancy" <?php echo (str_contains($HO_DATA, 'Malignancy') ? "checked" : "") ?>>Malignancy</td>
                            </tr>

                            <tr>
                                <td colspan="2"><input class="checkbox" type="checkbox" name="H/O[]" value="Psychiatric Disorder" <?php echo (str_contains($HO_DATA, 'Psychiatric Disorder') ? "checked" : "") ?>>Psychiatric Disorder</td>
                                <td><input class="checkbox" type="checkbox" name="H/O[]" value="Allergy" <?php echo (str_contains($HO_DATA, 'Allergy') ? "checked" : "") ?>>Allergy</td>
                            </tr>

                            <tr>
                                <td colspan="2"><input class="checkbox" type="checkbox" name="H/O[]" value="Drug Abuse" <?php echo (str_contains($HO_DATA, 'Drug Abuse') ? "checked" : "") ?>>Drug Abuse</td>
                                <td><input class="checkbox" type="checkbox" name="H/O[]" value="Depression" <?php echo (str_contains($HO_DATA, 'Depression') ? "checked" : "") ?>>Depression</td>
                            </tr>

                        </tbody>
                    </table>

                </div>
                <?php
                echo ('<p id="doc_name" style="opacity:0;">' . $DOC_NAME . '</p>');
                echo ('<p id="doc_email" style="opacity:0;">' . $DOC_EMAIL . '</p>');
                ?>

            </div>




            <div class="mainBar">

                <div class="prescriptionDiv">

                    <table class="prescriptionTable">
                        <tr>
                            <th>No.</th>
                            <th>Brand</th>
                            <th>Dose</th>
                            <th>Instruction</th>
                            <th>Duration</th>
                        </tr>


                        <tbody id="table_body">

                            <tr class="mainBarTr">
                                <td><input type="text" name="no1" class="no" id="no1" value="1"></td>
                                <td>
                                    <input type="text" name="brand1" class="brand" id="brand1" placeholder="Medicine........." autocomplete="off" value="<?php echo ($DRUG_DATA[0]) ?>">
                                    <div class="MedicineList" id="MedicineList"></div>
                                </td>
                                <td>
                                    <input type="text" name="dose1" class="Dose" id="dose1" placeholder="Dose........." autocomplete="off" value="<?php echo ($DOSE_DATA[0]) ?>">
                                    <div class="DoseList" id="DoseList"></div>
                                </td>
                                <td>
                                    <input type="text" name="instruction1" class="Instruction" id="instruction1" placeholder="Instruction........." autocomplete="off" value="<?php echo ($INS_DATA[0]) ?>">
                                    <div class="InstructionList" id="InstructionList"></div>
                                </td>
                                <td>
                                    <input type="text" name="duration1" class="Duration" id="duration1" placeholder="Duration........." autocomplete="off" value="<?php echo ($DUR_DATA[0]) ?>">
                                    <div class="DurationList" id="DurationList"></div>
                                </td>

                                <td>
                                    <button type="button" onclick="add(1)">Add</button>
                                </td>

                            </tr>


                            <tr class="mainBarTr">
                                <td><input type="text" name="no2" class="no" id="no2" value="2"></td>
                                <td>
                                    <input type="text" name="brand2" class="brand" id="brand2" placeholder="Medicine........." autocomplete="off" value="<?php echo ($DRUG_DATA[1]) ?>">
                                    <div class="MedicineList" id="MedicineList2"></div>
                                </td>
                                <td>
                                    <input type="text" name="dose2" class="Dose" id="dose2" placeholder="Dose........." autocomplete="off" value="<?php echo ($DOSE_DATA[1]) ?>">
                                    <div class="DoseList" id="DoseList2"></div>
                                </td>
                                <td>
                                    <input type="text" name="instruction2" class="Instruction" id="instruction2" placeholder="Instruction........." autocomplete="off" value="<?php echo ($INS_DATA[1]) ?>">
                                    <div class="InstructionList" id="InstructionList2"></div>
                                </td>
                                <td>
                                    <input type="text" name="duration2" class="Duration" id="duration2" placeholder="Duration........." autocomplete="off" value="<?php echo ($DUR_DATA[1]) ?>">
                                    <div class="DurationList" id="DurationList2"></div>
                                </td>

                                <td>
                                    <button type="button" onclick="add(2)">Add</button>
                                </td>
                            </tr>



                            <tr class="mainBarTr">
                                <td><input type="text" name="no3" class="no" id="no3" value="3"></td>
                                <td>
                                    <input type="text" name="brand3" class="brand" id="brand3" placeholder="Medicine........." autocomplete="off" value="<?php echo ($DRUG_DATA[2]) ?>">
                                    <div class="MedicineList" id="MedicineList3"></div>
                                </td>
                                <td>
                                    <input type="text" name="dose3" class="Dose" id="dose3" placeholder="Dose........." autocomplete="off" value="<?php echo ($DOSE_DATA[2]) ?>">
                                    <div class="DoseList" id="DoseList3"></div>
                                </td>
                                <td>
                                    <input type="text" name="instruction3" class="Instruction" id="instruction3" placeholder="Instruction........." autocomplete="off" value="<?php echo ($INS_DATA[2]) ?>">
                                    <div class="InstructionList" id="InstructionList3"></div>
                                </td>
                                <td>
                                    <input type="text" name="duration3" class="Duration" id="duration3" placeholder="Duration........." autocomplete="off" value="<?php echo ($DUR_DATA[2]) ?>">
                                    <div class="DurationList" id="DurationList3"></div>
                                </td>

                                <td>
                                    <button type="button" onclick="add(3)">Add</button>
                                </td>
                            </tr>



                            <tr class="mainBarTr">
                                <td><input type="text" name="no4" class="no" id="no4" value="4"></td>
                                <td>
                                    <input type="text" name="brand4" class="brand" id="brand4" placeholder="Medicine........." autocomplete="off" value="<?php echo ($DRUG_DATA[3]) ?>">
                                    <div class="MedicineList" id="MedicineList4"></div>
                                </td>
                                <td>
                                    <input type="text" name="dose4" class="Dose" id="dose4" placeholder="Dose........." autocomplete="off" value="<?php echo ($DOSE_DATA[3]) ?>">
                                    <div class="DoseList" id="DoseList4"></div>
                                </td>
                                <td>
                                    <input type="text" name="instruction4" class="Instruction" id="instruction4" placeholder="Instruction........." autocomplete="off" value="<?php echo ($INS_DATA[3]) ?>">
                                    <div class="InstructionList" id="InstructionList4"></div>
                                </td>
                                <td>
                                    <input type="text" name="duration4" class="Duration" id="duration4" placeholder="Duration........." autocomplete="off" value="<?php echo ($DUR_DATA[3]) ?>">
                                    <div class="DurationList" id="DurationList4"></div>
                                </td>

                                <td>
                                    <button type="button" onclick="add(4)">Add</button>
                                </td>
                            </tr>



                            <tr class="mainBarTr">
                                <td><input type="text" name="no5" class="no" id="no5" value="5"></td>
                                <td>
                                    <input type="text" name="brand5" class="brand" id="brand5" placeholder="Medicine........." autocomplete="off" value="<?php echo ($DRUG_DATA[4]) ?>">
                                    <div class="MedicineList" id="MedicineList5"></div>
                                </td>
                                <td>
                                    <input type="text" name="dose5" class="Dose" id="dose5" placeholder="Dose........." autocomplete="off" value="<?php echo ($DOSE_DATA[4]) ?>">
                                    <div class="DoseList" id="DoseList5"></div>
                                </td>
                                <td>
                                    <input type="text" name="instruction5" class="Instruction" id="instruction5" placeholder="Instruction........." autocomplete="off" value="<?php echo ($INS_DATA[4]) ?>">
                                    <div class="InstructionList" id="InstructionList5"></div>
                                </td>
                                <td>
                                    <input type="text" name="duration5" class="Duration" id="duration5" placeholder="Duration........." autocomplete="off" value="<?php echo ($DUR_DATA[4]) ?>">
                                    <div class="DurationList" id="DurationList5"></div>
                                </td>

                                <td>
                                    <button type="button" onclick="add(5)">Add</button>
                                </td>
                            </tr>


                        </tbody>






                    </table>



                </div>

                <button onclick="clone_row()" type="button" class="btn btn-success btn-sm">
                    <span class="fa fa-plus"></span>
                </button>

                <!-- <button onclick="init()" type="button"> Check </button> -->
                <!-- <button onclick="add()" type="button"> Add </button> -->

                <script>
                    let ADDED = new Array(5).fill(0);
                    let REG_NO = sessionStorage.getItem("reg_id");
                    let state = '';
                    let DOC_ADDED = false;
                    let PAT_ADDED = false;
                    let OE_ADDED = false;
                    let HO_ADDED = false;
                    let med_count = 0;
                    let PAT_DATA = '';
                    let meds = new Array();
                    let oe = new Array();
                    let ho = new Array();
                    let combined = new Array();



                    function clone_row() {
                        let table_body = document.getElementById('table_body');
                        last_row = table_body.lastElementChild;
                        let number = parseInt(last_row.getElementsByClassName("no")[0].value);
                        tr_clone = last_row.cloneNode(true);
                        table_body.append(tr_clone);
                        change_number(number);
                    }

                    function change_number(number) {
                        let table_body = document.getElementById('table_body');
                        last_row = table_body.lastElementChild;
                        last_row.getElementsByClassName("no")[0].value = (number + 1).toString();
                        last_row.getElementsByClassName("no")[0].name = "no" + (number + 1).toString();
                        last_row.getElementsByClassName("no")[0].id = "no" + (number + 1).toString();
                        // console.log(last_row);

                    }


                    function get_info(property, id) {
                        let doc = document.getElementById(property + id.toString()).value;
                        return doc;
                    }



                    function add(id) {
                        let doc = document.getElementsByTagName("iframe")[0].contentDocument;
                        let brand = get_info('brand', id);
                        let dose = get_info('dose', id);
                        let instruction = get_info('instruction', id);
                        let duration = get_info('duration', id);



                        if (med_count < id) {
                            let data = '<font size="3">' + (med_count + 1).toString() + '. ' + brand +
                                '&nbsp;'.repeat(5) + '---' + '&nbsp;'.repeat(5) + dose +
                                '&nbsp;'.repeat(5) + '---' + '&nbsp;'.repeat(5) + instruction +
                                '&nbsp;'.repeat(5) + '---' + '&nbsp;'.repeat(5) + duration +
                                '</font> ';
                            meds.push(data);
                            meds.push('<font> </font>');
                            med_count += 1;
                        } else {
                            let data = '<font size="3">' + (id).toString() + '. ' + brand +
                                '&nbsp;'.repeat(5) + '---' + '&nbsp;'.repeat(5) + dose +
                                '&nbsp;'.repeat(5) + '---' + '&nbsp;'.repeat(5) + instruction +
                                '&nbsp;'.repeat(5) + '---' + '&nbsp;'.repeat(5) + duration +
                                '</font> ';
                            let k = (id - 1) * 2;
                            // alert(k);
                            meds[k] = data;
                        }
                        console.log('MC: ' + med_count);
                        upd_state();
                    }


                    function add_doctor() {
                        if (DOC_ADDED) {
                            return;
                        }
                        let doctor_name = document.getElementById('doc_name').innerHTML;
                        let doctor_email = document.getElementById('doc_email').innerHTML;
                        const DOC_DATA = '<b style=""><font size="5">Dr. ' + doctor_name + '</font></b> <br/>' +
                            '<font size="4">MBBS, FCPS (Dhaka Medical College) </font> <br/>' +
                            '<font size="3">Medicine Specialist, Labaid Specialized Hospital Ltd. </font> <br/>' +
                            '<font size="3">Contact: ' + doctor_email + '</font> <br/>' +
                            '<font size="4">' + '_'.repeat(80) + '</font> <br/> <br/>';

                        DOC_ADDED = true;
                        state += DOC_DATA;
                        upd_view();
                    }


                    function upd_view() {
                        let doc = document.getElementsByTagName("iframe")[0].contentDocument;
                        doc.getElementsByTagName('body')[0].innerHTML = state;
                    }


                    function upd_state() {
                        DOC_ADDED = false;
                        PAT_ADDED = false;
                        OE_ADDED = false;
                        HO_ADDED = false;
                        add_oe();
                        add_ho();
                        let cur_state = '';
                        for (let i = 0; i < Math.max(meds.length, combined.length); ++i) {
                            let line = '';
                            if (i < combined.length) {
                                if (combined[i].includes('H/O')) {
                                    line += combined[i] + '<font  color="#ffffff">' + '&nbsp;'.repeat(21) + '</font>' + '<font  face="Courier New" color="#ffffff">' + '&nbsp;'.repeat(11) + '</font>';
                                    line += '<br/><font face="Courier New">' + '&nbsp'.repeat(23) + '</font>' + '|';

                                } else if (combined[i].includes('&#x2022;')) {
                                    let x = Math.max(0, 79 - combined[i].length);
                                    line += combined[i] + '<font face="Courier New" color="#ffffff">' + '&nbsp;'.repeat(x) + '</font>' + '|';

                                } else {
                                    let x = Math.max(0, 72 - combined[i].length);
                                    line += combined[i] + '<font face="Courier New" color="#ffffff">' + '&nbsp;'.repeat(x) + '</font>' + '|';
                                }
                                // console.log(x);
                            } else {
                                line += '<font face="Courier New" color="#ffffff">' + '&nbsp;'.repeat(23) + '</font>' + '|';

                            }
                            if (i < meds.length) {
                                line += '<font face="Courier New" color="#ffffff">' + '&nbsp;'.repeat(5) + '</font>' + meds[i];
                            } else {
                                line += ' ';

                            }
                            cur_state += line + '<br/>';
                        }
                        // console.log(oe.length);
                        state = '';
                        add_doctor();
                        add_patient();
                        state += '<b style=""><font size="4">O/E </b>' + '&nbsp'.repeat(37) + '|' + '&nbsp'.repeat(15) + '<b style="">Rx.</font></b> <br/>';
                        state += '<font face="Courier New">' + '&nbsp'.repeat(23) + '</font>' + '|' + '<br/>';
                        state += cur_state;
                        upd_view();
                    }

                    function add_patient() {
                        if (PAT_ADDED) {
                            return;
                        }
                        PAT_ADDED = true;
                        let name = document.getElementsByName('name')[0].value;
                        let age = document.getElementsByName('age')[0].value;
                        let sex = document.getElementsByName('sex')[0].value;
                        let mobile = document.getElementsByName('mobile')[0].value;
                        let reg = document.getElementsByName('reg')[0].value;
                        let address = document.getElementsByName('address')[0].value;
                        let date = document.getElementsByName('date')[0].value;
                        // console.log(name);
                        // console.log(age);
                        // console.log(sex);
                        // console.log(mobile);
                        // console.log(reg);
                        // console.log(address);
                        // console.log(date);

                        let p_data = '<font size="3">' + 'Name: ' + name + ' </font>' + '&nbsp;'.repeat(15) +
                            '<font size="3">' + 'Age: ' + age + ' </font>' + '&nbsp;'.repeat(15) +
                            '<font size="3">' + 'Sex: ' + (sex == 'Male' ? 'M' : 'F') + '&nbsp;'.repeat(15) +
                            '<font size="3">' + 'Phone: ' + mobile + ' </font>' + '<br/>' +
                            '<font size="3">' + 'Adress: ' + address + ' </font>' + '&nbsp;'.repeat(10) +
                            '<font size="3">' + 'Reg No: ' + reg + ' </font> ' + '&nbsp;'.repeat(10) +
                            '<font size="3">' + 'Date: ' + date + ' </font> <br/> ' +
                            '<font size="4">' + '_'.repeat(80) + '</font> <br/> <br/>';
                        state += p_data;
                        upd_view();


                    }

                    function add_ho() {
                        if (HO_ADDED) {
                            return;
                        }
                        HO_ADDED = true;
                        let ret = document.getElementsByClassName('checkbox');

                        for (let i = 0; i < ret.length; ++i) {
                            let data = ret[i];
                            let data_str = ret[i].toString();
                            if (data.checked) {
                                console.log('<font face="Courier New">' + data.value + '</font>');
                                ho.push('<font face="Courier New"> <b style="">&#x2022;' + data.value + '</b></font>');
                            }
                        }

                        combined = new Array();
                        combined = combined.concat(oe);
                        combined.push('<br/><font size="4"> <b style="">' + 'H/O' + '</b></font>');
                        combined = combined.concat(ho);
                        ho = new Array();
                    }

                    function add_oe() {
                        console.log(1);
                        if (OE_ADDED) {
                            return;
                        }
                        OE_ADDED = true;
                        let bp = document.getElementsByName('BP')[0].value;
                        let temp = document.getElementsByName('Temp')[0].value;
                        let heart = document.getElementsByName('Heart')[0].value;
                        let lungs = document.getElementsByName('Lungs')[0].value;
                        let abd = document.getElementsByName('Abd')[0].value;


                        let l = '<font face="Courier New">';
                        let r = '</font>';

                        if (oe.length < 1) {
                            oe.push(l + '<b style=""> BP: </b>' + bp + r);
                        } else {
                            oe[0] = l + '<b style=""> BP: </b>' + bp + r;
                        }

                        if (oe.length < 2) {
                            oe.push(l + '<b style=""> Temp: </b>' + temp + r);
                        } else {
                            oe[1] = l + '<b style=""> Temp: </b>' + temp + r;
                        }

                        if (oe.length < 3) {
                            oe.push(l + '<b style=""> Heart: </b>' + heart + r);
                        } else {
                            oe[2] = l + '<b style=""> Heart: </b>' + heart + r;
                        }

                        if (oe.length < 4) {
                            oe.push(l + '<b style=""> Lungs: </b>' + lungs + r);
                        } else {
                            oe[3] = l + '<b style=""> Lungs: </b>' + lungs + r;
                        }

                        if (oe.length < 5) {
                            oe.push(l + '<b style=""> Abd: </b>' + abd + r);
                        } else {
                            oe[4] = l + '<b style=""> Abd: </b>' + abd + r;
                        }


                    }

                    function print() {
                        document.querySelector("body > form > div.mainpart > div.mainBar > div.output > div > div > div:nth-child(10) > div:nth-child(1)").click();

                    }

                    function init() {

                        if (window.location.href.includes('regid')) {
                            for (let i = 1; i <= 5; ++i) {
                                let doc = document.getElementsByTagName("iframe")[0].contentDocument;
                                let brand = get_info('brand', i);
                                if (brand == "") continue;
                                if (ADDED[i] == 0) {
                                    add(i);
                                    ADDED[i] = 1;
                                }
                            }
                        }
                        upd_state();

                    }
                </script>




                <div class="output">
                    <textarea name="input" id="input" cols="30" rows="10">
                        <?php
                        // echo $Comment.'<br>';
                        ?>
                    </textarea>
                </div>


                <div>
                    <button type="button" onclick="print()">
                        <img src="https://img.icons8.com/?size=512&id=123&format=png" width="30" height="30">
                    </button>
                </div>



            </div>

        </div>


    </form>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>





    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/homepage.js"></script>
    <script type="text/javascript">



    </script>

    <!-- <script type="text/javascript" src="js/addRow.js"></script> -->


    <!-- from here this is the notepad code -->

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>

    <script src="js/jquery-3.6.4.min.js"></script>
    <script src="js/jquery.cleditor.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#input").cleditor({
                width: 800, // width not including margins, borders or padding
                height: 400, // height not including margins, borders or padding
                controls: // controls to add to the toolbar
                    "bold italic underline strikethrough subscript superscript | font size " +
                    "style | color highlight removeformat | bullets numbering | outdent " +
                    "indent | alignleft center alignright justify | undo redo | " +
                    "rule image link unlink | cut copy paste pastetext | print source",
                colors: // colors in the color popup
                    "FFF FCC FC9 FF9 FFC 9F9 9FF CFF CCF FCF " +
                    "CCC F66 F96 FF6 FF3 6F9 3FF 6FF 99F F9F " +
                    "BBB F00 F90 FC6 FF0 3F3 6CC 3CF 66C C6C " +
                    "999 C00 F60 FC3 FC0 3C0 0CC 36F 63F C3C " +
                    "666 900 C60 C93 990 090 399 33F 60C 939 " +
                    "333 600 930 963 660 060 366 009 339 636 " +
                    "000 300 630 633 330 030 033 006 309 303",
                fonts: // font names in the font popup
                    "Arial,Arial Black,Comic Sans MS,Courier New,Narrow,Garamond," +
                    "Georgia,Impact,Sans Serif,Serif,Tahoma,Trebuchet MS,Verdana," +
                    "Siyam Rupali",
                sizes: // sizes in the font size popup
                    "1,2,3,4,5,6,7",
                styles: // styles in the style popup
                    [
                        ["Paragraph", "<p>"],
                        ["Header 1", "<h1>"],
                        ["Header 2", "<h2>"],
                        ["Header 3", "<h3>"],
                        ["Header 4", "<h4>"],
                        ["Header 5", "<h5>"],
                        ["Header 6", "<h6>"]
                    ],
                useCSS: false, // use CSS to style HTML when possible (not supported in ie)
                docType: // Document type contained within the editor
                    '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">',
                docCSSFile: // CSS file used to style the document contained within the editor
                    "",
                bodyStyle: // style to assign to document body contained within the editor
                    "margin:4px; font:10pt Arial,Verdana; cursor:text"
            });
        });
    </script>


</body>

</html>



<script>
    document.getElementById('Date').value = new Date().toISOString().substring(0, 10);
</script>