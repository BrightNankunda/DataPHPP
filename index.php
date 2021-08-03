<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Data By 97</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <div class="header">
    
        <h1>PHP OOP CRUD</h1>
    </div>
    <?php
        include 'model.php';
        $model = new Model();
        $insert = $model->insert();
    ?>
    <div class="form">
        <form action="" method="post">
            <div class="form-group">
                <label for="name">Your Name:</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="Email">Your Email:</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="address">Your Address:</label>
                <textarea 
                name="address" 
                class="text-form-control" 
                id="address" cols="30" rows="5"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn">Submit</button>
            </div>
        </form>
        <a href="records.php">Records</a>
    </div>
    
</div>
</body>
</html>