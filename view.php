<?php
    $title = "View";
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    //get attendee by id
    if(!isset($_GET['id'])){
        include 'includes/errormessage.php';
        header('location: viewrecords.php');
    }else {
        $id = $_GET['id'];
        $result = $crud->getAttendeeDetails($id);
    
?>

<div class="card mx-auto mt-4 w-50">
  <div class="card-body">
    <h1>Profile</h1>
    <h5 class="card-title"><?php echo  $result['firstname'] . " " . $result['lastname'] ?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php echo  $result['name'] ?></h6>
    <p class="card-text">
        Date of Birth: <?php echo $result['dateofbirth']  ?> <br>
        Email: <?php echo $result['email']?> <br>
        Contact Number: <?php echo $result['contact'] ?>
    </p>
    <a href="edit.php?id=<?php echo $result['id'] ?>" class="btn btn-dark">Edit Detail</a>
  </div>
</div>

<?php } ?>


<?php require_once 'includes/footer.php'; ?>