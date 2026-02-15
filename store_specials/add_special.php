<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Add Staff Special - Stolys Candy Store</title>
        <style>
            body {
                font-family:Arial, sans-serif;
            }
            form {
                max-width:500px;
                margin:0 auto;
            }
            label {
                display:block;
                margin-top:1rem;
                font-weight:bold;
            }
            input, textarea{
                width:100%;
                padding:0.5rem;
            }
            input [type="submit"] {
                margin-top:1.5rem;
                padding:0.7rem;
                background:#5a3c21;
                color:white;
                border:none;
                cursor:pointer;
            }
        </style>
    </head>
    <body>
        <h1>Add Staff Specials</h1>
        <form action="add_special_save.php" method="POST">
            
            <label for="candy_name">Candy</label>
            <input type="text" id="candy_name" name="candy_name" required>
            
            <label for="description">Description (optional)</label>
            <textarea id="description" name="description" rows="3"></textarea>
            
            <label for="price">Price</label>
            <input type="number" id="price" name="price" step="0.01" min="0" required>

            <p>
                <input type="submit" value="Add Special">
            </p>
            <p>
                <a href="staff-specials.php"><- Back to Specials</a>
            </p>
        </form>
    </body>
</html>