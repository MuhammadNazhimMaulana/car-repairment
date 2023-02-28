<!-- Modal -->
<div class="modal fade" id="updateServiceModal" tabindex="-1" aria-labelledby="updateServiceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="updateServiceModalLabel">Update Repairment</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form data-action="{{ url('user/repairment/') }}" method="post" id="form-update">
            @method('put')
            @csrf
            <div class="modal-body">

                    <div class="mb-3">
                        <label for="status">Status</label>
                        <select class="form-select" aria-label="Select Status" name="status" id="status">
                            <option selected>Choose Status</option>
                            <option value="rejected">Rejected</option>
                            <option value="process">Process</option>
                        </select>
                    </div> 

                    <div class="mb-3">
                        <label for="fee" class="form-label">Fee</label>
                        <input type="number" class="form-control" id="fee" placeholder="25000" id="fee" name="fee">
                    </div> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>