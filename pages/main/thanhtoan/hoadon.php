<!-- Tesst TT -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hóa Đơn</title>
    <link rel="stylesheet" href="/BanCaPhe/assets/vendor/bootstrap-icons/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/BanCaPhe/assets/vendor/bootstrap/css/bootstrap.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #131417;
        }

        .ticket {
            margin: auto;
            width: 900px;
        }
    </style>
</head>

<body>


    <?php
    session_start();
    include('../../../admincp/config/connect.php');
    $id_dangky = $_SESSION['id_khachhang'];
    $sql_get_vanchuyen = mysqli_query($connect, "SELECT * FROM tbl_dangky WHERE id_khachhang='$id_dangky' LIMIT 1");


    if ($id_dangky != '') {
        $row_get_vanchuyen = mysqli_fetch_array($sql_get_vanchuyen);
        $name = $row_get_vanchuyen['hovaten'];
        $phone = $row_get_vanchuyen['sodienthoai'];
        $address = $row_get_vanchuyen['diachi'];
        $note = $row_get_vanchuyen['email'];
    } else {

        $name = '';
        $phone = '';
        $address = '';
        $note = '';
    }
    ?>
    <form action="thanhtoan.php" method="post">
        <div class="container">
            <div class="row text-white my-3">
                <h1 align="center">Hóa Đơn Mua Hàng</h1>
            </div>

            <div class="d-flex justify-content-center my-3">
                <a class="btn btn-primary mx-3 btn-goback"><i class="bi bi-reply"></i> Quay lại</a>
                <button type="submit" name="redirect" class="btn btn-primary mx-3"><i class="bi bi-house"></i> Trang chủ</button>
                <a class="btn btn-primary mx-3 ticket-dowload"><i class="bi bi-download"></i> Tải ảnh xuống</a>
                <a class="btn btn-primary mx-3 ticket-pdf"><i class="bi bi-filetype-pdf"></i> Xuất PDF</a>
            </div>

            <div class="row mb-5">
                <div class="ticket bg-white p-5" id="ticket">
                    <div class="row d-flex justify-content-between">
                        <div class="col-6">
                            <span class="me-2"><b>Coffee Shop: Nhóm 7</b></span>

                        </div>
                        <!-- <div class="col-3 d-flex justify-content-center">
                            <span class="me-2"><b>Mã phiếu:</b></span>
                           
                        </div> -->
                    </div>
                    <div class="row p-4 mb-4">
                        <h2 align="center">HÓA ĐƠN THANH TOÁN</h2>
                    </div>
                    <div class="row">
                        <div class="col-3"><b>Tên khách hàng:</b></div>
                        <div class="col-9"><?php echo $name ?></div>
                    </div>
                    <div class="row">
                        <div class="col-3"><b>Số điện thoại:</b></div>
                        <div class="col-9"><?php echo $phone ?></div>
                    </div>
                    <div class="row">
                        <div class="col-3"><b>Email:</b></div>
                        <div class="col-9"><?php echo $note ?></div>
                    </div>
                    <div class="row">
                        <div class="col-3"><b>Địa chỉ:</b></div>
                        <div class="col-9"><?php echo $address ?></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-3 fw-bold">Chi tiết</div>
                        <div class="col-12">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên sản phẩm</th>
                                        <!-- <th>Danh mục</th> -->
                                        <th>Hình ảnh</th>
                                        <th>Số lượng</th>
                                        <th>Đơn giá</th>
                                        <th>Thành tiền</th>
                                    </tr>
                                </thead>

                                <tbody>
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
                                                <td><?php echo $cart_item['id'] ?></td>
                                                <td>
                                                    <?php echo $cart_item['tensanpham'] ?>
                                                </td>
                                                <!-- <td>

                                                </td> -->
                                                <td>
                                                    <span class="d-flex justify-content-end"><img src="../../../admincp/modules/quanlysanpham/uploads/<?php echo $cart_item['hinhanh'] ?>" width="150px"></span>
                                                </td>
                                                <td><a href="pages/main/giohang/suasoluong.php?cong=<?php echo $cart_item['id'] ?>"><i class="fa-solid fa-plus"></i></a>
                                                    <?php echo $cart_item['soluong'] ?>
                                                    <a href="pages/main/giohang/suasoluong.php?tru=<?php echo $cart_item['id'] ?>"><i class="fa-solid fa-minus"></i></a>
                                                </td>
                                                <td><span class="d-flex justify-content-end"><?php echo number_format($cart_item['giasanpham'], 0, ',', '.') . ' VNĐ' ?></span></td>
                                                <?php
                                                // $diff = getDateDiff($bill->getBill_start_date(), $bill->getBill_end_date());
                                                // $total = $diff * $room->getRoom_price() * $bill->getBill_number_room();
                                                ?>
                                                <td><span class="d-flex justify-content-end"><?php echo number_format($thanhtien, 0, ',', '.') . ' VNĐ' ?></span></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                        <tr>
                                            <td colspan="5"><span class="d-flex justify-content-end"><b>Tổng:</b></span></td>
                                            <td><span class="d-flex justify-content-end"><b><?php echo number_format($tongtien, 0, ',', '.') . ' VNĐ'  ?></b></span></td>
                                        </tr>
                                </tbody>
                            <?php
                                    } else {
                            ?>
                                <tr>
                                    <td colspan="6">Không có sản phẩm nào</td>
                                </tr>
                            <?php
                                    }
                            ?>
                            </table>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 fw-bold">Ghi chú:</div>
                        <div class="col-12"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-3"><b>Thanh toán:</b></div>
                        <div class="col-9"></div>
                    </div>
                    <div class="row my-5 d-flex justify-content-between">
                        <div class="col-5">
                            <div class="d-flex justify-content-center mb-2"><b>Nhân viên xác nhận</b></div>
                            <div class="d-flex justify-content-center">Quang Minh</div>
                        </div>
                        <div class="col-5">
                            <div class="d-flex justify-content-center mb-2"><b>Khách hàng</b></div>
                            <div class="d-flex justify-content-center"><?php echo $name ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script src="/BanCaPhe/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/BanCaPhe/assets/vendor/html2canvas/html2canvas.min.js"></script>
    <script src="/BanCaPhe/assets/vendor/html2pdf/node_modules/html2pdf.js/dist/html2pdf.bundle.min.js"></script>
    <script>
        document.querySelector(".ticket-dowload").addEventListener("click", () => {
            const target = document.getElementById("ticket");

            html2canvas(target).then((canvas) => {
                const base64image = canvas.toDataURL("image/png");
                let anchor = document.createElement("a");
                anchor.setAttribute("href", base64image);
                anchor.setAttribute("download", "Hoa_don_mua_hang_cua_<?php echo $name ?>.png");
                anchor.click();
                anchor.remove();
            });
        });

        document.querySelector(".ticket-pdf").addEventListener("click", () => {
            const target = document.getElementById("ticket");

            var opt = {
                margin: 0.5,
                filename: 'Hoa_don_mua_hang_cua_<?php echo $name ?>.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 2,
                    width: 920
                },
                jsPDF: {
                    unit: 'in',
                    format: 'A4',
                    orientation: 'portrait'
                }
            };

            var worker = html2pdf().from(target).set(opt).toPdf().get("pdf").then((pdf) => {
                window.open(pdf.output('bloburl'), '_blank');
            });
        });

        document.querySelector(".btn-goback").addEventListener("click", () => {
            window.history.back();
        });
    </script>
</body>

</html>