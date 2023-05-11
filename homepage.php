<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>

    <link rel="stylesheet" href="homepage.css">
</head>

<body>


    <nav>
        <a href="#">Home</a>
        <a href="ViewAllPrescription.php">View All Prescription</a>
        <a href="drugsDatabase.php">Drug Database</a>
        <a href="sms.php">SMS</a>
        <a href="appointment.php">Appointment</a>
        <div class="animation start-home"></div>
    </nav>


    <!-- <div class="menuBar">
        <div class="menuText"><a href="" class="menu">Home</a></div>
        <div class="menuText"><a href="" class="menu">View All Prescription</a></div>
        <div class="menuText"><a href="" class="menu">Drug Database</a></div>
        <div class="menuText"><a href="" class="menu">SMS</a></div>
        <div class="menuText"><a href="" class="menu">Appointment</a></div> 
        
    </div> -->


    <form action="">
        <div class="formHead">

            <label for="">Name &emsp;:</label>
            <input type="text" class="name" name="name">

            <label for="">Age &emsp;&ensp;:</label>
            <input type="text" class="age" name="age">

            <label for="">Sex &emsp;&emsp;:</label>
            <!-- <input type="text" class="name" name="name"> -->
            <select id="sex" class="sex" name="sex">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>

            <br>

            <label for="">Mobile &ensp;:</label>
            <input type="text" class="name" name="mobile">

            <label for="">Reg No.:</label>
            <input type="text" class="age" name="reg">

            <label for="">Address&ensp;:</label>
            <input type="textarea" class="address" name="address">

            <label for="">Date:</label>
            <input type="date" class="date" name="date" id="Date">





        </div>

        <div class="button">
            <input type="submit" value="Submit" class="submit">
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
                            <td class="value_col"><textarea name="BP" class="value" id="" cols="0" rows="1"></textarea></td>
                            <td class="unit_col">mmHg</td>
                        </tr>

                        <tr>
                            <td class="oe_col">Pulse</td>
                            <td class="value_col"><textarea name="Pulse" class="value" id="" cols="0" rows="1"></textarea></td>
                            <td class="unit_col">b/min</td>
                        </tr>

                        <tr>
                            <td class="oe_col">Temp</td>
                            <td class="value_col"><textarea name="Temp" class="value" id="" cols="0" rows="1"></textarea></td>
                            <td class="unit_col"><sup>o</sup>F</td>
                        </tr>

                        <tr>
                            <td class="oe_col">SpO2</td>
                            <td class="value_col"><textarea name="SpO2" class="value" id="" cols="0" rows="1"></textarea></td>
                            <td class="unit_col">%</td>
                        </tr>

                        <tr>
                            <td class="oe_col">Heart</td>
                            <td class="value_col"><textarea name="Heart" class="value" id="" cols="0" rows="1"></textarea></td>
                            <td class="unit_col"></td>
                        </tr>

                        <tr>
                            <td class="oe_col">Lungs</td>
                            <td class="value_col"><textarea name="Lungs" class="value" id="" cols="0" rows="1"></textarea></td>
                            <td class="unit_col"></td>
                        </tr>

                        <tr>
                            <td class="oe_col">Abd</td>
                            <td class="value_col"><textarea name="Abd" class="value" id="" cols="0" rows="1"></textarea></td>
                            <td class="unit_col"></td>
                        </tr>

                        <tr>
                            <td class="oe_col">Anaemia</td>
                            <td class="value_col"><textarea name="Anaemia" class="value" id="" cols="0" rows="1"></textarea></td>
                            <td class="unit_col"></td>
                        </tr>

                        <tr>
                            <td class="oe_col">Jaundice</td>
                            <td class="value_col"><textarea name="Jaundice" class="value" id="" cols="0" rows="1"></textarea></td>
                            <td class="unit_col"></td>
                        </tr>

                        <tr>
                            <td class="oe_col">Cyanosis</td>
                            <td class="value_col"><textarea name="Cyanosis" class="value" id="" cols="0" rows="1"></textarea></td>
                            <td class="unit_col"></td>
                        </tr>

                        <tr>
                            <td class="oe_col">Oedema</td>
                            <td class="value_col"><textarea name="Oedema" class="value" id="" cols="0" rows="1"></textarea></td>
                            <td class="unit_col"></td>
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
                                <td><input class="checkbox" type="checkbox" name="htn" value="HTN">HTN</td>
                                <td><input class="checkbox" type="checkbox" name="dm" value="DM">DM</td>
                                <td><input class="checkbox" type="checkbox" name="asthma" value="Asthma">Asthma</td>
                            </tr>

                            <tr>
                                <td><input class="checkbox" type="checkbox" name="copd" value="COPD">COPD</td>
                                <td><input class="checkbox" type="checkbox" name="ihd" value="IHD">IHD</td>
                                <td><input class="checkbox" type="checkbox" name="ckd" value="CKD">CKD</td>
                            </tr>

                            <tr>
                                <td><input class="checkbox" type="checkbox" name="cld" value="CLD">CLD</td>
                                <td><input class="checkbox" type="checkbox" name="cvd" value="CVD">CVD</td>
                                <td><input class="checkbox" type="checkbox" name="smoking" value="Smoking">Smoking</td>
                            </tr>

                            <tr>
                                <td><input class="checkbox" type="checkbox" name="tobacco_chewing" value="Tobacco Chewing" aria-colindex="2">Tobacco Chewing</td>
                                <td></td>
                                <td><input class="checkbox" type="checkbox" name="malignancy" value="Malignancy">Malignancy</td>
                            </tr>

                            <tr>
                                <td><input class="checkbox" type="checkbox" name="psychiatric_disorder" value="Psychiatric Disorder">Psychiatric Disorder</td>
                                <td></td>
                                <td><input class="checkbox" type="checkbox" name="allergy" value="Allergy">Allergy</td>
                            </tr>

                            <tr>
                                <td><input class="checkbox" type="checkbox" name="drug_abuse" value="Drug Abuse">Drug Abuse</td>
                                <td></td>
                                </td>
                                <td><input class="checkbox" type="checkbox" name="depression" value="Depression">Depression</td>
                            </tr>

                        </tbody>
                    </table>

                </div>

            </div>


            <div class="mainBar">

                <table>

                </table>

            </div>

        </div>


    </form>


</body>

</html>



<script>
    document.getElementById('Date').value = new Date().toISOString().substring(0, 10);
</script>