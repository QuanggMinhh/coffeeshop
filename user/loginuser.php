<?php
session_start();
include('../admincp/config/connect.php');
if (isset($_POST['dangnhap'])) {
  $taikhoan = $_POST['taikhoan'];
  $matkhau = md5($_POST['password']);
  $sql = "SELECT * FROM tbl_dangky ,tbl_admin WHERE tbl_dangky.taikhoan='" . $taikhoan . "' AND tbl_dangky.matkhau='" . $matkhau . "'  LIMIT 1";
  $row = mysqli_query($connect, $sql);
  $count = mysqli_num_rows($row);
  if ($count > 0) {
    $row_data = mysqli_fetch_array($row);
    $_SESSION['dangky'] = $row_data['taikhoan'];
    $_SESSION['email'] = $row_data['email'];
    $_SESSION['id_khachhang'] = $row_data['id_khachhang'];
    header("Location:../index.php");
  } elseif ($taikhoan == 'admin') {
    header("Location:../admincp/login.php");
  } else {
    $message = "Tài khoản mật khẩu không đúng";
    echo "<script type='text/javascript'>alert('$message');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style_login.css">
  <link href="css/all.min.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Đăng nhập</title>
  <!-- <style>
    img {
      width: 100%;
    }

    .login {
      height: 1000px;
      width: 100%;
      background: radial-gradient(#653d84, #332042);
      position: relative;
    }

    .login_box {
      width: 1050px;
      height: 600px;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background: #fff;
      border-radius: 10px;
      box-shadow: 1px 4px 22px -8px #0004;
      display: flex;
      overflow: hidden;
    }

    .login_box .left {
      width: 41%;
      height: 100%;
      padding: 25px 25px;

    }

    .login_box .right {
      width: 59%;
      height: 100%
    }

    .left .top_link a {
      color: #452A5A;
      font-weight: 400;
      display: flex;
      align-items: center;
    }

    .left .top_link {
      height: 20px
    }

    .left .contact {
      display: flex;
      align-items: center;
      justify-content: center;
      align-self: center;
      height: 100%;
      width: 73%;
      margin: auto;
    }

    .left h3 {
      text-align: center;
      margin-bottom: 40px;
    }

    .left input {
      border: none;
      width: 80%;
      margin: 15px 0px;
      border-bottom: 1px solid #4f30677d;
      padding: 7px 9px;
      width: 100%;
      overflow: hidden;
      background: transparent;
      font-weight: 600;
      font-size: 14px;
    }

    .left {
      background: linear-gradient(-45deg, #dcd7e0, #fff);
    }

    .submit {
      border: none;
      padding: 15px 70px;
      border-radius: 8px;
      display: block;
      margin: auto;
      margin-top: 120px;
      background: #583672;
      color: #fff;
      font-weight: bold;
      -webkit-box-shadow: 0px 9px 15px -11px rgba(88, 54, 114, 1);
      -moz-box-shadow: 0px 9px 15px -11px rgba(88, 54, 114, 1);
      box-shadow: 0px 9px 15px -11px rgba(88, 54, 114, 1);
    }



    .right {
      background: linear-gradient(212.38deg, rgba(242, 57, 127, 0.7) 0%, rgba(175, 70, 189, 0.71) 100%), url(https://luxshopping.vn/Uploads/UserFiles/images/banner%20dong%20ho%20frederique%20constaint.png);
      color: #fff;
      position: relative;
    }

    .right .right-text {
      height: 100%;
      position: relative;
      transform: translate(0%, 45%);
    }

    .right-text h2 {
      display: block;
      width: 100%;
      text-align: center;
      font-size: 50px;
      font-weight: 500;
    }

    .right-text h5 {
      display: block;
      width: 100%;
      text-align: center;
      font-size: 19px;
      font-weight: 400;
    }

    .right .right-inductor {
      position: absolute;
      width: 70px;
      height: 7px;
      background: #fff0;
      left: 50%;
      bottom: 70px;
      transform: translate(-50%, 0%);
    }

    .top_link img {
      width: 28px;
      padding-right: 7px;
      /* margin-top: -3px; */
    }
  </style> -->
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    body {
      font-family: 'Montserrat', sans-serif;
    }

    .loginview {
      height: auto;
    }

    @media (max-width: 575.98px) {
      .loginview .col-sm-4 {
        text-align: left !important;
      }
    }

    @media (min-width: 576px) and (max-width: 767.98px) {}

    @media (min-width: 768px) and (max-width: 991.98px) {}

    @media (min-width: 992px) and (max-width: 1199.98px) {}

    @media (min-width: 1200px) and (max-width: 1399.98px) {}

    @media (min-width: 1400px) {}
  </style>
</head>

<body>

  <!-- <section class="login"> -->
  <!-- <div class="login_box">
			<div class="left">
				<div class="top_link"><a href="../index.php"><img src="https://drive.google.com/u/0/uc?id=16U__U5dJdaTfNGobB_OpwAJ73vM50rPV&export=download" alt="">Về trang chủ</a></div>
				<div class="contact">
					<form action="" method="POST">
						<h3>ĐĂNG NHẬP</h3>
						<input type="text" name="taikhoan" placeholder="USERNAME">
						<input type="password" name="password" placeholder="PASSWORD">
						<button class="submit" name="dangnhap">ĐĂNG NHẬP</button>
					</form>
				</div>
			</div>
			<div class="right">
				<div class="right-text">
					<h2>Đồng hồ LUXURY</h2>
					<h5>ĐẲNG CẤP 5 SAO</h5>
				</div>
				<div class="right-inductor"><img src="https://lh3.googleusercontent.com/fife/ABSRlIoGiXn2r0SBm7bjFHea6iCUOyY0N2SrvhNUT-orJfyGNRSMO2vfqar3R-xs5Z4xbeqYwrEMq2FXKGXm-l_H6QAlwCBk9uceKBfG-FjacfftM0WM_aoUC_oxRSXXYspQE3tCMHGvMBlb2K1NAdU6qWv3VAQAPdCo8VwTgdnyWv08CmeZ8hX_6Ty8FzetXYKnfXb0CTEFQOVF4p3R58LksVUd73FU6564OsrJt918LPEwqIPAPQ4dMgiH73sgLXnDndUDCdLSDHMSirr4uUaqbiWQq-X1SNdkh-3jzjhW4keeNt1TgQHSrzW3maYO3ryueQzYoMEhts8MP8HH5gs2NkCar9cr_guunglU7Zqaede4cLFhsCZWBLVHY4cKHgk8SzfH_0Rn3St2AQen9MaiT38L5QXsaq6zFMuGiT8M2Md50eS0JdRTdlWLJApbgAUqI3zltUXce-MaCrDtp_UiI6x3IR4fEZiCo0XDyoAesFjXZg9cIuSsLTiKkSAGzzledJU3crgSHjAIycQN2PH2_dBIa3ibAJLphqq6zLh0qiQn_dHh83ru2y7MgxRU85ithgjdIk3PgplREbW9_PLv5j9juYc1WXFNW9ML80UlTaC9D2rP3i80zESJJY56faKsA5GVCIFiUtc3EewSM_C0bkJSMiobIWiXFz7pMcadgZlweUdjBcjvaepHBe8wou0ZtDM9TKom0hs_nx_AKy0dnXGNWI1qftTjAg=w1920-h979-ft" alt=""></div>
			</div>
		</div> -->

  <div class="container-md mt-5">
    <div class="row">
      <div class="top_link"><a href="../index.php"><img src="https://drive.google.com/u/0/uc?id=16U__U5dJdaTfNGobB_OpwAJ73vM50rPV&export=download" alt="">Về trang chủ</a></div>
      <div class="col-lg-6 offset-lg-3 text-bg-light">
        <div class="loginview">
          <form action="loginuser.php" method="post">
            <div class="row text-bg" style="background-color: rgb(186, 52, 3);">
              <div class="col-12 py-3 text-center text-uppercase fw-bolder">
                <i class="fa-solid fa-users"></i> &nbsp; Login
              </div>
            </div>


            <div class="row my-3 align-items-center">
              <label for="user" class="col-sm-4 form-label text-end">Username / Email</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="user" name="taikhoan" placeholder="USERNAME" aria-describedby="help" onKeyup="checkValidLogin()">
                <div id="help" class="form-text">Bạn có thể dùng tài khoản hoặc hộp thư.</div>
                <div id="errName"></div>
              </div>
            </div>
            <div class="row mb-3 align-items-center">
              <label for="pass" class="col-sm-4 form-label text-end">Password</label>
              <div class="col-sm-6">
                <input type="password" class="form-control" name="password" placeholder="PASSWORD" id="pass">
                <div id="errPass"></div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-8 offset-sm-4">
                <input type="checkbox" class="form-check-input" id="chkSave">
                <label class="form-check-label" for="chkSave">Save this information?</label>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-12 text-center">
                <a href="#" class="text-decoration-none"><i class="fa-solid fa-lock"></i> &nbsp;Forget password?</a> &nbsp; &nbsp;|&nbsp;&nbsp;
                <a href="#" class="text-decoration-none"><i class="fa-solid fa-circle-question"></i>&nbsp; Help!</a>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-12 text-center">
                <button class="button" style="border:none; border-radius: 5px; height: 40px; width:95px; background-color: lightblue;" name="dangnhap" class="btn btn-primary"><i class="fa-solid fa-right-to-bracket"></i> Login</button>
                <button type="button" class="btn btn-warning"><i class="fa-solid fa-right-from-bracket"></i> Cancel</button>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-12 text-end">
                <a href="#" class="text-decoration-none"><i class="fa-solid fa-language"></i> Vietnamese</a>
              </div>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
  <!-- </section> -->
</body>

</html>