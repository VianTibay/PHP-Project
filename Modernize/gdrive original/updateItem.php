

<!DOCTYPE html>
<html>
    <head>
        <title>Update Item</title>
    </head>
    <body>
        <h2>Update Item</h2>
        <form action="saveUpdateItem.php" method="post">
            <label>Item Name:</label><br>
            <input type="text" name="itemName" required><br><br>

            <label>Quantity:</label><br>
            <input type="number" name="quantity" required><br><br>

            <input type="submit" value="Submit"><br><br>
        </form>
    </body>
</html>