<?php
// Kết nối CSDL
include("../../config/connect.php");

// Kiểm tra xem có tham số id được gửi từ URL không
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id_sanpham = $_GET['id'];

    // Xây dựng câu truy vấn xóa sản phẩm
    $sql = "DELETE FROM tbl_sanpham WHERE id_sanpham = $id_sanpham";

    // Thực hiện truy vấn xóa
    if ($connect->query($sql) === TRUE) {
        // Nếu xóa thành công, chuyển hướng về trang quản lý sản phẩm
        header('Location: ../../index.php?view=quanlisanpham');
    } else {
        // Nếu có lỗi trong quá trình xóa
        echo "Lỗi: " . $connect->error;
    }
} else {
    // Nếu không có id được cung cấp, chuyển hướng về trang quản lý sản phẩm
    header('Location: ../../index.php?view=quanlisanpham');
}

// Đóng kết nối CSDL
$connect->close();
?>