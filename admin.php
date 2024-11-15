<?php

    require_once ('server.php');
    $query = "SELECT * from user";
    $resault2 = mysqli_query($connect, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADmin</title>
</head>
<body>
<div class="table-responsive">
    <table class="table table-bordered">

    <tr>
        <td>userID</td>
        <td>username</td>
        <td>status</td>
        <td>edit</td>
        <td>delete</td>
    </tr>

    <tr>
    <?php
        while($row = mysqli_fetch_assoc($resault2)) 
        {
        ?>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><a href="" class="btn-edit">Edit</a></td>
            <td><a href="" class="btn-delete">Delete</a></td>
    </tr>
        <?php
        }
         
        ?>
    </table>
</div>
</body>
</html>