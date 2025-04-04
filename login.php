<?php
session_start();
if (isset($_SESSION['id'])) {
    header("location:index.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Login</title>

</head>

<body>
    <div class="container mt-3">
        <h1 style="text-align: center;">Webboard KakKak</h1>

        <?php include "nav.php" ?>

        <form action="Verify.php" method="post">
            <div class="row mt-4">
                <div class="col-lg-4 col-md-3 col-sm-2 col-1"></div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-10">
                    <?php
                    if (isset($_SESSION['error'])) {
                        echo "<div class='alert alert-danger'>ชื่อบัญชีหรือหัสผ่านไม่ถูกต้อง</div>";
                        unset($_SESSION['error']);
                    }
                    ?>
                    <div class="card bg-light text-dark">
                        <div class="card-header">เข้าสู่ระบบ</div>
                        <div class="card-body">
                            <form action="Verify.php" method="post">

                                <div class="form-group mt-2">
                                    <label for="login" class="form-label">Login:</label>
                                    <input type="text" name="login" id="login" class="form-control">
                                </div>

                                <div class="form-group mt-2">
                                    <label for="pwd">Password:</label>
                                    <div class="input-group">
                                        <input type="password" name="pwd" id="pwd" class="form-control">
                                        <span class="input-group-text" onclick="password_show_hide()">
                                            <i class="bi bi-eye-fill" id="show_eye"></i>
                                            <i class="bi bi-eye-slash-fill d-none" id="hide_eye"></i>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group mt-2" align="center">
                                    <input type="submit" value="Login" class="btn btn-secondary btn-sm">
                                    <input type="Reset" value="Reset" class="btn btn-danger btn-sm ms-2">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-3 col-sm-2 col-1"></div>
            </div>
        </form>
        <br>
        <div style="text-align: center;">ถ้ายังไม่ได้เป็นสมาชิก <a href="register.php">กรุณาสมัครสมาชิก</a></div>
    </div>
    <script>
        function password_show_hide() {
            let x = document.getElementById("pwd");
            let show_eye = document.getElementById("show_eye");
            let hide_eye = document.getElementById("hide_eye");
            hide_eye.classList.remove("d-none"); //เข้าถึง element hide_eye  ไปเอา d-none ออก
            if (x.type === "password") {
                x.type = "text";
                show_eye.style.display = "none";
                hide_eye.style.display = "block";
  
            } else {
                x.type = "password";
                show_eye.style.display = "block";
                hide_eye.style.display = "none";
            }
        }
    </script>
</body>

</html>