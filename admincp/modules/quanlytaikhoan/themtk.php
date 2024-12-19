<div id="themtk" class="table-container">
    <h3 class="text-center">Thêm tài khoản</h3>


    <form method="POST" action="modules/quanlytaikhoan/xl_them.php" class="custom-form mx-auto" style="max-width: 600px;">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Họ tên</span>
            <input type="text" class="form-control" id="fullname" name="fullname" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon2">Tài khoản</span>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon3">Mật khẩu</span>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon4">Số điện thoại</span>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon5">Email</span>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon6">Địa chỉ</span>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon7">Chức vụ</span>
            <input type="text" class="form-control" id="role" name="role" required>
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Thêm</button>
        </div>
    </form>
</div>