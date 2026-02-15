<!DOCTYPE htl>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Staff Specials - Stolys Store</title>
        <style>
            body { font-family:Arial, sans-serif;}
            header {background:#5a3c21; color:#fff; padding:1rem;}
            ul.specials-list{list-style-type:none; pading0;}
            ul.specials-list li {
                margin-bottom:0.8rem;
                padding:0.5rem 0.8rem;
                background:#f9f3e8;
                border-left:4px solid #c99d5a;
            }
        </style>
    </head>
    <body>
        <header>
            <h1>Staff Specials</h1>
            <p>Our staff's favourite candies</p>
        </header>
        <div class="container">
            <!-- === PHP part : read from MySQL === -->
             <?php
             //This loads the PHP connection
             require_once ("db_conn.php");

             try {
                //fetch all specials
                $stmt = $pdo->query("SELECT id, candy_name, description, price FROM specials ORDER by created_at DESC");

                if ($stmt->rowCount() ===0) {
                    echo "<p>No staff specials have been added yet.</p>";
                }
                else {
                    echo "<ul class='specials-list'>";
                    while ($row = $stmt->fetch()) {
                        echo "<li>";
                        echo "<strong>" . 
                            htmlspecialchars($row['candy_name']) . "</strong> - \$$row[price]";
                        echo " | <a href='edit_special.php?id=" . $row['id'] . "'>Edit</a>";
                        echo " | <a href='delete_special.php?id=" . $row['id'] . "' onclick='return confirm ('Delete?')'>Delete</a>";

                        if (!empty($row['description'])) {
                            echo " - " . htmlspecialchars($row['description']);
                        }
                        echo "</li>";
                    }
                    echo "</ul>";
                }
             }
             catch (PDOException $e){
                echo "<p><strong>Database Error:</strong> " . $e->getMessage() . "</p>";
             }
             ?>
             <!-- ===END PHP HERE -->
            <p>
                <a href="index.php"> <- Back to Menu</a>
            </p>
        </div>
    </body>
</html>