<?php
include 'php/config.php';
if (isset($_GET['vid'])) {
    $vid = $_GET['vid'];
    $sql = "SELECT * FROM view1 WHERE vid='$vid'";
    $result = $conn->query($sql);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" media="print" href="css/print.css">
    <title>MC | Print Rx</title>
</head>
<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid" id="noprint">
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
                    <a class="nav-link active" href="prnt.php">Print Rx</a>
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
        <form action="prnt.php" method="get">
            <table class="table table-striped" id="noprint">
                <tr>
                    <td>
                        <input type="text" id="vid" name="vid" placeholder="Visit ID">
                        <input type="submit" value="Search">
                    </td>
                </tr>
            </table>
        </form>
        <table class="table table-striped">
            <tr>
                <td>
                    <div class="printarea">
                        <?php
                        if (isset($result)) {
                            while($row = $result->fetch_assoc()){
                        ?>
                        <p>Name: <?php echo $row['fnm']," ",$row['mnm']," ",$row['lnm']; ?></p>
                        <p>Age: <?php echo $row['age']," y"; ?></p>
                        <p>Date: <?php echo $row['dov'],"-",$row['mov'],"-",$row['yov']; ?></p>
                        <p>1. <?php echo $row['rx1']; ?></p>
                        <p>2. <?php echo $row['rx2']; ?></p>
                        <p>3. <?php echo $row['rx3']; ?></p>
                        <p>4. <?php echo $row['rx4']; ?></p>
                        <?php
                            }
                        }
                        $conn->close();
                        ?>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <script src="js/bootstrap.bundle.js"></script>
</body>
</html>
