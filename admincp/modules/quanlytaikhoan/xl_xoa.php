<?php
include("../../config/connect.php");

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id_khachhang = $_GET['id'];

    // Xóa tài khoản từ bảng tbl_dangky
    $sql = "DELETE FROM tbl_dangky WHERE id_khachhang = ?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("i", $id_khachhang);

    if ($stmt->execute()) {
        echo "<script>alert('Xóa tài khoản thành công!'); window.location.href = '../../index.php?view=quanlitaikhoan';</script>";
    } else {
        echo "Lỗi: " . $stmt->error;
    }

    $stmt->close();
    $connect->close();
} else {
    echo "Yêu cầu không hợp lệ.";
}
?>