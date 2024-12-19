<?php
if (!isset($_GET['action']) || ($_GET['action'] != 'add' && $_GET['action'] != 'edit')) {
?>


<?php  include("config/connect.php");
    $sql = "SELECT * FROM tbl_dangky";
    $result = $connect->query($sql);

?>

<div id="quanlitaikhoan" class="table-container">
    <h3 class="text-center">Quản lí tài khoản</h3>
    <a href="index.php?view=quanlitaikhoan&action=add" class="btn btn-primary mb-3">Thêm tài khoản</a>
    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Họ tên</th>
                <th>Tài khoản</th>
                <th>Mật khẩu</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>Chức vụ</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
        <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id_khachhang'] . "</td>";
                    echo "<td>" . $row['hovaten'] . "</td>";
                    echo "<td>" . $row['taikhoan'] . "</td>";
                    echo "<td>" . $row['matkhau'] . "</td>";
                    echo "<td>" . $row['sodienthoai'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['diachi'] . "</td>";
                    echo "<td>" . $row['chucvu'] . "</td>";
                    echo "<td>
                            <div class='d-flex'>
                                <a class='btn btn-warning btn-sm' href='index.php?view=quanlitaikhoan&action=edit&id=" . $row['id_khachhang'] . "'>Sửa</a>
                                 <a class='btn btn-danger btn-sm ml-3' href='modules/quanlytaikhoan/xl_xoa.php?id=" . $row['id_khachhang'] . "' onclick=\"return confirm('Bạn có chắc chắn muốn xóa tài khoản này?')\">Xóa</a>
                            </div>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='9' class='text-center'>Không có tài khoản nào</td></tr>";
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
            include('modules/quanlytaikhoan/themtk.php');
            break;
        case 'edit':
            include('modules/quanlytaikhoan/suatk.php');
            break;
        default:
            header('Location: index.php?view=quanlitaikhoan');
            exit();
    }
}
?>