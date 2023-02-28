<!-- Modal -->
<div class="modal fade" id="createServiceModal" tabindex="-1" aria-labelledby="createServiceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="createServiceModalLabel">Add Vehicle</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/user/repairment" method="post">
            @csrf
            <div class="modal-body">
                    {{-- Hidden --}}
                    <input type="hidden" class="form-control" name="user_id" value="{{ $user->id }}">

                    <div class="mb-3">
                        <label for="vehicle_name" class="form-label">Vehicle Name</label>
                        <input type="text" class="form-control" id="vehicle_name" placeholder="Toyota Avanza" name="vehicle_name">
                    </div> 

                    <div class="mb-3">
                        <label for="issue">Issue</label>
                        <textarea class="form-control" placeholder="Leave a Specific Problem of Your Vehicle Here" id="issue" name="issue" style="height: 100px"></textarea>
                    </div> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </div>
        </form>
    </div>
</div>