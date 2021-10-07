<?php
include 'modal.php';

if (isset($_POST['update'])){
    if (!empty($_POST['id']) && !empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['tel'])){

        $data['id'] = $_POST['id'];
        $data['fname'] = $_POST['fname'];
        $data['lname'] = $_POST['lname'];
        $data['tel'] = $_POST['tel'];

        $modal = new Modal();
        $update = $modal->update($data);
    }
}

?>