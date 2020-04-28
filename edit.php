
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <?php
    error_reporting(1);
    include("condb.php");
    $id='';
    $name='';
    $price='';
    $type="";
    if ($_GET['submit']=='สืบค้น') {
        if ($_GET["keyword"]!=''){
            $sql = 'SELECT `menu_id`, `menu_name`, `menu_type`, `menu_price` FROM `menu`';
            $sql .= "WHERE menu_id LIKE '%" . $_GET["keyword"] . "%'";
            $result = $con->query($sql);
        }
        else{
            header("location:edit.php");
        }
        while($row = mysqli_fetch_assoc($result)) {
      $id=$row['menu_id'];
      $name=$row['menu_name'];
      $type=$row['menu_type'];
      $price=$row['menu_price'];
    }

    }
    if ($_GET['submit']=='บันทึกข้อมูล'){
        $sql="UPDATE `menu` SET `menu_id`='".$_GET["menu_id"]."',`menu_name`='".$_GET["menu_name"]."',`menu_type`='".$_GET["menu_type"]."',`menu_price`='".$_GET["menu_price"]."'";
        $sql .= "WHERE menu_id LIKE '%" . $_GET["menu_id"] . "%'";
        $result = $con->query($sql);
        header("location:index.php");
    }


    ?>


</head>
<body>
<h1>แก้ไขข้อมูล</h1>
<h2> <a href="index.php">หนัาหลัก</a> 
<a href="add.php">เพิ่มข้อมูล</a>    
<a href="search.php">ค้นหาข้อมูล</a>    
<a href="edit.php">แก้ไขข้อมูล</a>    
<a href="del.php">ลบข้อมูล</a></h2>

<form action="edit.php">
    <table>
        <tr>
            <th>รหัสเมนู</th>
            <td><input type="text" name="keyword"></td>
            <td><input type="submit" name="submit" value="สืบค้น"></td>
        </tr>
    </table>
</form>


<form action="edit.php" method="get">
    <input type="hidden" value="<?php echo $id?>" name="menu_id" />
    <table>
        <tr>
            <th>รหัสเมนู</th>
            <td><?php echo $id?></td>
        </tr>
        <tr>
            <th>ชื่อเมนู</th>
            <td><input type="text" name="menu_name" required  maxlength="50" value="<?php echo $name?>"/></td>
        </tr>
        <tr>
            <th>ประเภทอาหาร</th>
            <td>
                <select required  name="menu_type">
                   <?php if ($_GET['submit']=='สืบค้น') {?>
                    <option  value="<?php echo $type?>">
                        <?php if ($type=='1'){
                        echo "อาหารคาว";
                        }
                        elseif ($type=='2'){
                            echo "อาหารหวาน";
                        }
                        else{
                            echo "อาหารว่าง";
                        }
                        ?>



                       </option>
                   <?php } else{?>
                       <option  value="0">--โปรดเลือก--</option>
                   <?php } ?>

                    <?php if ($_GET['submit']=='สืบค้น') {?>
                       <?php if ($type=='1'){?>
                            <option  value="2">อาหารหวาน</option>
                            <option value="3">อาหารว่าง</option>
                       <?php }
                       elseif($type=='2'){?>
                           <option  value="1">อาหารคาว</option>
                           <option value="3">อาหารว่าง</option>
                        <?php }
                        elseif($type=='3'){?>
                            <option  value="1">อาหารคาว</option>-->
                            <option  value="2">อาหารหวาน</option>

                        <?php }?>

<?php }?>
                </select>
            </td>
        </tr>
        <tr>
            <th>ราคา</th>
            <td><input type="number" name="menu_price" maxlength="4" min=0 max=9999 value="<?php echo $price?>"/></td>

        </tr>

        <tr>
            <th></th>
            <td><input type="submit" value="บันทึกข้อมูล" name='submit'> <input type="reset" /> </td>
        </tr>

    </table>
</form>



</body>
</html>
