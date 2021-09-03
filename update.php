

<?php

// Accessing the information for the DB connection from the configuration file and validating that a user is logged in.
session_start();
require_once('./configs.php');
//require_once('../validate_session.php');

if (isset($_POST['RunNumber'])){

    $ide = isset($_POST['RunNumber']) ? $_POST['RunNumber'] : " ";

    $TrainLine = isset($_POST['TrainLine']) ? $_POST['TrainLine'] : " ";
    $Route= isset($_POST['Route']) ? $_POST['Route'] : " ";
    $RunNumber = isset($_POST['RunNumbers']) ? $_POST['RunNumbers'] : " ";
    $OperatorID= isset($_POST['OperatorID']) ? $_POST['OperatorID'] : " ";



    $query = "UPDATE Message
    SET TrainLine = '".$TrainLine."', Route = '".$Route."', RunNumber = '".$RunNumber."', OperatorID = '".$OperatorID."'         
    WHERE RunNumber =  '".$ide."' ";
    
    echo $query;

    if (mysqli_query($conn, $query)) {
        echo "Record updated successfully";
        header("Location: index.php");
      } else {
        echo "Error updating record: " . mysqli_error($conn);
      }

}
else {
  echo "No records received on request at update record";
  die();
}

?>
