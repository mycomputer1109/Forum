<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#logoutModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="logoutModal">Confirm</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body fs-3">
        <p>Are you sure want to <span class="fw-bold text-danger"> Log Out. </span> </p>
      </div>
      <div class="modal-footer ">
        <button type="button" class="btn btn-secondary fw-bold" data-bs-dismiss="modal">No</button>
        <a href="/ayush/forum/partials/_handleLogout.php" type="button" class="btn btn-danger fw-bold">Yes</a>
      </div>
    </div>
  </div>
</div>