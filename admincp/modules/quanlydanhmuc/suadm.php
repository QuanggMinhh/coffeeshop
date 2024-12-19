<?php
include("config/connect.php");

if (isset($_GET['id'])) {
    $id_danhmuc = $_GET['id'];
    $sql = "SELECT * FROM tbl_danhmuc WHERE id_danhmuc = $id_danhmuc";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $tendanhmuc = $row['tendanhmuc'];
        $thutu = $row['thutu'];
    } else {
        echo "Danh mục không tồn tại.";
        exit;
    }
} else {
    echo "ID danh mục không được cung cấp.";
    exit;
}
?>

<div id="suadm" class="table-container">
    <h3 class="text-center">Sửa danh mục</h3>
    <form method="POST" action="modules/quanlydanhmuc/xl_sua.php" class="custom-form mx-auto" style="max-width: 600px;">
        <input type="hidden" name="id_danhmuc" value="<?php echo $id_danhmuc; ?>">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Tên danh mục</span>
            <input type="text" class="form-control" id="category-name" name="tendanhmuc" value="<?php echo $tendanhmuc; ?>" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon2">Thứ tự</span>
            <input type="number" class="form-control" id="category-order" name="thutu" value="<?php echo $thutu; ?>" required>
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Sửa</button>
        </div>
    </form>
</div>