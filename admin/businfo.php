<!DOCTYPE html>
 <html >
 <?php
 include "layout/head.php";
 include "layout/nav.php";
  ?>

 <!-- Content -->
 <div class="main">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h1 class="pull-left">View Buses</h1>
                    </div>
                    <?php
                    // Include config file
                    require_once 'config.php';

                    // Attempt select query execution
                    $sql = "SELECT * FROM bus_details";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Number Plate</th>";
                                        echo "<th>Bus Capacity</th>";
                                        echo "<th>Driver Id Number</th>";
                                        echo "<th>Company</th>";
                                      //  echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['no_plate'] . "</td>";
                                        echo "<td>" . $row['no_of_seats'] . "</td>";
                                        echo "<td>" . $row['driver_id'] . "</td>";
                                        echo "<td>" . $row['company'] . "</td>";
                                        /*echo "<td>";
                                            echo "<a href='read.php?id=". $row['route_id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a href='update.php?id=". $row['route_id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='delete.php?id=". $row['route_id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>"; */
                                    echo "</tr>";
                                }
                                echo "</tbody>";
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }

                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>
        </div>
    </div>
  </div>
 <?php
    include "layout/footer.php";
  ?>
