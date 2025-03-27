<?php
session_start();
if (isset($_SESSION['id'])) {
    header("location:index.php");
    die();
}
?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<title>register</title>

</head>

<body>
    <script>
        function OnblurPwd() {
            let pwd1 = document.getElementById("pwd"); //การเข้าถึง element input password อันแรก
            let pwd2 = document.getElementById("pwd2");
            if (pwd.value !== pwd2.value) {
                alert("รหัสผ่านทั้งสองช่องไม่ตรงกัน");
                pwd2.value = ""; //ลบและให้เป็น สตริง ว่าง
            }
        }
    </script>
    <div class="container">
        <h1 style="text-align: center;" class="mt-3">Webboard KakKak</h1>
        <?php include "nav.php" ?>
        <div class="row mt-4">
            <div class="col-lg-6 col-md-8 col-sm-10 mx-auto">
                <?php
                if (isset($_SESSION['add_login'])) {
                    if ($_SESSION['add_login'] == "error") {
                        echo "<div class=' alert alert-danger'>
                            ชื่อบัญชีซ้ำหรือฐานข้อมูลมีปัญหา</div>";
                    } else {
                        echo "<div class='alert alert-success'>
                            เพิ่มบัญชีเรียบร้อยแล้ว</div>";
                    }
                    unset($_SESSION['add_login']);
                }
                ?>
                <div class="card border-primary">
                    <div class="card-header bg-primary text-white"> เข้าสู่ระบบ </div>
                    <div class="card-body">
                        <form action="register_save.php" method="post">
                            <div class="row">
                                <label for="user" class="col-lg-3 col-form-label">ชื่อบัญชี:</label>
                                <div class="col-lg-9">
                                    <input id="user type=" text" name="login" id="pwd" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="pwd" class="col-lg-3">รหัสผ่าน</label>
                                <div class="col-lg-9">
                                    <input id="pwd" type="text" name="pwd" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="pwd" class="col-lg-3 col-form-label">ใส่รหัสผ่านซ้ำ:</label>
                                <div class="col-lg-9">
                                    <input  id="pwd2" type="password" name="pwd2" onblur="OnblurPwd()" class="form-control" required>
                                </div>

                            </div>
                            <div class="row mt-3">
                                <label for="name" class="col-lg-3 col-form-label">ชื่อ-นามสกุล:</label>
                                <div class="col-lg-9">
                                    <input id="name" type="text" name="name" class="form-control" required>
                                </div>
                            </div>
                            <div class="row m-3">
                                <label class="col-lg-3 form-label">เพศ:</label>
                                <div class="col-lg-9">
                                    <div class="form-check">
                                        <input id="m" type="radio" name="gender" value="m" class="form-check-input" required>
                                        <label for="m" class="form-check-label">ชาย</label>
                                    </div>
                                    <div class="form-check">
                                        <input id="f" type="radio" name="gender" value="f" class="form-check-input" required>
                                        <label for="f" class="form-check-label">หญิง</label>
                                    </div>
                                    <div class="form-check">
                                        <input id="o" type="radio" name="gender" value="o" class="form-check-input" required>
                                        <label for="o" class="form-check-label">อื่นๆ</label>
                                    </div>

                                </div>
                                <div class="row mt-3">
                                    <label for="email" class="col-lg-3 col-form-label">อีเมล:</label>
                                    <div class="col-lg-9">
                                        <input id="email" type="email" name="email" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-lg-12 d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary btn-sm me-2">
                                            <i class="bi bi-save"></i>สมัครสมาชิก</button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="bi bi-x-square"></i>ยกเลิก</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
</body>

</html>