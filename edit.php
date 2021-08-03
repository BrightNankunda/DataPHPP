<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT RECORD <?php echo $_GET['id'] ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="header">
        
            <h1>PHP OOP CRUD - EDIT RECORD <?php echo $_GET['id'] ?></h1>
        </div>
        <?php
            include 'model.php';
            $model = new Model();
            $id = $_GET['id'];
            $row = $model->update($id);
            if(isset($_POST['edit'])) {
                if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['address'])) {
                    if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['address'])) {
                        $data['id'] = $id;
                        $data['name'] = $_POST['name'];
                        $data['email'] = $_POST['email'];
                        $data['address'] = $_POST['address'];

                        $update = $model->edit($data);
                        
                    } else {
                        header("location: edit.php?msg=Not Updated?id=$id");
                    }
                }
            }
            if($row) {
            
        ?>
        <div class="form">
            <form action="" method="post">
                <div class="form-group">
                    <label for="name">Your Name:</label>
                    <input 
                    type="text" 
                    name="name" 
                    value="<?php echo $row['name'] ?>"
                    id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="Email">Your Email:</label>
                    <input 
                    type="email" 
                    name="email" 
                    value="<?php echo $row['email']?>"
                    id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="address">Your Address:</label>
                    <textarea 
                    name="address" 
                    class="text-form-control" 
                    id="address" cols="30" rows="5"
                    ><?php echo $row['address']; ?></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" name="edit" class="btn">Update</button>
                </div>
            </form>
            <a href="records.php">Records</a>
        </div>
        <?php
            }
        ?>

    </div>
</body>
</html>