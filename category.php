<?php
    session_start();
    if(!isset($_SESSION['id']) || $_SESSION['role']!="a" ){
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
    <title>Category</title>
</head>
<body>
    <div class="container text-center">
        <h1 style ="text-align: center;" class = "mt-3">Webboard KakKak</h1>
        <?php include "nav.php" ?>
        <div class="row">
            <div class="col-lg-3 col-md-2 col-sm-1"></div>
            <div class="col-lg-6 col-md-8 col-sm-10 ">
            <?php
                    if(isset($_SESSION['add_cat'])){
                        if($_SESSION['add_cat']=="success"){
                            echo "<div class='alert alert-success mt-4'>เพิ่มหมวดหมู่เรียบร้อย</div>";
                        }else{
                            echo "<div class='alert alert-danger'>ไม่สามารถเพิ่มหมวดหมู่ได้</div>";
                        }
                        unset($_SESSION['add_cat']);
                    }
            ?>
                <table class="table table-striped mt-4 ms-5">
                    <tr> <th>ลำดับ</th> <th>หมวดหมู่</th> <th>จัดการ</th> </tr>
                    <?php 
                        $conn=new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
                        $sql= "SELECT * FROM category";
                        $i=0;
                        foreach($conn->query($sql) as $row){
                            $i++;
                            echo "<tr class=''> <td><div>$i</div></td> <td><div>$row[name]</div></td> 
                            <td class=''><div class='me-2 align-self-center d-inline' data-bs-toggle='modal' data-bs-target='#exampleModal1'><a
                            class='btn btn-warning btn-sm' onclick='' id='name' value='$row[name]'><i class='bi bi-pencil-fill'></i></a></div> 
                            <div class='me-2 align-self-center d-inline'> <a href=''
                            class='btn btn-danger btn-sm' onclick=''> <i class='bi bi-trash'></i> </a> </div> </td></tr>";
                            // สร้างแถวของตารางเพื่อแสดงลำดับ ชื่อหมวดหมู่ และปุ่มสำหรับจัดการ (แก้ไขและลบ)
                        
                        }
                    ?>
                </table>
            </div>
            <div class="col-lg-3 col-md-2 col-sm-1"></div>
        </div>
        <button type="button" class="btn btn-sm btn-success " data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-bookmark-plus"></i> เพิ่มหมวดหมู่</button>
    </div>
    <form action="category_save.php" method="post">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">เพิ่มหมวดหมู่</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="add_category" >ชื่อหมวดหมู่:</label>
                <input type="text" class='form-control mt-2' id="add_category" name="add_category">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
    </div>
    </form>
</body>
</html>