<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reading Record <?php echo $_GET['id'] ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <div class="header">
    
        <h1>PHP OOP CRUD - READING RECORD <?php echo $_GET['id'] ?></h1>
    </div>
    <?php
        include 'model.php';
        $model = new Model();
        $row = $model->read($_GET['id']);
        if(!empty($row)) {
            ?>
            <div class="record-container">
                <div class="record-name">
                    <h4><?php echo $row['name']; ?></h4>
                </div>
                <div class="record-email">
                    <h4><?php echo $row['email']; ?></h4>
                </div>
                <div class="record-name">
                    <h4><?php echo $row['address']; ?></h4>
                </div>
            </div>
            <?php
        }
    ?>
    <div class="form">
        
        <a href="records.php">Records</a>
    </div>
    
</div>
</body>
</html>