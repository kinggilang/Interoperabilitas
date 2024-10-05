<?php
$url = 'http://jsonplaceholder.typicode.com/posts';

// Inisialisasi cURL
$ch = curl_init();

// Set opsi cURL untuk mengambil URL dengan metode GET
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

// Cek apakah respon ada atau terjadi kesalahan
if ($response === false) {
    die('Error saat mengambil data dari API');
}

// Ubah respon dari JSON menjadi array PHP
$data = json_decode($response, true);

// Cek apakah JSON decode berhasil
if (json_last_error() !== JSON_ERROR_NONE) {
    die('Error saat memproses data JSON: ' . json_last_error_msg());
}

// Ambil 5 data pertama dari hasil API
$posts = array_slice($data, 0, 5);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Posts</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffff;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #444;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            a text-align: left;
        }

        th {
            background-color: #2c3e50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        td {
            color: #555;
        }
    </style>
</head>

<body>

<body>
    <h1>Data Dari Api</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Body</th>
            </tr>
        </thead>
        <tbody>
        <?php
        // Tampilkan 5 data pertama
        if (!empty($posts)) {
            foreach ($posts as $post) {
                echo "<tr>";
                echo "<td>{$post['id']}</td>";
                echo "<td>{$post['title']}</td>";
                echo "<td>{$post['body']}</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Tidak ada data tersedia</td></tr>";
        }
        ?>

        </tbody>
    </table>

</body>
</html>

</body>