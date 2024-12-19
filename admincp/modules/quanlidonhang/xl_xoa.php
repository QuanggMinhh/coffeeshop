<?php
include("../../config/connect.php");

// Kiểm tra xem iddonhang được gửi từ form POST hay URL GET
if (isset($_GET['iddonhang'])) {
    $iddonhang = $_GET['iddonhang'];

    // Xây dựng câu truy vấn xóa bản ghi
    $sql = "DELETE FROM tbl_giohang WHERE code_cart = ?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("s", $iddonhang);

    // Thực thi câu truy vấn
    if ($stmt->execute()) {
        // Xóa thành công, chuyển hướng về trang quản lí đơn hàng
        echo "<script>alert('Đã hủy đơn hàng thành công!'); window.location.href = '../../index.php?view=quanlidonhang';</script>";
    } else {
        // Xóa thất bại
        echo "<script>alert('Lỗi: Không thể hủy đơn hàng!'); window.location.href = '../../index.php?view=quanlidonhang';</script>";
    }

    // Đóng kết nối và statement
    $stmt->close();
    $connect->close();
} else {
    // Nếu không có iddonhang, thông báo lỗi và chuyển hướng về trang quản lí đơn hàng
    echo "<script>alert('Không có đơn hàng để hủy!'); window.location.href = '../../index.php?view=quanlidonhang';</script>";
}
?>