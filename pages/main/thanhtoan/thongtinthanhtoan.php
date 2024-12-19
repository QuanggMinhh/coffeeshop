<style>
	.container {
		margin-left: 350px;
	}
</style>

<div class="container">
	<p>Thông tin thanh toán</p>
	<?php
	if (isset($_SESSION['id_khachhang'])) {
	?>
		<div class="arrow-steps clearfix">
			<div class="step "> <span> <a href="../../../index.php?quanly=giohang">Giỏ hàng</a></span> </div>
			<div class="step"> <span><a href="index.php?quanly=vanchuyen">Kiểm tra</a></span> </div>
			<div class="step current"> <span><a href="index.php?quanly=thongtinthanhtoan">Thanh toán</a><span> </div>

		</div>
	<?php
	}
	?>

	<div class="row">
		<h5>Giỏ hàng của bạn</h5>
		<table style="width:100%; text-align: center; border-collapse: collapse;" border="1">
			<tr>
				<th>ID</th>
				<th>Mã :</th>
				<th>Tên</th>
				<th>Hình</th>
				<th>Số lượng</th>
				<th>Giá :</th>
				<th>Thành tiền</th>
			</tr>
			<?php
			if (isset($_SESSION['cart'])) {
				$i = 0;
				$tongtien = 0;
				foreach ($_SESSION['cart'] as $cart_item) {
					$thanhtien = $cart_item['soluong'] * $cart_item['giasanpham'];
					$tongtien += $thanhtien;
					$i++;
			?>
					<tr>
						<td><?php echo $i ?></td>
						<!-- ở đây lấy dữ liêu cart_item['masp'] từ themgiohang.php -->
						<td><?php echo $cart_item['masp'] ?></td>
						<td><?php echo $cart_item['tensanpham'] ?></td>
						<td><img src="../../../admincp/modules/quanlysanpham/uploads/<?php echo $cart_item['hinhanh'] ?>" width="150px"></td>

						<td>
							<a href="pages/main/giohang/suasoluong.php?cong=<?php echo $cart_item['id'] ?>"><i class="fa-solid fa-plus"></i></a>
							<?php echo $cart_item['soluong'] ?>
							<a href="pages/main/giohang/suasoluong.php?tru=<?php echo $cart_item['id'] ?>"><i class="fa-solid fa-minus"></i></a>
						</td>

						<td><?php echo number_format($cart_item['giasanpham'], 0, ',', '.') . ' VNĐ' ?></td>
						<td><?php echo number_format($thanhtien, 0, ',', '.') . ' VNĐ' ?></td>
						<td><a href="pages/main/giohang/xoasanpham.php?xoa=<?php echo $cart_item['id'] ?>" class="btn btn-success">XÓA</a></td>
					</tr>


				<?php
				}
				?>

				<tr>
					<td colspan="8">
						<p style="float: left text-align: center;" class="btn btn-success"> Tổng tiền : <?php echo number_format($tongtien, 0, ',', '.') . ' VNĐ'  ?></p>
						<p style="float: right;"><a href="pages/main/giohang/xoahetgiohang.php?xoatatca=xoahet" class="btn btn-success">Xóa Tất Cả</a></p>
						<div style="clear:both;"> </div>
					</td>
				</tr>
			<?php
			} else {
			?>
				<tr>
					<td colspan="8">
						<p>Hiện tại giỏ hàng trống</p>
					</td>

				</tr>
			<?php
			}
			?>

		</table>
	</div>
	<style type="text/css">
		.col-md-4.hinhthucthanhtoan .form-check {
			margin: 11px;
		}
	</style>

	<div class="col-md-4 hinhthucthanhtoan">
		<h4>Phương thức thanh toán</h4>
		<div class="form-check">
			<input class="form-check-input" type="radio" name="payment" id="exampleRadios1" value="Tiền Mặt">
			<label class="form-check-label" for="exampleRadios1">
				Tiền mặt
			</label>
		</div>
		<!-- <div class="form-check">
				<input class="form-check-input" type="radio" name="payment" id="exampleRadios2" value="Chuyển Khoản">
				<label class="form-check-label" for="exampleRadios2">
					Chuyển khoản
				</label>
			</div> -->
		<div>
			<form method="POST" target="_blank" enctype="application/x-www-form-urlencoded" action="xulythanhtoanqr.php">
				<input style="display:none; height: 40px; width: 200px; background-color: rgb(186, 52, 3); border-radius: 5px; border: none; color: white; margin-left: 15px;" type="submit" name="momo" id="momo" value="Thanh toán QR MOMO">
			</form>
		</div>
		<div>
			<form method="POST" target="_blank" enctype="application/x-www-form-urlencoded" action="xulythanhtoanmomo_atm.php">
				<?php
				if (isset($_SESSION['cart'])) {
					$i = 0;
					$tongtien = 0;
					foreach ($_SESSION['cart'] as $cart_item) {
						$thanhtien = $cart_item['soluong'] * $cart_item['giasanpham'];
						$tongtien += $thanhtien;
						$i++;
					}
				}
				?><input name="tongtien" style="float: left text-align: center; display:none;" class="btn btn-success" value="<?php echo $tongtien ?>">
				<input style="height: 40px; width: 200px; background-color: rgb(186, 52, 3); border-radius: 5px; border: none; color: white; margin-left: 15px;" type="submit" name="momo" id="momo" value="Thanh toán qua MOMO ATM">
			</form>
		</div>
		<div>
			<form method="POST" target="_blank" enctype="application/x-www-form-urlencoded" action="onepay.php">
				<input style="height: 40px; width: 200px; background-color: rgb(186, 52, 3); border-radius: 5px; border: none; color: white; margin-left: 15px;" type="submit" name="onepay" id="onepay" value="Thanh toán qua ONEPAY">
			</form>
		</div>
		<form action="hoadon.php" method="POST">
			<input type="submit" value="Thanh toán ngay" src="redirect" class="btn btn-danger">
		</form>
		<!-- <script>
				let findSelected = () => {
					// let radBut = document.querySelector("input[name='payment']:checked").value;
					// console.log(radBut);
					let rs = document.getElementById('exampleRadios1').checkVisibility;
					console.log(rs);
				}
			</script> -->



		<p></p>

		<?php
		$tongtien = 0;
		foreach ($_SESSION['cart'] as $key => $value) {
			$thanhtien = $value['soluong'] * $value['giasanpham'];
			$tongtien += $thanhtien;
		}
		$tongtien_vnd = $tongtien;
		$tongtien_usd = round($tongtien / 22667);
		?>
		<input type="hidden" name="" value="<?php echo $tongtien_usd ?>" id="tongtien">


	</div>

</div>
<?php


?>