<?php

require_once 'db/conn.php';

    if(!isset($_GET['id'])){
        

    }else {
        $id = $_GET['id'];
        $result = $crud->deleteAttendee($id);

        if($result == true) {
            header("location: viewrecords.php?delete=success");
        }else {
            header("location: viewrecords.php?delete=failed");
        }
    }