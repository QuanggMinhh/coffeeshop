<?php
include("../../config/connect.php");

if (isset($_GET['id'])) {
    $id_danhmuc = $_GET['id'];

    // Kiểm tra nếu danh mục tồn tại
    $sql_check = "SELECT * FROM tbl_danhmuc WHERE id_danhmuc = $id_danhmuc";
    $result_check = $connect->query($sql_check);

    if ($result_check->num_rows > 0) {
        // Xóa danh mục
        $sql_delete = "DELETE FROM tbl_danhmuc WHERE id_danhmuc = $id_danhmuc";

        if ($connect->query($sql_delete) === TRUE) {
            echo "<script>alert('Xóa danh mục thành công!'); window.location.href = '../../index.php?view=quanlidanhmuc';</script>";
        } else {
            echo "Lỗi: " . $connect->error;
        }
    } else {
        echo "<script>alert('Danh mục không tồn tại!'); window.location.href = '../../index.php?view=quanlidanhmuc';</script>";
    }
} else {
    echo "<script>alert('ID danh mục không được cung cấp!'); window.location.href = '../../index.php?view=quanlidanhmuc';</script>";
}

$connect->close();
?>