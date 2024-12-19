<?php
include("../../config/connect.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_sanpham = $_POST['id_sanpham'];
    $tensanpham = $_POST['tensp'];
    $masanpham = $_POST['masp'];
    $giasanpham = $_POST['gia'];
    $soluong = $_POST['soLuong'];
    //xử lý hình anh
    $file = $_FILES['anhsp'];
    $hinhanh = $file['name'];
    $hinhanh_tmp = $_FILES['anhsp']['tmp_name'];
    $hinhanhgio = time() . '_' . $hinhanh;
    $tomtat = $_POST['mota'];
    $noidung = $_POST['product-content'];
    $danhmuc = $_POST['category-id'];

    // Check if a new file has been uploaded
    if ($hinhanh != '') {
        move_uploaded_file($hinhanh_tmp, 'uploads/' . $hinhanh);
        $sql_sua = "UPDATE tbl_sanpham SET tensanpham='" . $tensanpham . "',masanpham='" . $masanpham . "',
            giasanpham='" . $giasanpham . "',soluong='" . $soluong . "',hinhanh='" . $hinhanh . "',
            tomtat='" . $tomtat . "',noidung='" . $noidung . "',trangthai='1',id_danhmuc='" . $danhmuc . "' WHERE id_sanpham='$id_sanpham'";

        $sql = "SELECT*FROM tbl_sanpham WHERE id_sanpham='$_GET[idsanpham]' LIMIT 1";
        $query = mysqli_query($connect, $sql);
        while ($row = mysqli_fetch_array($query)) {
            unlink('uploads/' . $row['hinhanh']);
        }
    } else {
        $sql_sua = "UPDATE tbl_sanpham SET tensanpham='" . $tensanpham . "',masanpham='" . $masanpham . "',
            giasanpham='" . $giasanpham . "',soluong='" . $soluong . "',tomtat='" . $tomtat . "',
            noidung='" . $noidung . "',trangthai='1',id_danhmuc='" . $danhmuc . "' WHERE id_sanpham='$id_sanpham'";
    }
    mysqli_query($connect, $sql_sua);
    header('Location:../../index.php?action=quanlysanpham&query=them');
}
