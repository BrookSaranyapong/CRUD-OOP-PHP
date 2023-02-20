<?php 
    require_once('./php/crud.php'); 
    $CRUD = new CRUD();
    $id = $_GET['id'];
    $delete = $CRUD->DeleteData($id);
    if($delete){
        echo "<script>alert('ลบข้อมูลสำเร็จ! Deleted Successfuly');</script>";
        echo "<script>window.location.href='index.php'</script>";
    }else{
        echo "<script>alert('ลบข้อมูลผิดพลาด Deleted Error');</script>";
        echo "<script>window.location.href='index.php'</script>";
    }

?>