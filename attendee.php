<?php
    $title = "Attendee";
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    $results = $crud->getAttendees();
?>

<div class="row mt-3">
        <?php
            while($r = $results->fetch(PDO::FETCH_ASSOC)){
        ?>
    <div class="col-sm-3 mb-2">
        <div class="card attendee">
             <img class="card-img-top" src="<?php if(empty($r['avatar_path'])){ echo "images/defaul-profile.png";}else { echo $r['avatar_path'];} ?>" alt="Card image">
        <div class="card-body">
            <h5 class="card-title"><?php echo $r['firstname'] . " " . $r['lastname']; ?></h5>
            <p>
                Specialty: <?php echo $r['name']; ?> <br>
            </p>
            <a href="view.php?id=<?php echo $r['id']; ?>" class="btn btn-dark">View Info</a>
        </div>
        </div>
    </div>
    <?php } ?>
</div>


<?php require_once 'includes/footer.php'; ?>