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

    //call the function
    $result = $crud->updateDetails($id, $fname, $lname, $specialty, $dob, $email, $number);  
    
    if($result == true){
      header('location: viewrecords.php?update=success');
    }else{
      echo '<h1 class="text-center mt-5"> Update fail!</h1>';
    }
  }
   ?>