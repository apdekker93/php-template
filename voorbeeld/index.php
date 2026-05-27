<?php
$pdo = new PDO("sqlite:shop.db");
$products = $pdo->query("SELECT * FROM products");
$rows = $products->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Shop</title>
</head>
<body>
    <h1>Products</h1>

    <?php if (!empty($rows)): ?>
        <table border="1" cellpadding="6" cellspacing="0">
            <tr>
                <?php foreach (array_keys($rows[0]) as $column): ?>
                    <th><?= htmlspecialchars($column) ?></th>
                <?php endforeach; ?>
            </tr>

            <?php foreach ($rows as $row): ?>
                <tr>
                    <?php foreach ($row as $value): ?>
                        <td><?= htmlspecialchars($value) ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>No products found.</p>
    <?php endif; ?>

    <hr>
    <a href="/adminer.php?sqlite=&username=user&db=shop.db" target="_blank">Database Admin Page</a> (Open link in new tab, dus niet in de Simple Browser van VSCode, en gebruik wachtwoord secret123)
</body>
</html>