<?php
include 'php/config.php';
$sql = "SELECT * FROM ptns";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>MC | All Patients</title>
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
                    <a class="nav-link active" href="allps.php">All Patients</a>
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
            $conn->close();
            ?>
        </table>
    </div>
    <script src="js/bootstrap.bundle.js"></script>
</body>
</html>
