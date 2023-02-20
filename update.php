<?php 
    require_once('./php/crud.php'); 
    // เรียกใช้ Class CRUD
    $CRUD = new CRUD();

    // รับค่าจากฟอร์ม
    $id = $_GET['id'];

    // เรียกใช้ เมธอดฟังก์ชั่นที่ว่า fetchoneRecord() ที่อยู่ในคลาส Crud
    $read = $CRUD->fetchoneRecord($id);

    //Check Update
    if(isset($_POST['update'])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $phonenumber = $_POST['phonenumber'];
        $address = $_POST['address'];
        $postingdate = date('Y-m-d H:i:s');
        $update = $crud->UpdateData($firstname,$lastname,$email,$phonenumber,$address,$postingdate,$id);

        if($update){
            echo "<script>alert('แก้ไขสำเร็จ Updated Successfuly');</script>";
            echo "<script>window.location.href='index.php'</script>";
        }else{
            echo "<script>alert('แก้ไขผิดพลาด Updated Error');</script>";
            echo "<script>window.location.href='update.php'</script>";
        }
    }
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
        <title>แก้ไข</title>
    </head>
    <body>
        <div class="container py-5">
        <i class="fa-solid fa-books-medical"></i>
            <h1 class="py-3 text-center"><i class="fa-solid fa-pen-to-square"></i> Update</h1>
            <!-- //create update form -->
            <?php foreach($read as $res){?>
                <form class="row" action="" method="post">
                    <div class="col-6 py-2 form-group">
                        <label for="firstname">ชื่อ</label>
                        <input type="text" class="form-control" name="firstname" id="firstname" value="<?= $res['firstname'] ?>" placeholder="ชื่อ">
                    </div>
                    <div class="col-6 py-2 form-group">
                        <label for="lastname">นามสกุล</label>
                        <input type="text" class="form-control" name="lastname" id="lastname" value="<?= $res['lastname'] ?>" placeholder="นามสกุล">
                    </div>
                    <div class="col-12 py-2 form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" id="email" value="<?= $res['email'] ?>" placeholder="อีเมลล์">
                    </div>
                    <div class="col-6 py-2 form-group">
                        <label for="phonenumber">เบอร์โทร</label>
                        <input type="text" class="form-control" name="phonenumber" id="phonenumber" value="<?= $res['phonenumber'] ?>" placeholder="เบอร์โทร">
                    </div>
                    <div class="col-6 py-2 form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address" id="address" value="<?= $res['address'] ?>" placeholder="ที่อยู่">
                    </div>
                    <div class="col-12 py-2 form-group">
                        <label for="postingdate">วันที่สร้าง</label>
                        <input type="text" class="form-control" name="postingdate" id="postingdate" value="<?= $res['postingdate'] ?>" disabled>
                    </div>
                    <input type="hidden" name="id">
                    <div class="py-2 form-group">
                        <button type="submit" name="update" class="float-end p-2 btn btn-primary">บันทึก</button>
                        <button formaction="index.php" type="submit" class="float-start p-2 btn btn-warning">ย้อนกลับ</button>
                    </div>
                </form>
            <?php } ?>
        </div>
        <?php include('script.php');?>
    </body>
    </html>