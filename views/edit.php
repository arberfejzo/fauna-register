<?php
include_once '../database.php';

$speces = '';
$latitude = '';
$longitude = '';
$notes = '';

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $result = $conn->query("SELECT * FROM animal_table WHERE animal_id=$id") or die($conn->error);
    if ($result) {
        $row = $result->fetch_array();
        $speces = $row['animal_speces'];
        $latitude = $row['latitude'];
        $longitude = $row['longitude'];
        $notes = $row['notes'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <title>Input</title>
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="">
                <img src="../bearLogo.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
                Wild Fauna Inventory
            </a>
        </div>
    </nav>
    <div class="container-sm">
        <div class="container-sm my-3">
            <div id="map" style="height: 300px;
	    width: 100%;"></div>
            <?php
            include_once '../functions/map.php'
            ?>
        </div>
        <form action="../functions/insertdata.php">
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Species</span>
                <input id="speces" name="speces" type="text" value="<?php echo $speces ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Latitude</span>
                <input id="latitude" name="latitude" type="number" value="<?php echo $latitude ?>" step="any" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Longitude</span>
                <input id="longitude" name="longitude" type="number" value="<?php echo $longitude ?>" step="any" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Notes</span>
                <input id="notes" name="notes" type="text" value="<?php echo $notes ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>

            <div class="input-group mb-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>