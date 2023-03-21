<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prescription Generator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="script.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

</head>

<body>
    <div class="container">

        <!-- Nav Begin -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Prescription Generator</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Prescribe</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Drugs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Find</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Options</a>
                        </li>

                    </ul>
                    <!-- <form class="d-flex" role="search" method="post">
                        <input class="form-control me-2" type="text" id="search" placeholder="Search" aria-label="Search" name="drug_name">
                        <button class="btn btn-outline-success" type="submit" name="search_drug">Search</button>

                    </form> -->

                </div>
            </div>
        </nav>

        <!-- Nav End -->


        <!-- Form Begin -->
        <form>
            <!-- First Row Begin -->
            <div class="row mt-3">
                <div class="col-sm-3">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="name">Name</span>
                        <input id="name" type="text" class="form-control" placeholder="Name">
                    </div>

                </div>
                <div class="col-sm-2">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="name">Age</span>
                        <input id="age" type="text" class="form-control" placeholder="Age">
                    </div>
                </div>
                <div class="col-sm-1">
                    <select class="form-select" aria-label="Default select example" id="sex">
                        <option selected>Sex</option>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="name">Address</span>
                        <input id="address" type="text" class="form-control" placeholder="Address">
                    </div>
                </div>
                <!-- <div class="col-sm-1">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div> -->
            </div>

            <!-- First Row End -->

            <!-- Second Row Begin -->

            <div class="row">
                <div class="col-sm-2">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="name">Mobile</span>
                        <input id="mobile" type="text" class="form-control" placeholder="Mobile">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="name">Reg No.</span>
                        <input id="regno" type="text" class="form-control" placeholder="Reg No.">
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="name">Date</span>
                        <input id="date" type="text" class="form-control" placeholder="Date">
                    </div>
                </div>
            </div>
            <!-- Second Row End -->

            <!-- Third Row Begin -->

            <div class="row">

                <!-- Third Row First Column Begin -->
                <div class="col-sm-4">
                    <div class="mb-3">
                        <label for="dx" class="form-label">Disease/Dx</label>
                        <input type="text" class="form-control" id="dx">
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder=" " id="cc"></textarea>
                        <label for="cc">C/C</label>
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text" id="name">BP&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <input id="bp" type="text" class="form-control" placeholder="Blood pressure">
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text" id="name">Pulse</span>
                        <input id="pulse" type="text" class="form-control" placeholder="Heart rate">
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text" id="name">Temp</span>
                        <input id="temp" type="text" class="form-control" placeholder="Body temperature">
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text" id="name">SpO2</span>
                        <input id="spo2" type="text" class="form-control" placeholder="Blood oxygen">
                    </div>

                </div>
                <!-- Third Row First Column End -->

                <!-- Third Row Second Column Begin -->

                <style>
                    .overlay {
                        position: absolute;
                    }
                </style>


                <div class="col-sm-2">
                    <form class="d-flex " role="search" method="get">
                        <label class="mb-2"> Select Brand Name</label>
                        <input autocomplete="off" class="form-control me-2" type="text" id="search" placeholder="Search" aria-label="Search" name="drug_name">

                    </form>
                    <div id="display" class="col-sm-2 overlay my-2"></div>
                </div>

                <div class="col-sm-2">
                    <label class="mb-2">Dose Type</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Dose</option>

                        <?php
                        include "connection.php";
                        if (isset($GET['drug_name'])) echo("LOL");
                        $med = $GET['drug_name'];
                        echo ('<option value="1">' . $med . '</option>')


                        ?>

                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="col-sm-2">
                    <p>lol2</p>
                </div>
                <div class="col-sm-2">
                    <p>lol2</p>
                </div>




            </div>



            <!-- Third Row End -->

        </form>
        <!-- Form End -->



        <!-- PHP Begin -->
        <?php
        include "connection.php";

        if (isset($_POST['search_drug'])) {
            $name = $_POST['drug_name'];
            $query = "SELECT * FROM `drugs` WHERE `Brand_Name` like '" . $name . "%' LIMIT 50";
            $result = $connection->query($query);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['ID'];
                    $name = $row['Brand_Name'];
                    $pharma = $row['Pharmaceutical'];
                    $price = $row['Unit_Price'];
                    $type = $row['Dosage_Type'];

                    echo ('<ul class="list-group">');
                    echo ('<li class="list-group-item">' . $name . ' • ' . $pharma . '</li>');

                    echo ('</ul>');
                }
            } else {
                die($connection->error);
            }
        }
        ?>
        <!-- PHP End -->


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>