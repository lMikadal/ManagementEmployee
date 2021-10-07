<?php
include_once "modal.php";

$id = $_POST['id']; 
$modal = new Modal();

$del = $modal->del($id);
?>