<?php
    $title = "Login";
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    //if data is submitted via form post request

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $uname = strtolower(trim($_POST['uname']));
        $pass = $_POST['pass'];
        $new_pasword = md5($pass.$uname);
    
        $result = $account->loginUser($uname,$new_pasword);
        if(!$result){
            echo '<div class="alert alert-danger mt-3"> Invalid Username or Password! </div>';
        }else {
            $_SESSION['username'] = $uname;
            $_SESSION['user_id'] = $result['id'];
            header("location: viewrecords.php");
        }
    }
?>

<div class="card login mx-auto mt-3"> 
    <div class="card-body ">
        <h1 class="display-6">Login</h1>
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" method="POST">
            <div class="mb-3">
                <label for="Username" class="form-label">Username: *</label>
                <input type="text" required name="uname" class="form-control" id="Username" value="<?php if(!empty($_POST['uname'])){ { echo $_POST['uname'] ;} } ?>">
                <?php if(empty($username) && $_SERVER['REQUEST_METHOD']  == 'POST'){
                    //echo $username_error;
                } ?>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password: *</label>
                <input type="password" required name="pass" class="form-control" id="password">
                
                <?php if(empty($username) && $_SERVER['REQUEST_METHOD']  == 'POST'){
                    //echo $password_error;
                } ?>
            </div>
            <button type="submit" name="submit" class="btn btn-dark btn-md btn-block">Login</button>
        </form>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>