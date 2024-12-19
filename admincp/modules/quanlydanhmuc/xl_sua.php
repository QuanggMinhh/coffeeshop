<?php
include("../../config/connect.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_danhmuc = $_POST['id_danhmuc'];
    $tendanhmuc = $_POST['tendanhmuc'];
    $thutu = $_POST['thutu'];

    // Cập nhật thông tin danh mục
    $sql = "UPDATE tbl_danhmuc SET tendanhmuc = '$tendanhmuc', thutu = $thutu WHERE id_danhmuc = $id_danhmuc";

    if ($connect->query($sql) === TRUE) {
        echo "<script>alert('Sửa danh mục thành công!'); window.location.href = '../../index.php?view=quanlidanhmuc';</script>";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $connect->error;
    }
    
    

    $connect->close();
} else {
    echo "Yêu cầu không hợp lệ.";
}
?>