<?php
    $title = "Edit";
    require_once 'includes/header.php';
    require_once 'db/conn.php';
    if(!isset($_GET['id'])){
        include 'includes/errormessage.php';
        header('location: viewrecords.php');
    }else {
        $id = $_GET['id'];
        $result = $crud->getAttendeeDetails($id);
        $result_specialty = $crud->getSpecialty();
    
?>

<div class="card login mx-auto mt-2"> 
    <div class="card-body ">
        <h1 class="display-6">Edit Profile</h1>
        <form action="editpost.php.php" method="post">
        <input type="hidden" name="id" value="<?php echo $result['id'] ?>">
            <div class="mb-3">
                <label for="firstname"  class="form-label">First Name</label>
                <input type="text" value='<?php echo $result['firstname'] ?>' name="firstname" class="form-control" id="firstname">
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Last Name</label>
                <input type="text" value='<?php echo $result['lastname'] ?>' name="lastname" class="form-control" id="lastname">
            </div>
            <div class="mb-3">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="text" value='<?php echo $result['dateofbirth'] ?>' name="dob" class="form-control" id="dob">
            </div>
            <div class="mb-3">
                <label for="specialty"  class="form-label">Specialty</label>
                <select class="form-select" name="specialty" id="specialty">
                <option value="0">Select</option>
                <?php while($r = $result_specialty->fetch(PDO::FETCH_ASSOC)) { ?>
                    <option value="<?php echo $r['specialty_id'] ?>" <?php if($r['specialty_id'] == $result['specialty_id'] ) { echo 'selected'; }?>><?php echo $r['name'] ?></option>
                <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" value='<?php echo $result['email'] ?>' name="email" class="form-control" id="email">
            </div>
            <div class="mb-3">
                <label for="contact" class="form-label">Contact Number</label>
                <input type="text" value='<?php echo $result['contact'] ?>' name="contact" class="form-control" id="contact">
            </div>
            <button type="submit" name="submit" class="btn btn-dark">Save Changes</button>
            <a href="viewrecords.php" type="submit" name="submit" class="btn btn-dark">Cancel</a>   
            <?php } ?> 
        </form>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>