<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
</head>
<body>
<h1 style="text-align: center;">webboard sin</h1>
    <hr>
    <div style="text-align: center;">
    <?php 
        echo "ต้องการดูกระทู้หมายเลข $_GET[id]<br>";
    ?>
    </div><br>
    <form>
        <table style="border: 2px solid black; width: 40%;" align="center">
            <tr><td colspan = "2" style="background-color: #6cd2fe;">แสดงความคิดเห็น<td></tr>
            <tr><td><textarea name="message" rows="10" cols="60" ></textarea></td></tr>
            <tr><td colspan= "2" align="center"><input type="submit" value="ส่งข้อความ" ></td></tr>
        </table>
    </form>
    <br><div style="text-align: center;"> 
        <a href="register.html">กลับไปหน้าหลัก</a>
    </div>
</body>
</html>