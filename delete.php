<?php 
include 'model.php';

$id = $_GET['id'];

$model = new Model();
$delete = $model->delete($id);

?>