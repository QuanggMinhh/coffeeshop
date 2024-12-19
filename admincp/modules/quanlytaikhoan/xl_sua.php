<?php
include("../../config/connect.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_khachhang = $_POST['id_khachhang'];
    $hovaten = $_POST['fullname'];
    $taikhoan = $_POST['username'];
    $sodienthoai = $_POST['phone'];
    $email = $_POST['email'];
    $diachi = $_POST['address'];
    $chucvu = $_POST['role'];

    // Kiểm tra mật khẩu có được thay đổi không
    if (!empty($_POST['password'])) {
        $matkhau = password_hash($_POST['password'], PASSWORD_DEFAULT); // Mã hóa mật khẩu mới
        $sql = "UPDATE tbl_dangky SET hovaten = ?, taikhoan = ?, matkhau = ?, sodienthoai = ?, email = ?, diachi = ?, chucvu = ? WHERE id_khachhang = ?";
        $stmt = $connect->prepare($sql);
        $stmt->bind_param("sssiisii", $hovaten, $taikhoan, $matkhau, $sodienthoai, $email, $diachi, $chucvu, $id_khachhang);
    } else {
        // $sql = "UPDATE tbl_dangky SET hovaten = ?, taikhoan = ?, sodienthoai = ?, email = ?, diachi = ?, chucvu = ? WHERE id_khachhang = ?";
        // $stmt = $connect->prepare($sql);
        // $stmt->bind_param("sssisii", $hovaten, $taikhoan, $sodienthoai, $email, $diachi, $chucvu, $id_khachhang);
        $sql = "UPDATE tbl_dangky SET hovaten = ?, taikhoan = ?, sodienthoai = ?, email = ?, diachi = ?, chucvu = ? WHERE id_khachhang = ?";
        $stmt = $connect->prepare($sql);
        $stmt->bind_param("ssissii", $hovaten, $taikhoan, $sodienthoai, $email, $diachi, $chucvu, $id_khachhang);
    }

    if ($stmt->execute()) {
        echo "<script>alert('Sửa tài khoản thành công!'); window.location.href = '../../index.php?view=quanlitaikhoan';</script>";
    } else {
        echo "Lỗi: " . $stmt->error;
    }

    $stmt->close();
    $connect->close();
} else {
    echo "Yêu cầu không hợp lệ.";
}
