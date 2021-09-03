


<?php
session_start();
require_once('./configs.php');


if (isset($_GET['RunNumber'])) {
    echo "sucess";

    $RunNum = $_GET['RunNumber'];
    $sql = "SELECT * FROM Message WHERE RunNumber =  '".$RunNum." ' ";

    echo $sql;
    $result = mysqli_query($conn, $sql);

    

    
    $row = mysqli_fetch_array($result);
    

    
}
else {
    echo "No user id received on request at update_interface get";
    die();
}

?>





<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div style="margin-top: 20px" class="container">
        <h1>Update record</h1>

        <form action="update.php" method="post">
            <input type="hidden" name="RunNumber" id="RunNumber" value="<?php echo $row['RunNumber'] ?>">



            <label for="Train Line">Train Line</label>
            <input class="form-control" type="text" name="TrainLine" id="TrainLine" value="<?php echo $row['TrainLine'] ?>">


            <div class="form-group">
                <label for="Route">Route</label>
                <input class="form-control" type="text" id="Route" name="Route" value="<?php echo $row['Route']?>">
            </div>

            <div class="form-group">
                <label for="RunNumbers">RunNumber</label>
                <input class="form-control" type="text" id="RunNumbers" name="RunNumbers" value="<?php echo $row['RunNumber'] ?>">
            </div>

            <div class="form-group">
                <label for="Operator ID">Operator ID</label>
                <input class="form-control" type="text" id="OperatorID" name="OperatorID" value="<?php echo $row['OperatorID'] ?>">
            </div>





            <div class="form-group">
                <input class="btn btn-primary" name='Submit' type="submit" value="Updates">
            </div>
        </form>
       

        <!-- jQuery and JS bundle w/ Popper.js -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
