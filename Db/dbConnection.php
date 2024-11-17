<?php
$host = 'localhost';   //sunucu Adresi
$dbname = 'adminpanel'; //database ismi
$username = 'root'; // kullanıcının ismi
$password = ''; //veritabanı şifresi
//şuan da localde çalıştığımız için bir şifre yok 

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Bağlantı hatası: " . $e->getMessage();
}
?>
