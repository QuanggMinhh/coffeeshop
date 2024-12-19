<?php
include("config/connect.php");
$sql_lietke_dh = "SELECT * FROM tbl_giohang, tbl_dangky WHERE tbl_giohang.id_khachhang = tbl_dangky.id_khachhang ORDER BY id_cart DESC";
$result_lietke_dh = mysqli_query($connect, $sql_lietke_dh);
?>

<div id="quanlidonhang" class="table-container">
    <h3 class="text-center mb-5">Quản lí đơn hàng</h3>
    <!-- <button class="btn btn-primary mb-3">Thêm đơn hàng</button> -->
    <table class="table table-striped">
        <thead class="thead-l table-dark">
            <tr>
                <td>ID</td>
                <td>Mã đơn hàng</td>
                <td>Tên khách hàng</td>
                <td>Địa chỉ</td>
                <td>Tài khoản</td>
                <td>Hình thức thanh toán</td>
                <td>Điện thoại</td>
                <td>Tinh Trạng </td>
                <td colspan="2">Quản lý </td>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            while ($row = mysqli_fetch_array($result_lietke_dh)) {
                $i++;

                echo "<tr>";
                echo "<td>" . $i . "</td>";
                echo "<td>" . $row['code_cart'] . "</td>";
                echo "<td>" . $row['hovaten'] . "</td>";
                echo "<td>" . $row['diachi'] . "</td>";
                echo "<td>" . $row['taikhoan'] . "</td>";
                echo "<td>" . $row['cart_payment'] . "</td>";
                echo "<td>" . $row['sodienthoai'] . "</td>";
                echo "<td>";
                if ($row['cart_status'] == 1) {
                    echo '<a href="modules/quanlidonhang/xuly.php?code=' . $row['code_cart'] . '">Đơn hàng mới</a>';
                } else {
                    echo 'Đã xem';
                }


                echo "<td><a href='index.php?view=xemdonhang&code=" . $row['code_cart'] . "' class='btn btn-primary'>Xem đơn hàng</a></td>";
                echo "<td><a href='modules/quanlidonhang/xl_xoa.php?iddonhang=" . $row['code_cart'] . "' class='btn btn-danger'>Hủy đơn</a></td>";
                echo "</tr>";
            }

            ?>
        </tbody>
    </table>
</div>