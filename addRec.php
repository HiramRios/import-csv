
<?php

session_start();
require_once('./configs.php');

?>




<!doctype html>




<html lang="en">

<head>
    
    <!-- Importing Bootstrap CSS library https://getbootstrap.com/ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<link rel="stylesheet" href="styles.css">


</head>









<body >




<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Import CSV </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="./index.php">Records</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="./addRec.php">Create Record</a>
                </li>
        </div>
    </div>
</nav>




<div style="margin-top: 20px" class="container">


    <h1>Create A Record </h1>
    <!-- styling of the form for bootstrap https://getbootstrap.com/docs/4.5/components/forms/ -->
    <form action="addRec.php" method="post">








        <div class="form-group">
            <label for="TrainLine">Train Line</label>
            <input class="form-control" type="text" id="TrainLine" name="TrainLine">
        </div>

        <div class="form-group">
            <label for="Route">Route</label>
            <input class="form-control" type="text" id="Route" name="Route">
        </div>
        <div class="form-group">
            <label for="RunNumbers">Run Numbers</label>
            <input class="form-control" type="text" id="RunNumbers" name="RunNumbers">
        </div>
        <div class="form-group">
            <label for="OperatorID">Operator ID</label>
            <input class="form-control" type="text" id="OperatorID" name="OperatorID">
        </div>





        <div class="form-group">
            <input class="btn btn-primary" name='Submits' type="submit" value="Submits">
       </div>

    </form>

























    <?php


    if (isset($_POST['Submits'])){


        /**
         * Grab information from the form submission and store values into variables.
         */

        $TrainLine = isset($_POST['TrainLine']) ? $_POST['TrainLine'] : " ";
        $Route= isset($_POST['Route']) ? $_POST['Route'] : " ";
        $RunNumbers= isset($_POST['RunNumbers']) ? $_POST['RunNumbers'] : " ";
        $OperatorID = isset($_POST['OperatorID']) ? $_POST['OperatorID'] : " ";






        $querystudent  = "INSERT INTO Message Values ('".$TrainLine ."', '".$Route."', '".$RunNumbers."','".$OperatorID."')";



        if ($conn->query($querystudent) === TRUE) {
            echo "<br> New record created successfully for Record RunNumbers ".$RunNumbers;



        } else {
            echo "<br> The record was not created, the query: <br>" . $RunNumbers . "  <br> Generated the error <br>" . $conn->error;
        }



    }
    ?>




</div>













































































































    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>









</body>

</html>
