<?php
    $title = "Index";
    require_once 'includes/header.php';
    require_once 'db/conn.php';
    $result = $crud->getSpecialty();
?>
<h1 class="text-center mt-5 display-5">Registration for IT Conference</h1>
<div class="card login mx-auto mt-2"> 
    <div class="card-body ">
        <form action="success.php" method="post">
            <div class="mb-3">
                <label for="firstname" class="form-label">First Name</label>
                <input type="text" required name="firstname" class="form-control" id="firstname">
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Last Name</label>
                <input type="text" required name="lastname" class="form-control" id="lastname">
            </div>
            <div class="mb-3">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="text" required name="dob" class="form-control" id="dob">
            </div>
            <div class="mb-3">
                <label for="specialty" class="form-label">Specialty</label>
                <select class="form-select" name="specialty" id="specialty">
                <option value="0">Select</option>
                <?php while($r = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                    <option value="<?php echo $r['specialty_id'] ?>"><?php echo $r['name'] ?></option>
                <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" required name="email" class="form-control" id="email">
            </div>
            <div class="mb-3">
                <label for="contact" class="form-label">Contact Number</label>
                <input type="text" required name="contact" class="form-control" id="contact">
            </div>
            <button type="submit" name="submit" class="btn btn-dark btn-md btn-block">Register</button>
        </form>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>