

<?php 

session_start();
require_once('./configs.php');


if (isset($_GET['RunNumber'])){

    $userid = $_GET['RunNumber'];
    $test = "RunNumber";
    $query = "DELETE FROM Message WHERE ".$test." = '".$userid."' ";

    if ($conn->query($query) === TRUE) {
        echo "Record deleted successfuly";
        header("Location: index.php");
     } else {
         echo "Error: " . $query . "<br>" . $conn->error;
     }
} else{
    echo "No id received";
    header("Location: index.php");
}

?>
