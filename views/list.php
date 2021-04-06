<?php
include_once '../database.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <title>Show my data</title>
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
    <!-- <?php
            $sql = "SELECT animal_id, animal_speces, latitude, longitude, notes, user_name FROM animal_table JOIN user_table ON user_table.user_id = animal_table.userID;";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);



            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo $row['animal_speces'] . " " . $row['latitude'] . " " . $row['longitude'] . " " . $row['notes'] . "<br>";
                }
            }
            ?> -->
    <div class="container">
        <table id="editableTable" class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Species</th>
                    <th scope="col">Latitude</th>
                    <th scope="col">Longitude</th>
                    <th scope="col">Notes</th>
                    <th scope="col">User</th>
                    <th colspan="2">Action</th>
                </tr>
            <tbody>
                <?php
                $sql = "SELECT animal_id, animal_speces, latitude, longitude, notes, user_name FROM animal_table JOIN user_table ON user_table.user_id = animal_table.userID;";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);

                if ($resultCheck > 0) {
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <th scope="row"><?php echo $row['animal_id']; ?></td>
                            <td><?php echo $row['animal_speces']; ?></td>
                            <td><?php echo $row['latitude']; ?></td>
                            <td><?php echo $row['longitude']; ?></td>
                            <td><?php echo $row['notes']; ?></td>
                            <td><?php echo $row['user_name']; ?></td>
                            <td>
                                <a href="../views/edit.php?edit=<?php echo $row['animal_id']; ?>" class="btn btn-info">Edit</a>
                                <a href="../functions/delete.php?delete=<?php echo $row['animal_id']; ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                <?php }
                } ?>
            </tbody>
            </thead>
        </table>
    </div>

    <hr>

    <div class="d-grid gap-2 col-6 mx-auto">
        <button class="btn btn-primary" type="button" onclick="window.location.href='../views/input.php';">Add data</button>
        <button class="btn btn-primary" type="button" onclick="window.location.href='../functions/logout.php';">Log out</button>
    </div>

    <script src="../plugin/bootstable.js"></script>
    <script src="../js/editable.js"></script>

</body>

</html>