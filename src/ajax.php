<style>
    .test {
        background-color: red;
    }
</style>

<?php
//Including Database configuration file.
include "connection.php";


//Getting value of "search" variable from "script.js".
if (isset($_POST['search'])) {
    //Search box value assigning to $Name variable.
    $name = $_POST['search'];
    //Search query.
    $Query = "SELECT * FROM `drugs` WHERE `Brand_Name` like '" . $name . "%' LIMIT 6";
    //Query execution
    $ExecQuery = MySQLi_query($connection, $Query);
    //Creating unordered list to display result.
    echo '
<ul class="list-group" style="width: 90%;">
   ';
    //Fetching result from database.
    while ($Result = MySQLi_fetch_array($ExecQuery)) {
?>
        <!-- Creating unordered list items.
        Calling javascript function named as "fill" found in "script.js" file.
        By passing fetched result as parameter. -->
        <li class="list-group-item" onclick='fill("<?php echo $Result['Brand_Name']; ?>")'>
            <div class="row">
                <div class="col-sm-8">
                    <?php echo ($Result['Brand_Name']); ?>
                </div>
                <div align="right" class="col-sm-4">
                    <button type="button" class="btn btn-secondary" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                        Add
                    </button>
                </div>
            </div>
            <!-- <div class="float-right"> lamo</div> -->
        </li>
        <!-- Below php code is just for closing parenthesis. Don't be confused. -->
<?php
    }
}
?>
</ul>