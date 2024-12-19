<?php

include('config/connect.php');

if (isset($_GET['id'])) {
    $id_khachhang = $_GET['id'];
    $sql = "SELECT * FROM tbl_dangky WHERE id_khachhang = ?";
    
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("i", $id_khachhang);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hovaten = $row['hovaten'];
        $taikhoan = $row['taikhoan'];
        // Mật khẩu không hiển thị trên form theo yêu cầu, chỉ cung cấp mục đích sửa đổi mật khẩu khi cần thiết
        $sodienthoai = $row['sodienthoai'];
        $email = $row['email'];
        $diachi = $row['diachi'];
        $chucvu = $row['chucvu'];
    } else {
        echo "Không tìm thấy tài khoản.";
        exit;
    }
    $stmt->close();
} else {
    echo "ID tài khoản không được cung cấp.";
    exit;
}
?>

<div id="suatk" class="table-container">
    <h3 class="text-center">Sửa tài khoản</h3>
    <form method="POST" action="modules/quanlytaikhoan/xl_sua.php" class="custom-form mx-auto" style="max-width: 600px;">
        <input type="hidden" name="id_khachhang" value="<?php echo $id_khachhang; ?>">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Họ tên</span>
            <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $hovaten; ?>" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon2">Tài khoản</span>
            <input type="text" class="form-control" id="username" name="username" value="<?php echo $taikhoan; ?>" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon3">Mật khẩu</span>
            <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu mới nếu muốn thay đổi">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon4">Số điện thoại</span>
            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $sodienthoai; ?>" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon5">Email</span>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon6">Địa chỉ</span>
            <input type="text" class="form-control" id="address" name="address" value="<?php echo $diachi; ?>" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon7">Chức vụ</span>
            <input type="text" class="form-control" id="role" name="role" value="<?php echo $chucvu; ?>" required>
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Sửa</button>
        </div>
    </form>
</div>