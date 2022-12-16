<?php 
    require_once 'db/conn.php';

  if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $specialty = $_POST['specialty'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $number = $_POST['contact'];
    $previous_picture = $_POST['avatar_image'];

    $tmpFile = $_FILES['avatar']['tmp_name'];
    $ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
    $target_dir = 'images/uploads/';
   

    if(empty($tmpFile)){
      $destination = $previous_picture;
    }else {
      $destination = $target_dir . $number . "." .  $ext;
      move_uploaded_file($tmpFile, $destination);
    }
    
    //call the function
    $result = $crud->updateDetails($id, $fname, $lname, $specialty, $dob, $email, $number, $destination);  
    
    if($result == true){
      header('location: viewrecords.php?update=success');
    }else{
      echo '<h1 class="text-center mt-5"> Update fail!</h1>';
    }
  }
   ?>