<?php
    $title = "View Records";
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    $results = $crud->getAttendees();
?>
<div class="card overflow-auto mt-3">
    <div class="card-body">
        <h1 class="display-6">Attendees</h1>
        <table class="table table-bordered text-center ">
        <thead>
        <tr> 
            <th>#</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Specialty</th>
            <th>Action</th>
        </tr>
        <?php
            while($r = $results->fetch(PDO::FETCH_ASSOC)){
        ?>
            <tr>
                <td>
                    <?php echo $r['id']; ?>
                    <input type="hidden" value="<?php echo $r['id']; ?>" name="id">
                </td>
                <td><?php echo $r['firstname']; ?></td>
                <td><?php echo $r['lastname']; ?></td>
                <td><?php echo $r['name']; ?></td>
                <td>
                    <a href="view.php?id=<?php echo $r['id']; ?>" class="btn-design btn btn-success">View</a>
                    <button data-id="<?php echo $r['id']; ?>" type="button" class="btn-design btn btn-danger delete-button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Delete</button>
                </td>
            </tr>
        <?php  } ?>
        </thead>
        <tbody>
        
        
        </tbody>


    </table>
    </div>
</div>

  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Delete Confirmation</h5>
                            <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <a data-id="" class="btn btn-danger confirm-delete">Confirm</a>
                        </div>
                        </div>
                    </div>
                </div>


<?php require_once 'includes/footer.php'; ?>