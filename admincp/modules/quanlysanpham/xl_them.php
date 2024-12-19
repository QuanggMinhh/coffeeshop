<?php
include("../../config/connect.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // $tensp = $_POST['tensp'];
    // $masp = $_POST['masp'];
    // $gia = $_POST['gia'];
    // $soluong = $_POST['soLuong'];
    // $mota = $_POST['mota'];
    // $noidung = $_POST['product-content'];


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



    // Ensure that the file upload array is set
    if (isset($_FILES['anhsp'])) {
        if ($file['type'] == 'image/jpeg' || $file['type'] == 'imgae/jpg' || $file['type'] == 'image/png') {

            move_uploaded_file($hinhanh_tmp, 'uploads/' . $hinhanh);

            $sql_themsp = "INSERT INTO tbl_sanpham(tensanpham,masanpham,giasanpham,soluong,hinhanh,tomtat,noidung,trangthai,id_danhmuc) 
                VALUE ('" . $tensanpham . "','" . $masanpham . "','" . $giasanpham . "','" . $soluong . "','" . $hinhanh . "','" . $tomtat . "','" . $noidung . "',1,'" . $danhmuc . "')";
            mysqli_query($connect, $sql_themsp);
            header('Location:../../index.php?action=quanlysanpham&query=them');
        } else {
            $hinhanh = '';
            header('Location:../../index.php?action=quanlysanpham&query=them');
        }
    }
}
