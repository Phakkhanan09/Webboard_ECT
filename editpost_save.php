<?php
    session_start();
    
    // ตรวจสอบว่าผู้ใช้ล็อกอินหรือไม่
    if (!isset($_SESSION['user_id'])) {
        header("Location: index.php");
        exit();
    }
    
    $topic = $_GET['topic'];    
    $comm = $_GET['comment'];
    $category = $_GET['category'];
    $post_id = $_GET['id'];  // รับค่า id จาก query parameter
    
    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
    
    // อัปเดตข้อมูลเฉพาะโพสต์ที่ต้องการแก้ไข
    $sql = "UPDATE post SET title = '$topic', content = '$comm', cat_id = $category WHERE id = $post_id";
    $conn->exec($sql); // สั่งให้ PDO object ทำการรันคำสั่ง SQL เพื่ออัปเดตข้อมูลในฐานข้อมูล
    
    $_SESSION['add_edit'] = "success";
    header("location: editpost.php?id=$post_id");
    
    $conn = null;
?>