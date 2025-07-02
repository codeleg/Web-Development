<?php
// Get the form data
$email = $_POST['email'];
$kullaniciAdi = $_POST['kullaniciAdi'];
$sifre = $_POST['sifre'];

// Validate the form data
if (empty($email) || empty($kullaniciAdi) || empty($sifre)) {
    echo "Please fill in all the fields";
    exit;
}

// Connect to the database
$conn = pg_connect("host=localhost port=5432 dbname=your_database user=your_username password=your_password");

if (!$conn) {
    echo "Error: Unable to connect to database";
    exit;
}

// Insert the data into the database
$query = "INSERT INTO your_table (email, kullanici_adi, sifre) VALUES ('$email', '$kullaniciAdi', '$sifre')";
$result = pg_query($conn, $query);

if (!$result) {
    echo "Error: Unable to execute query";
    exit;
}

// Close the connection
pg_close($conn);

echo "Registration successful!";
