<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <?php
include ('condb.php');
    $id='';
    $name='';
    $type='';
    $price='';
    if ($_GET['submit']=='สืบค้น') {
    if ($_GET["keyword"]!='') {
        $sql = 'SELECT `menu_id`, `menu_name`, `menu_type`, `menu_price` FROM `menu`';
        $sql .= "WHERE menu_id LIKE '%" . $_GET["keyword"] . "%'";
        $result = $con->query($sql);
    }
    else{
        header("location:del.php");
    }
        while($row = mysqli_fetch_assoc($result)) {
            $id=$row['menu_id'];
            $name=$row['menu_name'];
            $type=$row['menu_type'];
            $price=$row['menu_price'];
        }
    }
    if ($_GET['submit']=='ลบข้อมูล'){
        $sql='DELETE FROM `menu`';
        $sql .= "WHERE menu_id LIKE '%" . $_GET["menu_id"] . "%'";
        $result = $con->query($sql);
    }

    ?>


</head>
<body>
<h1>ลบข้อมูล</h1>
<h2> <a href="index.php">หนัาหลัก</a> 
<a href="add.php">เพิ่มข้อมูล</a>    
<a href="search.php">ค้นหาข้อมูล</a>    
<a href="edit.php">แก้ไขข้อมูล</a>    
<a href="del.php">ลบข้อมูล</a></h2>

<form action="del.php">
    <table>
        <tr>
            <th>รหัสเมนู</th>
            <td><input type="text" name="keyword"></td>
            <td><input type="submit" name="submit" value="สืบค้น"></td>
        </tr>
    </table>
</form>

<form action="del.php" method="get">
    <input type="hidden" value="<?php echo $id?>" name="menu_id" />
    <table>
        <tr>
            <th>รหัสเมนู</th>
            <td><?php echo $id?></td>
        </tr>
        <tr>
            <th>ชื่อเมนู</th>
            <td><?php echo $name?>	</td>
        </tr>
        <tr>
            <th>ประเภทอาหาร</th>
            <td>

                <?php if ($_GET['submit']=='สืบค้น') {
                    if ($type == '1') {
                        echo "อาหารคาว";
                    } elseif ($type == '2') {
                        echo "อาหารหวาน";
                    } else {
                        echo "อาหารว่าง";
                    }
                }?>
            </td>
        </tr>
        <tr>
            <th>ราคา</th>
            <td>  <?php echo $price?></td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" value="ลบข้อมูล" name='submit'> </td>
        </tr>

    </table>
</form>


</body>
</html>

