<?php
include_once 'modal.php';

$id = $_POST['id'];
$modal = new Modal();

$row = $modal->edit($id);

if (!empty($row)) {?>

    <form method="POST">
            <div>
                <input type="hidden" id="id" value="<?php echo $row['id'];?>">
            </div>
            <div class="row">
                <div class="col-6 mb-3">
                <label for="fname" class="form-label">First Name</label>
                <input type="text" class="form-control" name="fname" id="edit_fname" value="<?php echo $row['firstname'];?>">
                </div>
                <div class="col-6 mb-3">
                <label for="lname" class="form-label">Last Name</label>
                <input type="text" class="form-control" name="lname" id="edit_lname" value="<?php echo $row['lastname'];?>">
                </div>
            </div>
            <div >
                <label for="tel" class="form-label">TEL.</label>
                <input type="tel" class="form-control" name="tel" id="edit_tel" pattern="[0-9]{10}" value="<?php echo $row['tel'];?>">
            </div>
    </form>

<?php
}
?>