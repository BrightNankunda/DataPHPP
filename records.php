<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email_data - Records</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2 class="header">Email Data: All our DATA</h2>
        <div class="deleted">
            <?php
                $msg = $_GET['msg'] ?? null;
                if($msg !== null) {

                    echo "<h1>$msg </h1>";
                }

            ?>
        </div>
        <div class="form">
            <div class="">
                <a href="index.php">INSERT DATA</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>EMAIL</th>
                        <th>ADDRESS</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <?php
                    include 'model.php';
                    $model = new Model();
                    $rows = $model->fetch();
                    if(!empty($rows)) {
                        foreach ($rows as $row) {
                            ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $row['id'] ?></td>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><?php echo $row['email'] ?></td>
                                    <td><?php echo $row['address'] ?></td>
                                    <td>
                                        <a href="read.php?id=<?php echo $row['id']?>">READ</a>
                                        <a href="edit.php?id=<?php echo $row['id'] ?>">EDIT</a>
                                        <a href="delete.php?id=<?php echo $row['id']?>">DELETE</a>
                                    </td>
                                </tr>
                            </tbody>
                            <?php
                        }
                    }
                ?>
            </table>
        </div>
    </div>
</body>
</html>