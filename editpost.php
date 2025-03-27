
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Editpost</title>

</head>

<body>
<?php
    
// ตรวจสอบว่าผู้ใช้ล็อกอินหรือไม่
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// ตรวจสอบว่ามีการส่งค่า id หรือไม่
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$post_id = $_GET['id'];
$user_id = $_SESSION['user_id'];

// ดึงข้อมูลเจ้าของโพสต์
$conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
$sql = "SELECT user_id FROM post WHERE id = :post_id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":post_id", $post_id, PDO::PARAM_INT);
$stmt->execute();
$post = $stmt->fetch(PDO::FETCH_ASSOC);

// ถ้าโพสต์ไม่พบ หรือ ผู้ใช้ไม่ใช่เจ้าของโพสต์ ให้ Redirect ออกไป
if (!$post || $post['user_id'] != $user_id) {
    header("Location: index.php");
    exit();
}
?>

    <div class="container">
        <h1 style="text-align: center;" class="mt-3">Webboard KakKak</h1>
        <?php include "nav.php" ?>
        <div class="row mt-4">
            <div class="col-lg-3 col-md-2 col-sm-1"></div>
            <div class="col-lg-6 col-md-8 col-sm-10">
                <?php
                if (isset($_SESSION['add_edit'])) {
                    if ($_SESSION['add_edit'] == "success") {
                        echo "<div class = 'alert alert-success'>แก้ไขข้อมูลเรียบร้อยแล้ว</div>";
                    }
                }
                unset($_SESSION['add_edit']);
                ?>
                <div class="card border-warning">
                    <div class="card-header bg-warning text-white">แก้ไขกระทู้</div>
                    <div class="card-body">
                        <!--  formที่จะส่งข้อมูลเมื่อทำการแก้ไข หรือกดบันทึก -->
                    <form action="editpost_save.php" method="get"> 
                        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                            <div class="row">
                                <label class="col-lg-3 col-form-label">หมวดหมู่ :</label>
                                <div class="col-lg-9">
                                    <select name="category" class="form-select">
                                        <?php
                                        $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
                                        $sql = "SELECT * FROM post INNER JOIN category ON(post.cat_id=category.id)
                                        WHERE post.id = $_GET[id]";
                                        foreach ($conn->query($sql) as $row) {
                                            echo "<option value = $row[id]>$row[name]</option>";  // แสดงหมวดหมู่ที่เลือกไว้
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <!-- แก้ไขเนื้อหากระทู้ -->
                            <div class="row mt-3">
                                <label class="col-lg-3 col-form-label" for="topic">หัวข้อ :</label>
                                <div class="col-lg-9">
                                    <?php
                                    foreach ($conn->query($sql) as $row) {
                                        echo "<input type='text' name = 'topic' id = 'topic' class = 'form-control' value = '$row[title]' required >";
                                    }
                                    ?>
                                </div>
                            </div>

                            <!-- แก้ไขเนื้อหากระทู้ -->  
                            <div class="row mt-3"> 
                                <label class="col-lg-3 col-form-label" for="comm">เนื้อหา :</label>
                                <div class="clo-lg-9">
                                    <?php
                                    foreach ($conn->query($sql) as $row) {
                                        echo "<textarea name='comment' id = 'comm' rows='8' class = 'form-control' required>$row[content]</textarea>";
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-12 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-warning btn-sm text-white me-2">
                                        <i class="bi bi-caret-right-square"></i> บันทึกข้อความ</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-2 col-sm-1"></div>
        </div>
    </div><br>
    
</body>

</html>