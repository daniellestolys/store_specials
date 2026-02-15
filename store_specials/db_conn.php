<?php 
    $host = "sql113.infinityfree.com";
    $username = "if0_41120190";
    $password = "";
    $dbname = "if0_41120190_store_db";

    //===Try to connect with PDO (modern, cleaner)
    try {
        $pdo = new PDO(
            "mysql:host=$host;dbname=$dbname;charset=utf8",
            $username,
            $password,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        );
    }
    catch(PDOException $e){
        echo "Database connection failed: " . $e->getMessage();
        exit(1);
    }
?>