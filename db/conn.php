<?php
    $server="localhost";
    $username = "root";
    $pasword= "";
    $dbname = "attendance_db";
    $charset = 'utf8mb4';

    // $server="remotemysql.com";
    // $username = "QZJ0zMiIOB";
    // $pasword= "fXZZoJC7Hp";
    // $dbname = "QZJ0zMiIOB";
    // $charset = 'utf8mb4';

    //Data source name
    $dsn = "mysql:host=$server;dbname=$dbname;charset=$charset";

    // try{
    //     $pdo = new PDO($dsn, $username, $pasword);
    //     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // } catch(PDOException $e){
    //     echo "Database Connection Failed: " . $e->getMessage();
    // }

    try {
        $conn = new PDO($dsn, $username, $pasword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {
        //kapag throw stop yung pag run ng program at ishow ang message
        throw new PDOException($e->getMessage());
        //echo "<h1>No Database Found</h1>";
    }
    require_once 'crud.php';
    require_once 'user.php';

    $account = new User($conn);
    $crud = new crud($conn);

    $account->creaeteUser("zreon","123");
?>
