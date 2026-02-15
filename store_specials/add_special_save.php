<?php
    // === Load the database connection
    require_once ("db_conn.php");

    //=== Sanitize and validate input
    $candy_name = trim($_POST['candy_name'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $price = trim ($_POST ['price'] ?? '');

    //Simple validation
    if (empty($candy_name)) {
        echo "<h2>Error</h2><p>Please provide a dish name.</p>";
        echo "<a href='add_special.php'> <- Try again</a>";
    }

    //Keep price clean (two decimal places)
    $price = number_format($price, 2, '.', '');

    //===Insert into specials table
    try {
        $stmt = $pdo->prepare(
            "INSERT into specials (candy_name, description, price) VALUES (?,?,?)"
        );

        $stmt->execute([$candy_name, $description, $price]);

        //Redirect back to specials list so user can see the new row
        header("Location: staff_specials.php");
        exit;
    }
    catch (PDOException $e){
        echo "<h2>Error</h2><p>Failed to save special: " . $e->getMessage() . "</p>";
        echo "<a href='add_specials.php'><- Try again</a>";
    }
?>