<?php
// Create connection
$conn2 = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn2->connect_error) {
    die("Connection failed: " . $conn2->connect_error);
}
try {
    $conn2->query("CREATE TABLE products (product_name VARCHAR(255), product_price INT, product_sales INT);");

    $conn2->query("INSERT INTO products (product_name, product_price, product_sales) VALUES ('Стул', 100, '14');");
    $conn2->query("INSERT INTO products (product_name, product_price, product_sales) VALUES ('Стол', 400, '17');");
    $conn2->query("INSERT INTO products (product_name, product_price, product_sales) VALUES ('Табурет', 90, '10');");


    echo "<p>Вывод суммы товаров:</p>";
    $result2 = $conn2->query("SELECT SUM(product_price) AS totalSum FROM products;");
    while ($row2 = $result2->fetch_assoc()) {
        print "<p>" . $row2["totalSum"] . "</p>";
    }


    $result1 = $conn2->query("SELECT * FROM products WHERE product_sales=(SELECT MAX(product_sales) FROM products);");
    print "<br><p>Вывод максимальных продаж:</p><br><table><tr><th>Наименование товара</th><th>Цена</th><th>Продажи</th></tr>";
    while ($row1 = $result1->fetch_assoc()) {
        print "<tr><td>" . $row1["product_name"] . "</td><td>" . $row1["product_price"] . "</td><td>" . $row1["product_sales"] . "</td></tr>";
    }
    echo "</table><br>";


    $result3 = $conn2->query("SELECT * FROM products ORDER BY product_name ASC;");
    print "<br><p>Рассортировать в алфавитном порядке по наименованию товара:</p><br><table><tr><th>Наименование товара</th><th>Цена</th><th>Продажи</th></tr>";
    while ($row3 = $result3->fetch_assoc()) {
        print "<tr><td>" . $row3["product_name"] . "</td><td>" . $row3["product_price"] . "</td><td>" . $row3["product_sales"] . "</td></tr>";
    }
    echo "</table><br>";

    $result4 = $conn2->query("SELECT * FROM products WHERE product_sales > 10 AND product_price BETWEEN 100 AND 400;");
    print "<br><p>Вывод товаров, продажи которых больше определенного значения, а цена находится в определенном диапазоне:</p><br><table><tr><th>Наименование товара</th><th>Цена</th><th>Продажи</th></tr>";
    while ($row4 = $result4->fetch_assoc()) {
        print "<tr><td>" . $row4["product_name"] . "</td><td>" . $row4["product_price"] . "</td><td>" . $row4["product_sales"] . "</td></tr>";
    }
    echo "</table><br>";

    mysqli_close($conn2);
} catch (Exception $e) {
    $e->getMessage();
}

// DROP DATABASE products_22
