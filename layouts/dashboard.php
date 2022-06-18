<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="layouts/css/style.css">
    <title>UINSU Shop</title>
</head>

<body>
    <main>
        <header>
            <h2>UINSU Shop | Dashboard</h2>
        </header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="index.php?p=kategori">Kategori</a></li>
                <li><a href="index.php?p=produk">Produk</a></li>
                <li><a href="index.php?p=order">Order</a></li>
                <li><a href="index.php?p=user">User</a></li>
                <li><a href="index.php?p=logout">Logout</a></li>
            </ul>
        </nav>

        <section>
            <?php
            if (isset($_GET['p'])) {
                include $_GET['p'] . ".php";
            } else {
                include "main_dash.php";
            }
            ?>
        </section>

        <footer>
            copyright &copy; 2022
        </footer>

    </main>
</body>

</html>