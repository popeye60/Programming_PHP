<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <?php

    error_reporting(1);

    include ("condb.php");
    $sql='select * from menu';
    $result = $con->query($sql);
    $data = array();
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        array_push($data, $row);
    }
    ?>


</head>
<body>
<h1>Main Page</h1>
<h2> <a href="add.php">เพิ่มข้อมูล</a>    <a href="search.php">ค้นหาข้อมูล</a>    <a href="edit.php">แก้ไขข้อมูล</a>    <a href="del.php">ลบข้อมูล</a></h2>
<table border=1 width="600px">
    <thead>
    <th>รหัสเมนู</th>
    <th>ชื่อเมนูอาหาร</th>
    <th>ประเภทอาหาร</th>
    <th>ราคา</th>
    </thead>
    <tbody>
    <?php foreach($data as $k => $value){?>
    <tr>
        <td align='center'><?php echo $value['menu_id']?></td>
        <td><?php echo $value['menu_name']?></td>
        <td align='center'>
            <?php echo $value['menu_type']?>
        </td>
        <td align='right'> <?php echo $value['menu_price']?> </td>
    </tr>

    </tbody>
    <?php }?>
</table>

</body>
</html>