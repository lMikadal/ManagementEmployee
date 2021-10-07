<?php
include_once 'modal.php';

$id = $_POST['id'];
$modal = new Modal();

$row = $modal->view($id);

if (!empty($row)){ ?>
    <h5 class="my-2">Employee, ID <?php echo $row['id'];?></h5>
    <table class="table table-bordered table-sm">
        <tr>
            <th><b>First Name:</b></th>
            <td><?php echo $row['firstname'];?></td>
        </tr>
        <tr>
            <th><b>Last Name:</b></th>
            <td><?php echo $row['lastname'];?></td>
        </tr>
        <tr>
            <th><b>TEL:</b></th>
            <td><?php echo $row['tel'];?></td>
        </tr>
        <tr>
            <th><b>Position:</b></th>
            <td><?php echo $row['position'];?></td>
        </tr>
    </table>
<?php
}   
?>