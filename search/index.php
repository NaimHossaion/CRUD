<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>.: Inventory :.</title>
	
    <link rel="stylesheet" href="css/1/bootstrap.min.css">
	<link rel="stylesheet" href="css/1/dataTables.bootstrap.min.css">
	<script src="js/jquery-3.3.1.js" type="text/javascript"></script>
    <script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
	<script src="js/dataTables.bootstrap.min.js" type="text/javascript"></script>
	<script src="js/script.js" type="text/javascript"></script>
    
	<style type="text/css">
        .wrapper{
            width: 1050px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 10;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
		tr:nth-child(even) {
  			background-color: #f2f2f2
		}
	</style>
	
	<script>
	$(document).ready(function() {
    $('#example').DataTable();
} );
	</script>

</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
					<br><br>
                  
					
                    <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM inventory";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table id='example' class='table table-bordered table-sm'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>SL</th>";
                                        echo "<th>Branch</th>";
                                        echo "<th>Department</th>";
                                        echo "<th>User_Name</th>";
							            echo "<th>Emp_ID</th>";
							            echo "<th>IP_Address</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['SL'] . "</td>";
                                        echo "<td>" . $row['Branch'] . "</td>";
                                        echo "<td>" . $row['Department'] . "</td>";
                                        echo "<td>" . $row['User_Name'] . "</td>";
                                        echo "<td>" . $row['Emp_ID'] . "</td>";
                                        echo "<td>" . $row['IP_Address'] . "</td>";
	            //                                        
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
</body>
</html>