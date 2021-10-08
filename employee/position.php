<div class="modal" id="positionModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">ADD Position</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST">
          <div id="viewposition"></div>
          <div class="mb-3">
            <label for="position" class="form-label">Position</label>
            <input type="position" class="form-control" name="position" id="position">
          </div>
          <hr>
          <div class="text-end">
            <button type="submit" class="btn btn-primary" name="submit_position" id="submit_position">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>