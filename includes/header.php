<?php 
    include_once 'includes/session.php';
    header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance - <?php echo $title; ?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="css/site.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">Zreon</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav me-auto">
            <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="viewrecords.php">View Attendees</a>
            </li> 
        </ul>
        <ul class="navbar-nav">
            <?php if(isset($_SESSION['user_id'])){
            ?>
            <li class="nav-item dropdown">
             <div class="btn-group">
                <a class="nav-link" href="#" role="button"><?php echo "Welcome " . strtoupper($_SESSION['username']); ?></a>
                <a type="button" class="dropdown-toggle mt-2 logoutbtn" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="visually-hidden">Toggle Dropdown</span>
                </a>
                <ul class="dropdown-menu menu">
                    <li><a class="dropdown-item menu-item" href="#">Acount</a></li>
                    <li><a class="dropdown-item menu-item" href="logout.php">Logout</a></li>
                </ul>
             </div>
            </li>
            <?php 
            }else {
            ?>
            <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
            </li> 
            <?php  
            }
            ?>
        </ul>
        </div>
        
    </div>
    </nav>
    <div class="container d-flex flex-column min-vh-100">

    