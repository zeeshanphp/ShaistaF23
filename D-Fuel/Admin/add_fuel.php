<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Fuel Type</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data">
                    <table class="table table-borderless mt-3">
                        <tr>
                            <td><b>Fuel Type:</b></td>
                            <td><input type="text" class="form-control" name="ftype" placeholder="Enter Fuel Name" required /></td>
                        </tr>
                        <tr>
                            <td><b>Fuel Price:</b></td>
                            <td><input type="text" class="form-control" name="fprice" placeholder="Enter Fuel Price" required /></td>
                        </tr>

                        <tr>
                            <td><button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button></td>
                            <td><input type="submit" name="add_fuel" class="btn btn-success w-100" value="Add Fuel"></td>
                        </tr>
                    </table>
                </form>
            </div>

        </div>
    </div>
</div>