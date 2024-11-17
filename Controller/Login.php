<?php
include ("../Db/dbConnection.php");

try {
    $userName = isset($_POST['userName']) ? $_POST['userName'] : '';
    $userPass = isset($_POST['userPass']) ? $_POST['userPass'] : '';

    $userSql = "SELECT * FROM tbl_user WHERE userName = :userName";
    $userStmt = $conn->prepare($userSql);
    $userStmt->bindParam(':userName', $userName);
    $userStmt->execute();

    // Eğer sorgu bir satır döndürdüyse
    if ($userStmt->rowCount() > 0) {
        $user = $userStmt->fetch(PDO::FETCH_ASSOC);

        // Şifre kontrolü
        if ($userPass === $user['userPass']) { // Eğer şifreler düz metinse
            echo '0'; // Başarılı giriş için yanıt
        } else {
            echo '1'; // Hatalı giriş için yanıt (şifre yanlış)
        }
    } else {
        echo '1'; // Hatalı giriş için yanıt (kullanıcı bulunamadı)
    }

    exit;
} catch (Exception $e) {
    // Hata mesajlarını kullanıcıya detaylı vermeyin
    echo 'Bir hata oluştu. Lütfen daha sonra tekrar deneyiniz.';
}

?>
