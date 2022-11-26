<?php
    $title = "Success";
    require_once 'includes/header.php';
    require_once 'db/conn.php';
    require_once 'sendemail.php';
?>

  <?php 
    if(!isset($_GET['register'])) {

    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $specialty = $_POST['specialty'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $number = $_POST['contact'];
    $full_name = ucwords($fname . " " . $lname);
    $status = "active";
    
    $orig_file = $_FILES['avatar']['tmp_name'];
    $ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
    $target_dir = 'images/uploads/';
    $destination = $target_dir . $number . "." .  $ext;
    move_uploaded_file($orig_file, $destination);
    
     $isSuccess =  $crud->registerMember($fname, $lname, $specialty, $dob, $email, $number, $destination, $status);
   
     $specialty_name =  $crud->getSpecialtyById($specialty);
     $email_exit = $crud->checkEmail($email);
     
     print_r($email_exist);
     if($isSuccess){
      SendEmail::SendMail($email, 'Zreon Registration', 'You have been registered to Zreon', $full_name); 
      include 'includes/successmessage.php';
      }
    }else {
      
    ?>
    
<div class="card" style="width: 18rem;">
  <div class="card-body">
    
    <img class="img-thumbnail profile-image" src="<?php if(empty($result['avatar_path'])){ echo "images/default-profile.png";}else { echo $result['avatar_path'];} ?>" alt="profile">
    <h5 class="card-title"><?php echo  $result['firstname'] . " " . $result['lastname'] ?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php echo  $result['name'] ?></h6>
    <p class="card-text">
        Date of Birth: <?php echo $result['dateofbirth']  ?> <br>
        Email: <?php echo $result['email']?> <br>
        Contact Number: <?php echo $result['contact'] ?>
    </p>
    <a href="viewrecords.php" class="btn btn-primary">View Records</a>
  </div>
</div>
<?php } ?>
<?php require_once 'includes/footer.php'; ?>