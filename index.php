<?php

       
    

require_once 'configs.php';



if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$no_of_records_per_page = 5;
$offset = ($pageno-1) * $no_of_records_per_page;


$total_pages_sql = "SELECT COUNT(*) FROM Message";
$result = mysqli_query($conn,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

?>
<!DOCTYPE html>
<html>

<head>
<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">-->
<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" crossorigin="anonymous">-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">




</head>

<body style = "padding: 50px">


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Import CSV </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./index.php">Records</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./addRec.php">Create Record</a>
                </li>
        </div>
    </div>
</nav>


    <div class="row" style="padding-top: 100px; padding-bottom: 100px">
        <form class="form-horizontal" action="functions.php" method="post" name="upload_excel" enctype="multipart/form-data">
            <fieldset>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="filebutton"><h1>Select File</h1></label>
                    <div class="col-md-4">
                        <input type="file" name="file" id="file" class="input-large">
                    </div>
                </div>
                <br>
                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="singlebutton">Import data</label>
                    <div class="col-md-4">
                        <button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Import</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>


                    <div  style= "font-family:'Arial'">
                <div>
                    <h1>Records</h1>
                <br>
                <?php



                $sql = "SELECT * FROM Message
                ORDER BY RunNumber LIMIT $offset, $no_of_records_per_page";
                if ($result = $conn->query($sql)) {
                    ?>


                <div class="table-responsive-xl" style = "overflow-y:scroll; height : 700px; padding: 10px;" >
                    <p><button class=" btn btn-secondary" onclick="sortTable()">Sort by Train Line </button></p>
                    <table class="table table-striped" id="myTable">
                        <thead>
                        <th> Train Line</th>
                        <th> Route </th>
                        <th> Run Number </th>
                        <th> Operator id</th>


                        </thead>
                        <tbody>
                        <?php
                        while ($row = $result->fetch_row()) {
                            ?>
                            <tr>
                                <td><?php printf("%s", $row[0]); ?> </td>
                                <td><?php printf("%s", $row[1]); ?> </td>
                                <td><?php printf("%s", $row[2]); ?> </td>

                                <td><?php printf("%s", $row[3]); ?> </td>

                                <td><a href="update_interface.php?RunNumber=<?php echo $row[2] ?>">Update</a></td>
                                <td><a href="delete_record.php?RunNumber=<?php echo $row[2] ?>">Delete</a></td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                    <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item" ><a class ="page-link" href="?pageno=1">First</a></li>
                        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                            <a class ="page-link" href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
                        </li>
                        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                            <a class ="page-link" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
                        </li>
                        <li class="page-item" ><a class ="page-link" href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
                    </ul>
                    </nav>

                </div>
                    <?php
                }
                ?>


                </div>
        </div>



<script>
    function sortTable() {
        var table, rows, switching, i, x, y, shouldSwitch;
        table = document.getElementById("myTable");
        switching = true;
        /*Make a loop that will continue until
        no switching has been done:*/
        while (switching) {
            //start by saying: no switching is done:
            switching = false;
            rows = table.rows;
            /*Loop through all table rows (except the
            first, which contains table headers):*/
            for (i = 1; i < (rows.length - 1); i++) {
                //start by saying there should be no switching:
                shouldSwitch = false;
                /*Get the two elements you want to compare,
                one from current row and one from the next:*/
                x = rows[i].getElementsByTagName("TD")[0];
                y = rows[i + 1].getElementsByTagName("TD")[0];
                //check if the two rows should switch place:
                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                    //if so, mark as a switch and break the loop:
                    shouldSwitch = true;
                    break;
                }
            }
            if (shouldSwitch) {

                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
            }
        }
    }
</script>



</body>

</html>
