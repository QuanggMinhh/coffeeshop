<?php
include("config/connect.php");

if (isset($_GET['id'])) {
    $id_sanpham = $_GET['id'];
    $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = $id_sanpham";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $tensp = $row['tensanpham'];
        $masp = $row['masanpham'];
        $gia = $row['giasanpham'];
        $soluong = $row['soluong'];
        $hinhanh = $row['hinhanh'];
        $mota = $row['tomtat'];
        $noidung = $row['noidung'];
        $id_danhmuc = $row['id_danhmuc'];
    } else {
        echo "Sản phẩm không tồn tại.";
        exit;
    }
} else {
    echo "ID sản phẩm không hợp lệ.";
    exit;
}

$sql_danhmuc = "SELECT * FROM tbl_danhmuc";
$result_danhmuc = $connect->query($sql_danhmuc);
?>

<div id="sua" class="table-container">
    <h3 class="text-center">Sửa sản phẩm</h3>
    <form method="POST" action="modules/quanlysanpham/xl_sua.php" enctype="multipart/form-data" class="custom-form mx-auto" style="max-width: 600px;">
        <input type="hidden" name="id_sanpham" value="<?php echo $id_sanpham; ?>">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Tên sản phẩm</span>
            <input type="text" class="form-control" id="product-name" name="tensp" value="<?php echo $tensp; ?>" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon2">Mã sản phẩm</span>
            <input type="text" class="form-control" id="product-code" name="masp" value="<?php echo $masp; ?>" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon3">Ảnh sản phẩm</span>
            <input type="file" class="form-control" id="product-image" name="anhsp">
            <img src="uploads/<?php echo $hinhanh; ?>" alt="Ảnh sản phẩm" style="width: 100px; height: auto;">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon4">Giá</span>
            <input type="number" class="form-control" id="product-price" name="gia" value="<?php echo $gia; ?>" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon5">Số lượng</span>
            <input type="number" class="form-control" id="product-quantity" name="soLuong" value="<?php echo $soluong; ?>" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon6">Mô tả</span>
            <input type="text" class="form-control" id="product-description" name="mota" value="<?php echo $mota; ?>" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon7">Nội dung</span>
            <input type="text" class="form-control" id="product-content" name="product-content" value="<?php echo $noidung; ?>" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon8">Danh mục</span>
            <select class="form-control" id="category-id" name="category-id" required>
                <?php
                if ($result_danhmuc->num_rows > 0) {
                    while ($row_danhmuc = $result_danhmuc->fetch_assoc()) {
                        $selected = ($row_danhmuc['id_danhmuc'] == $id_danhmuc) ? 'selected' : '';
                        echo "<option value='" . $row_danhmuc['id_danhmuc'] . "' $selected>" . $row_danhmuc['tendanhmuc'] . "</option>";
                    }
                } else {
                    echo "<option value=''>Không có danh mục</option>";
                }
                ?>
            </select>
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Sửa</button>
        </div>
    </form>
</div>