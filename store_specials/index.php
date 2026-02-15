
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <title> Stolys Store</title>
        <style>
            body{
                font-family:Arial, sans-serif;
                background: #fff3f0;
                color:#333;
                margin:0;
                padding:0;
            }
            header {
                background:#5a3c21;
                color:#fff;
                padding:1rem 0;
                text-align:center;
            }
            .container{
                max-width:900px;
                margin:0 auto;
                padding: 1rem;
            }
            .special{
                background:#f9f3e8;
                border-left:5px solid #c99d5a;
                padding:0.8rem;
                margin-bottom:1rem;
                font-size:1.1rem;
            }
        </style>
    </head>
    <body>
        <header>
            <h1> Stolys Store</h1>
            <p> All your candy needs</p>
        </header>
        <?php require_once("db_conn.php");?>
        <div class="container">
            <h2>Today's Feature</h2>
            <?php
                $stmt = $pdo->query("SELECT candy_name, price FROM specials ORDER BY RAND() limit 1");
                if ($row = $stmt->fetch()) {
                    echo "<p><strong>" . htmlspecialchars($row['candy_name']) . "</strong> - $" . $row['price'] . "</p>";
                }
                else {
                    echo "<p>No specials available today.</p>";
                }
            ?>
            
        </div>
    </body>
</html>