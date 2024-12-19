<?php
include("../../config/connect.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $hovaten = $_POST['fullname'];
    $taikhoan = $_POST['username'];
    $matkhau = password_hash($_POST['password'], PASSWORD_DEFAULT); 
    $sodienthoai = $_POST['phone'];
    $email = $_POST['email'];
    $diachi = $_POST['address'];
    $chucvu = $_POST['role'];

    
    $sql = "INSERT INTO tbl_dangky (hovaten, taikhoan, matkhau, sodienthoai, email, diachi, chucvu) VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $connect->prepare($sql);
    $stmt->bind_param("sssissi", $hovaten, $taikhoan, $matkhau, $sodienthoai, $email, $diachi, $chucvu);

    if ($stmt->execute()) {
        echo "<script>alert('Thêm tài khoản thành công!'); window.location.href = '../../index.php?view=quanlitaikhoan';</script>";
    } else {
        echo "Lỗi: " . $stmt->error;
    }

    $stmt->close();
    $connect->close();
} else {
    echo "Yêu cầu không hợp lệ.";
}
?>