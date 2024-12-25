<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify<form</title>
</head>
<body>
<h1 style="text-align: center;">webboard sin</h1>
    <hr>
    <div style="text-align: center;">
    เข้าสู่ระบบด้วย <br>
    Login = <?php echo $_POST['login']; ?> <br>
    Password = <?php echo $_POST['pwd']; ?> <br>
    </div>
    <div style="text-align: center;">
    <?php 
        echo "เข้าสู่ระบบด้วย <br>";
        echo "Login = $_POST[login] <br>";
        echo "Password = $_POST[pwd] <br>";

    ?>
    </div>
</body>
</html>