<?php 
require( "process/config.php" );


$action = isset( $_GET['action'] ) ? $_GET['action'] : "";
$user_id = isset( $_GET['id'] ) ? $_GET['id'] : "";
// $user_id = $_GET['id'];
switch($action){
		case 'update':
			header("Location: updateuser.php?id=$user_id");
			// echo "UPDATE";
			// echo "id=".$user_id;
			break;
		case 'delete':
			echo "DELETE";
			break;
}

$connection = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
$sql="SELECT * FROM Profile";

$result = $connection->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administrator Panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper" class="toggled">
    
<?php require( "sidebar.php" ); ?>
    <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"> <i class="fa fa-bars"></i></a>
                        <h1>Employee</h1>
                    </div>
                </div>
            </div>

            <div class="panel panel-success">
			  <!-- Default panel contents -->
			  <div class="panel-heading">Employee List</div>

			  <!-- Table -->
			  <table class="table">
			  <thead><tr>
			    	<td>NAME</td>
			    	<td>ROLE</td>
			    	<td>JOINDATE</td>
			    	<td>ACTION</td>
			    </tr></thead>

			    <?php
			    if ($result->num_rows > 0) {
			    while($row = mysqli_fetch_assoc($result)) {
				echo 	"<tr>";
				echo "<td>".$row['fullname']."</td>";
				echo "<td>".$row['role']."</td>";
				echo "<td>".$row['joindate']."</td>";
				echo "<td><a href='?action=update&id=".$row['user_id']."''>Update</a> | <a href='process/delete.php?id=".$row['user_id']."'>Delete</a></td>";
				echo "</tr>";
					}
				}else{
					echo "<tr><td>No result.</td></tr>";
				}
					?>
			   
			  </table>
			</div>
			<a href="adduser.php" class="btn btn-success">Add Employee</a>


        </div>
        <!-- /#page-content-wrapper -->




    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>


