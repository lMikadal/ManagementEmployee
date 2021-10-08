<?php
include_once "modal.php";

$modal = new Modal();

$row = $modal->fetchposition();
?>

<div class="modal" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">ADD Employee</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST">
          <div id="result"></div>
          <div class="row">
            <div class="col-6 mb-3">
              <label for="fname" class="form-label">First Name</label>
              <input type="text" class="form-control" name="fname" id="fname">
            </div>
            <div class="col-6 mb-3">
              <label for="lname" class="form-label">Last Name</label>
              <input type="text" class="form-control" name="lname" id="lname">
            </div>
          </div>
          <div class="mb-3">
            <label for="tel" class="form-label">TEL.</label>
            <input type="tel" class="form-control" name="tel" id="tel" pattern="[0-9]{10}">
          </div>
          <div class="mb-3">
            <label for="position" class="form-label">Position</label>
            <div id="selectPosition">
              <select class="form-select">
                <?php foreach ($row as $rows){ ?>  
                  <option value="<?php echo $rows['id'];?>"><?php echo $rows['position'];?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <hr>
          <div class="text-end">
            <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>