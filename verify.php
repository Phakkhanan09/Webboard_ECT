<?php
 session_start();
 if(isset($_SESSION['id'])){
    header("Location: index.php");
    die();
 } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify<form</title>
</head>
<body>
<h1 style="text-align: center;">Webboard KakKak</h1>
    <hr>
    
    <div style="text-align: center;">
    
<?php
    session_start();
    if (isset($_SESSION['id'])){
        header("location: index.php");
        die();
    }

$login=$_POST['login'];
$pwd=$_POST['pwd'];

$conn=new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
$sql="SELECT * FROM user where login='$login' and password=sha1('$pwd')";
$result=$conn->query($sql);
if($result->rowCount()==1){
    $data=$result->fetch(PDO::FETCH_ASSOC);

    $_SESSION['username']=$data['login'];
    $_SESSION['role']=$data['role'];
    $_SESSION['user_id']=$data['id'];
    $_SESSION['id']=session_id();
    header("location:index.php");
    
}else{
    $_SESSION['error']="error";
    header("location:login.php");
    
}
$conn=null;
?>

    
    </div>
    
</body>
</html>