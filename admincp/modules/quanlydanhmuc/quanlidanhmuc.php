<?php
if (!isset($_GET['action']) || ($_GET['action'] != 'add' && $_GET['action'] != 'edit')) {
?>


    <?php include("config/connect.php");
    $sql = "SELECT * FROM tbl_danhmuc";
    $result = $connect->query($sql);

    ?>

    <div id="quanlidanhmuc" class="table-container">
        <h3 class="text-center">Quản lí danh mục</h3>
        <a href="index.php?view=quanlidanhmuc&action=add" class="btn btn-primary mb-3">Thêm danh mục</a>
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Tên danh mục</th>
                    <th>Thứ tự</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id_danhmuc'] . "</td>";
                        echo "<td>" . $row['tendanhmuc'] . "</td>";
                        echo "<td>" . $row['thutu'] . "</td>";
                        echo "<td>
                            <div class='d-flex'>
                                <a class='btn btn-warning btn-sm' href='index.php?view=quanlidanhmuc&action=edit&id=" . $row['id_danhmuc'] . "'>Sửa</a>
                                <a class='btn btn-danger btn-sm ml-3' href='modules/quanlydanhmuc/xl_xoa.php?id=" . $row['id_danhmuc'] . "' onclick=\"return confirm('Bạn có chắc chắn muốn xóa danh mục này?')\">Xóa</a>
                            </div>
                          </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4' class='text-center'>Không có danh mục nào</td></tr>";
                }
                ?>

            </tbody>
        </table>
    </div>

<?php
}

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'add':
            include('modules/quanlydanhmuc/themdm.php');
            break;
        case 'edit':
            include('modules/quanlydanhmuc/suadm.php');
            break;
        default:
            header('Location: index.php?view=quanlidanhmuc');
            exit();
    }
}
?>