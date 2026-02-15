<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Edit Special - Stolys Candy Store</title>
        <style>
            body { font-familyArial, sans-serif; max-width:500px; margin:0 auto; padding: 20px;}
            label { display:block; margin-top:1rem; font-weight:bold;}
            input, textarea{ width:100%;padding:8px;box-sizing:border-box;}
            button{background:#4caf50; color:white;padding:10px 20px;border:none; cursor:pointer;margin-top:1rem;}
            .error{color:red;}
        </style>
    </head>
    <body>
        <?php 
            require_once ('db_conn.php');  //your pdo connection
            $id = (int)($_GET['id'] ?? 0);
            if (!$id) {
                die ('No ID provided.');
            }
            if ($_POST) {
                $candy_name = trim($_POST['candy_name'] ?? '');
                $description = trim($_POS['description'] ?? '');
                $price = trim($_POST['price'] ?? '');

                if (empty($candy_name) || !is_numeric($price) || $price<0) {
                    $error = 'Invalid input.';
                }
                else{
                    try {
                        $stmt = $pdo->prepare("UPDATE specials Set candy_name=?, description=?, price=? where id=?");
                        $stmt->execute([$candy_name, $description, $price, $id]);
                        echo "<p>Updated successfully! <a href='staff_specials.php'>View all</a></p>";
                    }
                    catch (PDOException $e) {
                        $error = 'DB error: ' . $e->getMessage();
                    }
                }
            }
                //fetch current ata
                $stmt = $pdo->prepare("SELECT * FROM specials where id=?");
                $stmt->execute([$id]);
                $special = $stmt->fetch();
                if (!$special) {
                    die('Special not found.');
                }
                ?>
                <h>Edit Specials</h1>
                <?php if (isset($error)) { ?>
                <p class="error">
                <?=htmlspecialchars($error) ?> </p>
                <?php } ?>
                <form method="post">
                    <label>Candy Name:</label>
                    <input name="candy_name" value="<?=htmlspecialchars($special['candy_name']) ?>" required>
                
                    <label>Desciption:</label>
                    <textarea name="description">
                        <?= htmlspecialchars($special['description']) ?></textarea>

                        <label>Price:</label>
                        <input name="price" value="<?= $special['price'] ?>" type="number" step="0.01" min="0" required>
                        <button type="submit">Update Special</button>
                        <a href="staff_specials.php">Cancel</a>
                </form>
        </body>
</html>