<?php
include("../../config/connect.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tendanhmuc = $_POST['category-name'];
    $thutu = $_POST['category-order'];

    // Kiểm tra tính hợp lệ của dữ liệu
    if (empty($tendanhmuc) || empty($thutu)) {
        echo "Tên danh mục và thứ tự không được để trống.";
        exit;
    }

    // Thêm danh mục vào cơ sở dữ liệu
    $sql = "INSERT INTO tbl_danhmuc (tendanhmuc, thutu) VALUES (?, ?)";
    
    // Chuẩn bị và thực hiện câu lệnh
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("si", $tendanhmuc, $thutu);

    if ($stmt->execute()) {
        echo "<script>alert('Thêm danh mục thành công!'); window.location.href = 'index.php?view=quanlidanhmuc';</script>";
    } else {
        echo "Lỗi: " . $stmt->error;
    }

    // Đóng kết nối
    $stmt->close();
    $connect->close();
} else {
    echo "Yêu cầu không hợp lệ.";
    exit;
}
?>