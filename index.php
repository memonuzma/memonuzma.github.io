<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		Insert Data
	</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
<div class="jumbotron">
	<h2 align="center"><a href="crud.php" class="btn btn-secondary">
  PHP - CRUD : ADD DATA </a></h2>
<hr>
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>2 Last Inserted Record</strong>&nbsp;&nbsp;
  <button type="button" class="close" aria-label="Close">
  <span aria-hidden="true" data-bs-dismiss="alert">&times;</span>
</button>
  <br>
  <div class="input-group mb-3">
<?php
$conn = @mysqli_connect('localhost', 'root' , '', 'result');
$query1 = "SELECT id,sname FROM marks ORDER BY ID DESC LIMIT 2";
$query1_run = mysqli_query($conn,$query1);
while ($data = mysqli_fetch_array($query1_run)) {
?>
<span class="input-group-text">ID</span>
  <input type="text" class="form-control" value="<?php echo $data['id'];?>" readonly>
  <span class="input-group-text">Name</span>
  <input type="text" class="form-control" value="<?php echo $data['sname'];?>" readonly>
  <br>
<?php
}
?>
</div>
</div>
<hr>
	<form action="" method="post">
		<div class="form-group">
			<label>Seat No.</label>
			<input type="text" name="id" class="form-control" placeholder="Seat No." required>	
		</div>
		<div class="form-group">
			<label>Student Name</label>
			<input type="text" name="sname" class="form-control" placeholder="Student Name" required>	
		</div>
		<div class="form-group">
			<label>Mother Name</label>
			<input type="text" name="mname" class="form-control" placeholder="Mother Name" required>	
		</div>
		<div class="form-group">
			<label>Obt. Marks</label>
			<input type="text" name="t_ob" class="form-control" placeholder="Obt. Marks" required>	
		</div>
		<div class="form-group">
			<label>Total Marks</label>
			<input type="text" name="total" class="form-control" placeholder="Total Marks" value="500" required>	
		</div>
		<button type="submit" name="insert" class="btn btn-success"> Save Data</button>
		<a href="crud.php" class="btn btn-danger"> Back </a>
	</form>
</div>	
</div>
</body>
</html>
<?php
$conn = @mysqli_connect('localhost', 'root' , '', 'result');
if(isset($_POST['insert'])){
	$id = $_POST['id'];
	$sname = $_POST['sname'];
	$mname = $_POST['mname'];
	$t_ob = $_POST['t_ob'];
	$total = $_POST['total'];
	$query = "INSERT INTO marks(`id`,`sname`, `mname`, `t_ob`, `total`) VALUES ('$id','$sname','$mname', '$t_ob', '$total')";
	$query_run = mysqli_query($conn,$query);
	if($query_run){
		echo '<script> alert("Record Inserted Successfully...");
		location.replace("insert.php");
		 </script>';
	}
	else {
		echo '<script> alert("Record not inserted !!"); </script>';
	}
}
