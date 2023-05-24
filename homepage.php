<?php

    error_reporting(0);
    include("PHPConnect.php");

    /**----------------------------------------------------------------------------------- 
    * This Code is show the value in RegNO field and auto increment value after SUBMIT 
    -------------------------------------------------------------------------------------*/
    $query = "SELECT * FROM patientdatabase ORDER BY RegNo DESC LIMIT 1";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result);
    $last_RegNo = $row['RegNo'];

    if ($last_RegNo == " ")
    {
        $patient_RegNo = 1; 
    }
    else
    {
        $patient_RegNo = ($last_RegNo + 1);   
    }



    if(isset($_POST['submit_btn'])){

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


        // $sql = "INSERT INTO patientdatabase(RegNo,Patient_Name,Age,Sex,Mobile,Address,Date) 
        // VALUES('$Reg','$Name','$Age','$Sex','$Mobile','$Address','$Date')";

        // $query1 = mysqli_query($conn,$sql);
        // header("Refresh:0;");



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


        // echo $BP.'<br>';
        // echo $Temp.'<br>';
        // echo $Heart.'<br>';
        // echo $Lungs.'<br>';


        $ho = $_POST['H/O'];
        $HO = "";

        foreach($ho as $ho2){
            $HO .= " *".$ho2;
        }

        // echo $HO;


        $No1 = $_POST['no1'];
        $Brand1 = $_POST['brand1'];
        $Dose1 = $_POST['dose1'];
        $Instruction1 = $_POST['instruction1'];
        $Duration1 = $_POST['duration1'];

        echo $No1;
        echo $Brand1;
        echo $Dose1;
        echo $Instruction1;
        echo $Duration1;
        
        
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
        


        // for($i=1;$i<10;$i++){
        //     echo $No.$i." ".$Brand.$i." ".$Dose.$i." ".$Instruction.$i." ".$Duration.$i."<br>";
        // }

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

<body>


    <nav>
        <a href="#">Home</a>
        <a href="ViewAllPrescription.php">View All Prescription</a>
        <a href="drugsDatabase.php">Drug Database</a>
        <a href="sms.php">SMS</a>
        <!-- <a href="appointment.php">Appointment</a> -->
        <div class="animation start-home"></div>
    </nav>


    <form action="" method="post">
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
            <input type="text" class="age" name="reg" id="Reg" value="<?php echo $patient_RegNo ?>" readonly>

            <label for="">Address&ensp;:</label>
            <input type="textarea" class="address" name="address">

            <label for="">Date:</label>
            <input type="date" class="date" name="date" id="Date">





        </div>

        <div class="button">
            <input type="submit" value="Submit" class="submit" name="submit_btn" >
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
                            <td class="value_col"><textarea name="BP" class="value" id="" cols="0" rows="1">120/80</textarea></td>
                            <td class="unit_col">mmHg</td>
                        </tr>

                        <tr>
                            <td class="oe_col">Pulse</td>
                            <td class="value_col"><textarea name="Pulse" class="value" id="" cols="0" rows="1"></textarea></td>
                            <td class="unit_col">b/min</td>
                        </tr>

                        <tr>
                            <td class="oe_col">Temp</td>
                            <td class="value_col"><textarea name="Temp" class="value" id="" cols="0" rows="1">98.6</textarea></td>
                            <td class="unit_col"><sup>o</sup>F</td>
                        </tr>

                        <tr>
                            <td class="oe_col">SpO<sub>2</sub></td>
                            <td class="value_col"><textarea name="SpO2" class="value" id="" cols="0" rows="1"></textarea></td>
                            <td class="unit_col">%</td>
                        </tr>

                        <tr>
                            <td class="oe_col">Heart</td>
                            <td class="value_col"><textarea name="Heart" class="value" id="" cols="0" rows="1">S1+S2+M0</textarea></td>
                            <td class="unit_col"></td>
                        </tr>

                        <tr>
                            <td class="oe_col">Lungs</td>
                            <td class="value_col"><textarea name="Lungs" class="value" id="" cols="0" rows="1">NAD</textarea></td>
                            <td class="unit_col"></td>
                        </tr>

                        <tr>
                            <td class="oe_col">Abd</td>
                            <td class="value_col"><textarea name="Abd" class="value" id="" cols="0" rows="1">Soft, Non-Tender</textarea></td>
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
                                <td><input class="checkbox" type="checkbox" name="H/O[]" value="HTN">HTN</td>
                                <td><input class="checkbox" type="checkbox" name="H/O[]" value="DM">DM</td>
                                <td><input class="checkbox" type="checkbox" name="H/O[]" value="Asthma">Asthma</td>
                            </tr>

                            <tr>
                                <td><input class="checkbox" type="checkbox" name="H/O[]" value="COPD">COPD</td>
                                <td><input class="checkbox" type="checkbox" name="H/O[]" value="IHD">IHD</td>
                                <td><input class="checkbox" type="checkbox" name="H/O[]" value="CKD">CKD</td>
                            </tr>

                            <tr>
                                <td><input class="checkbox" type="checkbox" name="H/O[]" value="CLD">CLD</td>
                                <td><input class="checkbox" type="checkbox" name="H/O[]" value="CVD">CVD</td>
                                <td><input class="checkbox" type="checkbox" name="H/O[]" value="Smoking">Smoking</td>
                            </tr>

                            <tr>
                                <td colspan="2"><input class="checkbox" type="checkbox" name="H/O[]" value="Tobacco Chewing" aria-colindex="2">Tobacco Chewing</td>
                                <td><input class="checkbox" type="checkbox" name="H/O[]" value="Malignancy">Malignancy</td>
                            </tr>

                            <tr>
                                <td colspan="2"><input class="checkbox" type="checkbox" name="H/O[]" value="Psychiatric Disorder">Psychiatric Disorder</td>
                                <td><input class="checkbox" type="checkbox" name="H/O[]" value="Allergy">Allergy</td>
                            </tr>

                            <tr>
                                <td colspan="2"><input class="checkbox" type="checkbox" name="H/O[]" value="Drug Abuse">Drug Abuse</td>
                                <td><input class="checkbox" type="checkbox" name="H/O[]" value="Depression">Depression</td>
                            </tr>

                        </tbody>
                    </table>

                </div>

            </div>




            <div class="mainBar">

                <div >
                    <table class="med" >
                        <tr>
                            <th>No.</th>
                            <th>Brand</th>
                            <th>Dose</th>
                            <th>Instruction</th>
                            <th>Duration</th>
                        </tr>

                        
                        <tbody id="table_body">

                            <tr class="mainBarTr" >
                            
                                <td><input type="text" name="no1" class="no" id="no1" value="1"></td>
                                <td>
                                    <input type="text" name="brand1" class="brand" id="brand1" placeholder="Medicine........." autocomplete="off">
                                    <div class="MedicineList" id="MedicineList"></div>
                                </td>                            
                                <td>
                                    <input type="text" name="dose1" class="Dose" id="dose1" placeholder="Dose........." autocomplete="off">
                                    <div class="DoseList" id="DoseList"></div>
                                </td>                            
                                <td>
                                    <input type="text" name="instruction1" class="Instruction" id="instruction1" placeholder="Instruction........." autocomplete="off">
                                    <div class="InstructionList" id="InstructionList"></div>
                                </td>                            
                                <td>
                                    <input type="text" name="duration1" class="Duration" id="duration1" placeholder="Duration........." autocomplete="off">
                                    <div class="DurationList" id="DurationList"></div>
                                </td>
                      
                            </tr>
                        

                            <tr class="mainBarTr">
                                <td><input type="text" name="no2" class="no" id="no2" value="2"></td>
                                <td>
                                    <input type="text" name="brand2" class="brand" id="brand2" placeholder="Medicine........." autocomplete="off">
                                    <div class="MedicineList" id="MedicineList2"></div>
                                </td>                            
                                <td>
                                    <input type="text" name="dose2" class="Dose" id="dose2" placeholder="Dose........." autocomplete="off">
                                    <div class="DoseList" id="DoseList2"></div>
                                </td>                            
                                <td>
                                    <input type="text" name="instruction2" class="Instruction" id="instruction2" placeholder="Instruction........." autocomplete="off">
                                    <div class="InstructionList" id="InstructionList2"></div>
                                </td>                            
                                <td>
                                    <input type="text" name="duration2" class="Duration" id="duration2" placeholder="Duration........." autocomplete="off">
                                    <div class="DurationList" id="DurationList2"></div>
                                </td>                            
                            </tr>



                            <tr class="mainBarTr">
                                <td><input type="text" name="no3" class="no" id="no3" value="3"></td>
                                <td>
                                    <input type="text" name="brand3" class="brand" id="brand3" placeholder="Medicine........." autocomplete="off">
                                    <div class="MedicineList" id="MedicineList3"></div>
                                </td>                            
                                <td>
                                    <input type="text" name="dose3" class="Dose" id="dose3" placeholder="Dose........." autocomplete="off">
                                    <div class="DoseList" id="DoseList3"></div>
                                </td>                            
                                <td>
                                    <input type="text" name="instruction3" class="Instruction" id="instruction3" placeholder="Instruction........." autocomplete="off">
                                    <div class="InstructionList" id="InstructionList3"></div>
                                </td>                            
                                <td>
                                    <input type="text" name="duration3" class="Duration" id="duration3" placeholder="Duration........." autocomplete="off">
                                    <div class="DurationList" id="DurationList3"></div>
                                </td>                            
                            </tr>



                            <tr class="mainBarTr">
                                <td><input type="text" name="no4" class="no" id="no4" value="4"></td>
                                <td>
                                    <input type="text" name="brand4" class="brand" id="brand4" placeholder="Medicine........." autocomplete="off">
                                    <div class="MedicineList" id="MedicineList4"></div>
                                </td>                            
                                <td>
                                    <input type="text" name="dose4" class="Dose" id="dose4" placeholder="Dose........." autocomplete="off">
                                    <div class="DoseList" id="DoseList4"></div>
                                </td>                            
                                <td>
                                    <input type="text" name="instruction4" class="Instruction" id="instruction4" placeholder="Instruction........." autocomplete="off">
                                    <div class="InstructionList" id="InstructionList4"></div>
                                </td>                            
                                <td>
                                    <input type="text" name="duration4" class="Duration" id="duration4" placeholder="Duration........." autocomplete="off">
                                    <div class="DurationList" id="DurationList4"></div>
                                </td>                            
                            </tr>



                            <tr class="mainBarTr">
                                <td><input type="text" name="no5" class="no" id="no5" value="5"></td>
                                <td>
                                    <input type="text" name="brand5" class="brand" id="brand5" placeholder="Medicine........." autocomplete="off">
                                    <div class="MedicineList" id="MedicineList5"></div>
                                </td>                            
                                <td>
                                    <input type="text" name="dose5" class="Dose" id="dose5" placeholder="Dose........." autocomplete="off">
                                    <div class="DoseList" id="DoseList5"></div>
                                </td>                            
                                <td>
                                    <input type="text" name="instruction5" class="Instruction" id="instruction5" placeholder="Instruction........." autocomplete="off">
                                    <div class="InstructionList" id="InstructionList5"></div>
                                </td>                            
                                <td>
                                    <input type="text" name="duration5" class="Duration" id="duration5" placeholder="Duration........." autocomplete="off">
                                    <div class="DurationList" id="DurationList5"></div>
                                </td>                            
                            </tr>


                        </tbody>
                        

                        
                        
                        

                    </table>

                    <button type="button" class="btn btn-success btn-sm" onclick="addEntry('table_body');">
					    <span class="fa fa-plus"></span>
				    </button>
                </div>


                <div class="output">
                    <textarea name="input" id="input" cols="30" rows="10">
                        <?php 
                            // echo $Comment.'<br>';
                        ?>
                    </textarea>
                </div>



            </div>

        </div>


    </form>


    



    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/homepage.js"></script>

    <script type="text/javascript" src="js/addRow.js"></script>


    <!-- from here this is the notepad code -->

    <script>
        if ( window.history.replaceState ) 
            {
                window.history.replaceState( null, null, window.location.href );
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
                  [["Paragraph", "<p>"], ["Header 1", "<h1>"], ["Header 2", "<h2>"],
                  ["Header 3", "<h3>"],  ["Header 4","<h4>"],  ["Header 5","<h5>"],
                  ["Header 6","<h6>"]],
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