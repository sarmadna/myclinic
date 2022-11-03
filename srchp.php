<?php
include 'php/config.php';
if (isset($_GET['pid'], $_GET['fnm'])) {
	$pid = $_GET['pid'];
	$fnm = $_GET['fnm'];
	$sql = "SELECT * FROM ptns WHERE pid='$pid' OR fnm='$fnm'";
	$sql2 = "SELECT * FROM view1 WHERE pid='$pid' OR fnm='$fnm'";
	$result = $conn->query($sql);
	$result2 = $conn->query($sql2);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>MC | Search</title>
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
                    <a class="nav-link" href="newv.php">New Visit</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="prnt.php">Print Rx</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link active" href="srchp.php">Search</a>
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
        <table class="table table-striped">
            <thead>
            <tr>
                <th>PID</th>
                <th>NAME</th>
                <th>SEX</th>
                <th>DOB</th>
                <th>ADR</th>
                <th>MOB</th>
            </tr>
            </thead>
            <?php
            if (isset($result)) {
                while($row = $result->fetch_assoc()){
            ?>
            <tr>
                <td><?php echo $row['pid']; ?></td>
                <td><?php echo $row['fnm']," ",$row['mnm']," ",$row['lnm']; ?></td>
                <td><?php echo $row['sex']; ?></td>
                <td><?php echo $row['dob']; ?></td>
                <td><?php echo $row['adr']; ?></td>
                <td><?php echo $row['mob']; ?></td>
            </tr>
            <?php
                }
            }
            ?>
        </table>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>PID</th>
                <th>VID</th>
                <th>DOV</th>
                <th>AGE</th>
                <th>CC</th>
                <th>DX</th>
                <th>RX1</th>
                <th>RX2</th>
                <th>RX3</th>
                <th>RX4</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (isset($result2)) {
                while($row2 = $result2->fetch_assoc()){
            ?>
            <tr>
                <td><?php echo $row2['pid']; ?></td>
                <td><?php echo $row2['vid']; ?></td>
                <td><?php echo $row2['dov'],"-",$row2['mov'],"-",$row2['yov']; ?></td>
                <td><?php echo $row2['age']; ?></td>
                <td><?php echo $row2['cc']; ?></td>
                <td><?php echo $row2['dx']; ?></td>
                <td><?php echo $row2['rx1']; ?></td>
                <td><?php echo $row2['rx2']; ?></td>
                <td><?php echo $row2['rx3']; ?></td>
                <td><?php echo $row2['rx4']; ?></td>
            </tr>
            <?php
                }
            }
            $conn->close();
            ?>
            </tbody>
        </table>
    </div>
    <script src="js/bootstrap.bundle.js"></script>
</body>
</html>
