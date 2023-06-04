<?php
include("PHPConnect.php");

if (isset($_GET['regid'])) {
    $REG_ID = $_GET['regid'];
    $Q1 = "DELETE FROM `patientdatabase` WHERE `RegNo` = $REG_ID";
    $Q2 = "DELETE FROM `prescriptiontable` WHERE `reg_no` = $REG_ID";
    $Q3 = "DELETE FROM `prescriptiontablehistory` WHERE `regNo` = $REG_ID";
    mysqli_query($conn, $Q1);
    mysqli_query($conn, $Q2);
    mysqli_query($conn, $Q3);

    header("Location: ViewAllPrescription.php");
}
