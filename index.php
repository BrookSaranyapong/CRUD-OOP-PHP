<?php 
    require_once("./php/crud.php");
    //  เรียกใช้ Class CRUD 
    $CRUD = new CRUD();

    //  คิวรี่ข้อมูลมาแสดงในตาราง
    $read = $CRUD->fetchData();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <?php include('./php/stylesheet.php'); ?>

        <title>ระบบ เพิ่ม/ลบ/แก้ไข</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12"> <br>
                    <h3 class="text-center">เพิ่ม/ลบ/แก้ไข(CRUD)</h3>
                    <div class="text-center"><a href="insert.php" class="text-center m-3 btn btn-success">+ เพิ่ม</a></div>
                    <table id="example" class="compact stripe cell-border p-1 display table table-striped  table-hover table-responsive table-bordered ">
                        <thead>
                            <tr>
                                <th width="5%">ลำดับ</th>
                                <th>ชื่อ</th>
                                <th>นามสกุล</th>
                                <th>อีเมลล์</th>
                                <th>เบอร์โทร</th>
                                <th>ที่อยู่</th>
                                <th>วันที่สร้าง</th>
                                <th>แก้ไข</th>
                                <th>ลบ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 0;
                                foreach($read as $row) {
                                $i++;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?= $row['firstname'];?></td>
                                <td><?= $row['lastname'];?></td>
                                <td><?= $row['email'];?></td>
                                <td><?= $row['phonenumber'];?></td>
                                <td><?= $row['address'];?></td>
                                <td><?= $row['postingdate'];?></td> 
                                <td><a href="update.php?id=<?= $row['id'];?>" class="btn btn-warning">แก้ไข</a></td>
                                <td><a href="delete.php?id=<?= $row['id'];?>" class="btn btn-danger" onclick="return confirm('Are you sure Delete?');">ลบ</a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <center>CRUD PHP PDO Object Oriented Programming</center>
        <?php include('./php/script.php'); ?>
        <!-- DataTable แบบภาษาไทย -->
        <script type="text/javascript" charset="utf-8">
                $(document).ready(function() {
                $('#example').dataTable( {
                "oLanguage": {
                "sLengthMenu": "แสดง _MENU_ เร็คคอร์ด ต่อหน้า",
                "sZeroRecords": "ไม่เจอข้อมูลที่ค้นหา",
                "sInfo": "แสดง _START_ ถึง _END_ ของ _TOTAL_ เร็คคอร์ด",
                "sInfoEmpty": "แสดง 0 ถึง 0 ของ 0 เร็คคอร์ด",
                "sInfoFiltered": "(จากเร็คคอร์ดทั้งหมด _MAX_ เร็คคอร์ด)",
                "sSearch": "ค้นหา :",
                "aaSorting" :[[0,'desc']],
                "oPaginate": {
                "sFirst":    "หน้าแรก",
                "sPrevious": "ก่อนหน้า",
                "sNext":     "ถัดไป",
                "sLast":     "หน้าสุดท้าย"
                },
                }
                } );
                } );
        </script>
    </body>
</html>