<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book List</title>
</head>
<body>
    <h1>Book List</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>ISBN</th>
                <th>Penerbit</th>
                <th>Penulis</th>
                <th>Tahun Terbit</th>
                <th>Jumlah Halaman</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($books as $book): ?>
                <tr>
                    <td><?= $book->getId(); ?></td>
                    <td><?= $book->getNama(); ?></td>
                    <td><?= $book->getIsbn(); ?></td>
                    <td><?= $book->getPenerbit(); ?></td>
                    <td><?= $book->getPenulis(); ?></td>
                    <td><?= $book->getTahunTerbit(); ?></td>
                    <td><?= $book->getJumlahHalaman(); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <a href="/books/create">Add New Book</a>
</body>
</html>