<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <?php
    error_reporting(1  );
    include ("condb.php");
    $sql='SELECT `menu_id`, `menu_name`, `menu_type`, `menu_price` FROM `menu`';
    if ($_GET['submit']){
        $sql.="WHERE menu_id LIKE '%".$_GET["keyword"]."%' or menu_name LIKE '%".$_GET["keyword"]."%' ";
        $result = $con->query($sql);
    }
    $result = $con->query($sql);

    ?>
</head>
<body>
<h1>ค้นหาข้อมูล</h1>
<h2> <a href="index.php">หนัาหลัก</a> 
<a href="add.php">เพิ่มข้อมูล</a>
<a href="search.php">ค้นหาข้อมูล</a>    
<a href="edit.php">แก้ไขข้อมูล</a>    
<a href="del.php">ลบข้อมูล</a></h2>

<form action="search.php" method="get">
    <table>
        <tr>
            <th>รหัสเมนู/ชื่อเมนู</th>
            <td><input type="text" name="keyword"></td>
            <td><input type="submit" name="submit" value="สืบค้น"></td>
        </tr>
    </table>
</form>

<table border=1 width="600px">
    <thead>
    <th>รหัสเมนู</th>
    <th>ชื่อเมนูอาหาร</th>
    <th>ประเภทอาหาร</th>
    <th>ราคา</th>
    </thead>

    <tbody>
    <?php if (mysqli_num_rows($result) > 0) { ?>
    <?php  while($row = mysqli_fetch_assoc($result)) {?>
    <tr>
        <td align='center'><?php echo $row['menu_id']?></td>
        <td><?php echo $row['menu_name']?></td>
        <td align='center'><?php echo $row['menu_type']?></td>
        <td align='right'><?php echo $row['menu_price']?> </td>
    </tr>
<?php }}else{?>

    <tr>
        <td align='center' colspan=4>--------------  No match record---------------</td>
    </tr>
    <?php }?>
    </tbody>
</table>

</body>
</html>
