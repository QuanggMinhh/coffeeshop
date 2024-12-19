<div class="content">
<?php
        // Kiểm tra view được yêu cầu và hiển thị nội dung tương ứng
        if (isset($_GET['view'])) {
            $view = $_GET['view'];
            switch ($view) {
                case 'quanlisanpham':
                    include 'modules/quanlysanpham/quanlisanpham.php';
                    break;
                case 'quanlidanhmuc':
                    include 'modules/quanlydanhmuc/quanlidanhmuc.php';
                    break;
                case 'quanlitaikhoan':
                    include 'modules/quanlytaikhoan/quanlitaikhoan.php';
                    break;
                case 'quanlidonhang':
                    include 'modules/quanlidonhang/quanlidonhang.php';
                    break;
                case 'quanlitintuc':
                    include 'modules/quanlytintuc/quanlitintuc.php';
                    break;
                case 'thongke':
                    include 'modules/quanlythongke/thongke.php';
                    break;
                case 'xemdonhang':
                    include 'modules/quanlidonhang/xemdonhang.php';
                    break;    
                default:
                    include 'modules/quanlysanpham/quanlisanpham.php';
                    break;
            }
        } else {
            include 'modules/quanlysanpham/quanlisanpham.php';
        }
        ?>

</div>
</div>