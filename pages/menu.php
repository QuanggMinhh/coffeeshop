<?php
$sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
$query_danhmuc = mysqli_query($connect, $sql_danhmuc);
?>
<?php
if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
    unset($_SESSION['dangky']);
}
?>
<div class="menu" style="background-color: rgb(186, 52, 3); color: black">
    <div class="menu_list">
        <ul class="menu_list-left" style="background-color: rgb(186, 52, 3); color: black">
            <li> <a href="index.php" class="logo">
                    <img style="width:55px" height="55px" src="image/logo2.png" alt="">
                </a></li>
            <li><i class="fa-solid fa-house"></i> <a style="background-color: rgb(186, 52, 3); color: black; font-weight: bold;" href="index.php">Home</a></li>
            <li><i class="fa-solid fa-address-book"></i> <a style="background-color: rgb(186, 52, 3); color: black; font-weight: bold;" href="index.php?quanly=contact">Liên hệ </a></li>
            <li><i class="fa-solid fa-newspaper"></i> <a style="background-color: rgb(186, 52, 3); color: black; font-weight: bold;" href="index.php?quanly=blog">Tin tức</a></li>
            <li><i class="fa-solid fa-cart-shopping"></i> <a style="background-color: rgb(186, 52, 3); color: black; font-weight: bold;" href="index.php?quanly=giohang">Giỏ hàng</a></li>
            <li><i class="fa-solid fa-list"></i> <a style="background-color: rgb(186, 52, 3); color: black; font-weight: bold;" href="">Danh mục</a>
                <ul class="menu_danhmuc">
                    <?php
                    while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {

                    ?>
                        <li> <a href="index.php?quanly=danhmuclist&id=<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></a></li>

                    <?php
                    }

                    ?>
                </ul>
            </li>
            <li>
                <Form method="POST" action="index.php?quanly=timkiem">
                    <input style="border-radius: 5px; border: none;" type="text" class="menu-input-text" placeholder="Tìm kiếm....." name="tukhoa">
                    <input style="background-color: gray; border:none; border-radius: 5px;" type="submit" class="menu-input-submit" name="timkiem" value="Tìm Kiếm">
                </Form>
            </li>
        </ul>
        <ul class="menu_list-right">
            <?php
            if (isset($_SESSION['dangky'])) {
            ?>

                <li><i class="fa-solid fa-user"></i> <a href="index.php?quanly=thongtin"> Thông tin</a></li>
                <li><i class="fa-solid fa-right-to-bracket"></i> <a href="index.php?dangxuat=1">Đăng xuất</a></li>
            <?php
            } else {
            ?>
                <li><i class="fa-solid fa-user"></i> <a href="index.php?quanly=dangnhap">Đăng nhập</a></li>
                <li><i class="fa-solid fa-right-to-bracket"></i> <a href="index.php?quanly=dangky">Đăng ký</a></li>
            <?php
            }
            ?>
        </ul>
    </div>
</div>