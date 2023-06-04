
<?php

    include('PHPConnect.php'); 

    error_reporting(0);

    $query = "SELECT * FROM patientdatabase";
    $final_query = mysqli_query($conn,$query);
    $count = mysqli_num_rows($final_query);




    // Retrieve selected checkbox values
    if (isset($_POST['sent_ck_sms'])) {
        $items = $_POST['check_data'];
        $item="";

        foreach ($items as $item) {
            $Token = $_POST['token'];
            $Message = $_POST['messageBox'];

            if($_POST['token'] == " "){
                ?>
                <script>prompt('Fill up the form');</script>
                <?php
                
            }
            else{
                

                // $Token = $_POST['token'];
                // $Message = $_POST['messageBox'];
                
                $to = $item.',';
                // echo $to;
                // $token = "9199221400167786004099aa99a97d6577d203dd72204a7eeb87";
                $token = $Token;
                $message = $Message;

                $url = "http://api.greenweb.com.bd/api.php?json";

                $data= array(
                'to'=>"$to",
                'message'=>"$message",
                'token'=>"$token"
                ); 
                $ch = curl_init(); 
                curl_setopt($ch, CURLOPT_URL,$url);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch, CURLOPT_ENCODING, '');
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $smsresult = curl_exec($ch);

                //Result
                // echo $smsresult;
                
                // echo 'Message Send';
                ?>
                <script>prompt('Message Sent');</script>
                <?php
                
                //Error Display
                echo curl_error($ch);
            }
        
        }
    }

    // Close database connection
    mysqli_close($conn);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMS</title>
    <link rel="stylesheet" href="sms.css">
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


    <div>

        <form action="" method="post">

            <div class="Form">

                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th class="reg">Reg NO.</th>
                            <th class="name">Name</th>
                            <th class="phone">Phone Number</th>
                            <th class="sms"><input type="submit" class="btn btn-succes" name="sent_ck_sms" value="SENT SMS"></th>
                        </tr>
                    </thead>

                    <?PHP

                        if($count != 0)
                        {
                            while($row = mysqli_fetch_assoc($final_query)){
                                 $reg = $row['RegNo'];
                                // $name = $row['Name'];
                                 $phone = $row['Mobile'];

                                echo "<tbody><tr>
                                <td>".$row['RegNo']."</td>
                                <td>".$row['Patient_Name']."</td>
                                <td>".$row['Mobile']."</td>
                                <td><center>" ?> <input type="checkbox" class="checkbox" name="check_data[]" value="<?php echo $phone; ?>" > <?php "</center></td>
                                

                                </td></tr></tbody>";
                            }
                        
                        }
                        else{

                        }
                        
                    ?>

             

                </table>

            </div>


            <div class="message">
        
                <!-- <label for="">Token : </label> -->
                <input type="text" name="token" class="token" placeholder="Give Your API Token...................." require><br>
                <textarea name="messageBox" class="messageBox" placeholder="Write your valuable message...................." require cols="30" rows="10"></textarea>

            </div>
            
        </form>

    </div>


</body>
</html>