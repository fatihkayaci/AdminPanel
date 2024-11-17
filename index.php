<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <?php
        include ('Db/dbConnection.php');
    ?>
</head>
<body>
    <form method="Post">
        <label for="UserName">User Name</label>
        <input type="text" name="userName" id="userName">
        <label for="userPass">User Password</label>
        <input type="password" name="userPass" id="userPass">
        <button type="submit" id="EnterButton">Enter</button>
    </form>

    <script>
        $(document).ready(function() {
            $('#EnterButton').click(function() {
                var userName = $('#userName').val().trim();
                var userPass = $('#userPass').val().trim();

                if (userName === '' || userPass === '') {
                    alert('Kullanıcı adı ve şifre boş olamaz.');
                    return; // Boş değerler için AJAX gönderimini iptal et
                }

                $.ajax({
                    url: 'Controller/Login.php',
                    type: 'POST',
                    data: { 
                        userName: userName,
                        userPass: userPass
                    },
                    success: function(response) {
                        response = response.trim(); // Yanıtı temizleyin
                        if (response === '0') {
                            console.log(response);
                            window.location.href = 'basarili.php'; // Başarılı sayfasına yönlendirme
                        } else {
                            console.log(response);
                            window.location.href = 'basarisiz.php'; // Başarısız sayfasına yönlendirme
                        }
                    },
                    error: function() {
                        alert('Bir hata oluştu.');
                    }
                });
            });
        });
    </script>
</body>
</html>