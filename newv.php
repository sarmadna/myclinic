<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>MC | New Visit</title>
</head>
<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
        <a class="navbar-brand" href="index.html"><h2>MyClinic</h2></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav fs-6 me-auto mb-2 mb-lg-0">
                <li class="nav-item mx-2">
                    <a class="nav-link" href="allps.php">All Patients</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="newp.php">New Patient</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link active" href="newv.php">New Visit</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="prnt.php">Print Rx</a>
                </li>
            </ul>
            <form class="d-flex" action="srchp.php" method="get">
                <input class="form-control form-control-sm me-2" type="text" id="pid" name="pid" placeholder="Patient ID" aria-label="Search">
                <input class="form-control form-control-sm me-2" type="text" id="fnm" name="fnm" placeholder="First Name" aria-label="Search">
                <button class="btn btn-sm btn-outline-light" type="submit">Search</button>
            </form>
        </div> 
        </div>
    </nav>
    <div class="container-fluid bg-light mt-5 py-5">
			<form action="newv.php" method="post">
				<table class="table table-striped">
					<tr>
						<td><label for="pid">Patient ID</label></td>
						<td><input type="text" id="pid" name="pid" size="20"></td>
					</tr>
					<tr>
						<td><label for="dov">Date of Visit</label></td>
						<td><input type="text" id="dov" name="dov" size="2" placeholder="DD">/<input type="text" id="mov" name="mov" size="2" placeholder="MM">/<input type="text" id="yov" name="yov" size="4" placeholder="YYYY"></td>
					</tr>
					<tr>
						<td><label for="cc">Complaint</label></td>
						<td><input type="text" id="cc" name="cc" size="40"></td>
					</tr>
					<tr>
						<td><label for="dx">Diagnosis</label></td>
						<td><input type="text" id="dx" name="dx" size="40"></td>
					</tr>
					<tr>
						<td><label for="rx1">Rx1</label></td>
						<td><input type="text" id="rx1" name="rx1" size="40"></td>
					</tr>
					<tr>
						<td><label for="rx2">Rx2</label></td>
						<td><input type="text" id="rx2" name="rx2" size="40"></td>
					</tr>
					<tr>
						<td><label for="rx3">Rx3</label></td>
						<td><input type="text" id="rx3" name="rx3" size="40"></td>
					</tr>
					<tr>
						<td><label for="rx4">Rx4</label></td>
						<td><input type="text" id="rx4" name="rx4" size="40"></td>
					</tr>
					<tr>
						<td colspan="2" style="text-align: center"><input type="submit" value="Submit"></td>
					</tr>
				</table>
			</form>
    </div>
	<div class="container-fluid bg-success text-center fixed-bottom">
		<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {//Check it is comming from a form
		include 'php/config.php';
           
		$pid = $_POST["pid"];
		$dov = $_POST["dov"];
		$mov = $_POST["mov"];
		$yov = $_POST["yov"];
		$cc = $_POST["cc"];
		$dx = $_POST["dx"];
		$rx1 = $_POST["rx1"];
		$rx2 = $_POST["rx2"];
		$rx3 = $_POST["rx3"];
		$rx4 = $_POST["rx4"];
           
		if (empty($pid)){
			die("Please fill in the field");
		}
		if (empty($dov)){
			die("Please fill in the field");
		}
        
		if (empty($mov)){
			die("Please fill in the field");
		}
		if (empty($yov)){
			die("Please fill in the field");
		}
        
		//prepare sql insert query
		$stmt_vsts = $conn->prepare("INSERT INTO vsts (pid, dov, mov, yov, cc, dx, rx1, rx2, rx3, rx4) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
		//bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
		$stmt_vsts->bind_param('ssssssssss', $pid, $dov, $mov, $yov, $cc, $dx, $rx1, $rx2, $rx3, $rx4);
        
		//bind values and execute insert query
		if($stmt_vsts->execute()){
			print "Data uploaded successfully!";
		}else{
			print $conn->error; //show mysql error if any
		}
		$conn->close();
		}
		?>
	</div>
    <script src="js/bootstrap.bundle.js"></script>
</body>
</html>
