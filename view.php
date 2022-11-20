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

<div class="card mx-auto mt-4 view-card">
  <div class="card-body">
    <div class="row">
      <h3 class="">Profile Information</h3>
      <hr>
    </div>
    <div class="row">
      <div class="col-md-4">
          <img class="img-thumbnail profile-image" src="images/defaul-profile.png" alt="profile">
      </div>
      <div class="col-md-8 align-items-center">
          
        <h5 class="card-title mt-2"><?php echo  $result['firstname'] . " " . $result['lastname'] ?></h5>
        
        <p class="card-text">
            Specialty : <?php echo  $result['name'] ?> <br>
            Date of Birth: <?php echo $result['dateofbirth']  ?> <br>
            Email: <?php echo $result['email']?> <br>
            Contact Number: <?php echo $result['contact'] ?>
        </p><br>
      </div>
  </div>
  <div class="row">
    <a href="edit.php?id=<?php echo $result['id'] ?>" class="btn btn-dark">Edit Detail</a> 
  </div>
</div>

<?php } ?>


<?php require_once 'includes/footer.php'; ?>