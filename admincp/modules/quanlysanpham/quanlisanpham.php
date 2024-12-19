<?php include("config/connect.php");
$sql = "SELECT * FROM tbl_sanpham";
$result = $connect->query($sql);

?>
<?php if (!isset($_GET['action']) || $_GET['action'] != 'add' && $_GET['action'] != 'fix') { ?>

    <div id="quanlisanpham" class="table-container">
        <h3 class="text-center">Quản lí sản phẩm</h3>
        <a href="index.php?view=quanlisanpham&action=add" class="btn btn-primary mb-3">Thêm sản phẩm</a>
        <table class="table table-striped">
            <thead class="thead-l table-dark">
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Ảnh</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Mô tả</th>
                    <th>Nội dung</th>
                    <th>Mã Danh mục</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id_sanpham'] . "</td>";
                        echo "<td>" . $row['tensanpham'] . "</td>";
                        echo "<td><img src='modules/quanlysanpham/uploads/" . $row['hinhanh'] . "' alt='Hình ảnh sản phẩm' style='width: 50px; height: auto;'></td>";
                        echo "<td>" . $row['giasanpham'] . " VND</td>";
                        echo "<td>" . $row['soluong'] . "</td>";
                        echo "<td>" . $row['tomtat'] . "</td>";
                        echo "<td>" . $row['noidung'] . "</td>";
                        echo "<td>" . $row['id_danhmuc'] . "</td>";
                        echo "<td>
                                <div class='d-flex'>
                                    <a class='btn btn-warning btn-sm' href='index.php?view=quanlisanpham&action=fix&id=" . $row['id_sanpham'] . "'>Sửa</a>
                                    <a class='btn btn-danger btn-sm ml-3' href='modules/quanlysanpham/xl_xoa.php?id=" . $row['id_sanpham'] . "' onclick=\"return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')\">Xóa</a>
                                </div>
                            </td>";

                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='9' class='text-center'>Không có sản phẩm nào</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

<?php

} elseif (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'add':
            include('modules/quanlysanpham/themsp.php');
            break;
        case 'fix':
            include('modules/quanlysanpham/suasp.php');
            break;
        default:
            header('Location: modules/quanlysanpham/quanlisanpham.php');
            break;
    }
} else {
    header('Location: modules/quanlysanpham/quanlisanpham.php');
}

?>