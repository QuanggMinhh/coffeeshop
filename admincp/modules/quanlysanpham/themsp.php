<?php
include("config/connect.php");

$sql_danhmuc = "SELECT * FROM tbl_danhmuc";
$result_danhmuc = $connect->query($sql_danhmuc);
?>

<div id="themsanpham" class="table-container">
    <h3 class="text-center">Thêm sản phẩm mới</h3>
    <form method="POST" action="modules/quanlysanpham/xl_them.php" enctype="multipart/form-data" class="custom-form mx-auto" style="max-width: 600px;">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Tên sản phẩm</span>
            <input type="text" class="form-control" id="product-name" name="tensp" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon2">Mã sản phẩm</span>
            <input type="text" class="form-control" id="product-code" name="masp" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon3">Ảnh sản phẩm</span>
            <input type="file" class="form-control" id="product-image" name="anhsp" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon4">Giá</span>
            <input type="number" class="form-control" id="product-price" name="gia" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon5">Số lượng</span>
            <input type="number" class="form-control" id="product-quantity" name="soLuong" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon6">Mô tả</span>
            <input type="text" class="form-control" id="product-description" name="mota" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon7">Nội dung</span>
            <input type="text" class="form-control" id="product-content" name="product-content" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon8">Danh mục</span>
            <select class="form-control" id="category-id" name="category-id" required>
                <?php
                if ($result_danhmuc->num_rows > 0) {
                    while ($row = $result_danhmuc->fetch_assoc()) {
                        echo "<option value='" . $row['id_danhmuc'] . "'>" . $row['tendanhmuc'] . "</option>";
                    }
                } else {
                    echo "<option value=''>Không có danh mục</option>";
                }
                ?>
            </select>
        </div>

        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Thêm</button>
        </div>
    </form>
</div>