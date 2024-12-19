
<?php if (isset($_GET['action']) && $_GET['action'] == 'add') { ?>
<div id="themdm" class="table-container">
    <h3 class="text-center">Thêm danh mục</h3>
    <form method="POST" action="modules/quanlydanhmuc/xl_them.php" class="custom-form mx-auto" style="max-width: 600px;">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Tên danh mục</span>
            <input type="text" class="form-control" id="category-name" name="category-name" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon2">Thứ tự</span>
            <input type="number" class="form-control" id="category-order" name="category-order" required>
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Thêm</button>
        </div>
    </form>
</div>
<?php } ?>