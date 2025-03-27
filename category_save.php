<?php 
    session_start();
    $add_cate=$_POST['add_category'];
    $conn=new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
    $sql="INSERT INTO category (name) VALUES ('$add_cate') ";
    $result = $conn->exec($sql);
    if($result){
        $_SESSION['add_cat']="success";
    }
    header("location:category.php");
    $conn=null;

?>