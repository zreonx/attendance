<?php
    $title = "Success";
    require_once 'includes/header.php';
    require_once 'db/conn.php';
?>



  <?php 
  if(isset($_POST['submit'])){
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $specialty = $_POST['specialty'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $number = $_POST['contact'];
    $isSuccess = $crud->registerMember($fname, $lname, $specialty, $dob, $email, $number);  
    
    if($isSuccess){
      include 'includes/successmessage.php';
    }else{
      include 'includes/errormessage.php';
    }
  }
   ?>
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo  $fname . " " .  $lname; ?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php echo  $specialty ?></h6>
    <p class="card-text">
        Date of Birth: <?php echo $dob  ?> <br>
        Email: <?php echo $email ?> <br>
        Contact Number: <?php echo $number ?>
    </p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>


<?php require_once 'includes/footer.php'; ?>