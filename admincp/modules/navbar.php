<nav class="navbar navbar-expand-lg navbar-light coffee-bg">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="#">Coffee Shop Admin</a>
            <div class="ml-auto">
                <a class="nav-link text-light" href="index.php?dangxuat=1">
                    Đăng xuất<?php echo isset($_SESSION['dangnhap']) ? $_SESSION['dangnhap'] : ''; ?>
                </a>
            </div>
        </div>
    </nav>