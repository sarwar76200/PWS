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

                <table>

                </table>

            </div>


            <div class="mainBar">


            </div>

            <div class="rightSideBar">

            </div>
            <div>
                
            </div>

        </div>


    </form>
   

</body>
</html>



<script>
document.getElementById('Date').value = new Date().toISOString().substring(0, 10);
</script>