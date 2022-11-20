<?php
    $title = "Success";
    require_once 'includes/header.php';
    require_once 'db/conn.php';
    require_once 'sendemail.php';
?>



  <?php 
  if(isset($_POST['submit'])){
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $specialty = $_POST['specialty'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $number = $_POST['contact'];
    $full_name = ucwords($fname . " " . $lname);
   
    $isSuccess =  $crud->registerMember($fname, $lname, $specialty, $dob, $email, $number);
   
    $specialty_name =  $crud->getSpecialtyById($specialty);
    
    if($isSuccess){
      SendEmail::SendMail($email, 'Zreon Registration', 'You have been registered to Zreon', $full_name); 
      include 'includes/successmessage.php';

    }else{
      include 'includes/errormessage.php';
    }
  }
   ?>
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo  $fname . " " .  $lname; ?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php echo  $specialty_name['name'] ?></h6>
    <p class="card-text">
        Date of Birth: <?php echo $dob  ?> <br>
        Email: <?php echo $email ?> <br>
        Contact Number: <?php echo $number ?>
    </p>
    <a href="viewrecords.php" class="btn btn-primary">View Records</a>
  </div>
</div>


<?php require_once 'includes/footer.php'; ?>