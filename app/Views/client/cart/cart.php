<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Interface</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Add Bootstrap CSS link here -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
<div class="container mt-5">
    <div class="row">
        <div class="page-header">
            <h1>Xe đẩy hàng của quý khách</h1>
            <!--            <h1>Xe đẩy hàng của quý khách(-->
            <?php //= $data['total']['cart']['qty_total'] ?><!--)</h1>-->
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-8">
            <?php foreach ($data['cart'] as $value): extract($value); ?>
                <div class="card mb-3 p-3">
                    <div class="row no-gutters">
                        <div class="col-md-5">
                            <img style="width: 150px; margin: 0;"
                                 src="<?= BASE_URL . $path ?>"
                                 class="card-img mt-4 mb-5" alt="Cali Hotel & Apartment">
<!--                            <div style="display: flex;">-->
<!--                                <input type="checkbox" name="checkbox" class="checkbox" data-id="--><?php //= $id_cart ?><!--">-->
<!--                                <input type="hidden" name="id_cart[]" id="id_cart" value="--><?php //= $id_cart ?><!--">-->
<!---->
<!--                                <p class="card-text">1 x Căn hộ có ban công</p>-->
<!--                            </div>-->
                            <!--                            <p style="width: 400px;">20 tháng 11 năm 2023 – 21 tháng 11 năm 2023</p>-->

                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="card-title"><?= $ten_phong ?></h5>
                                <p class="card-text">Sức chứa: <?= $suc_chua ?> người</p>
                                <p id="gia" class="card-text">Giá: $<?= number_format($gia) ?> /đêm</p>
                                <input type="hidden" name="gia" value="<?= $gia ?>">

                                <!--                                <p class="card-text">9.2 Tuyệt vời 169 nhận xét</p>-->
                            </div>
                        </div>
                        <a href="<?= BASE_URL ?>CartController/deleteCart/<?= $id_cart ?>"><i style=" color: #000"
                                                                                              class="fa-solid fa-trash fa-2xl mt-5"></i></a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="col-md-4">
            <div class="ketqua">

            </div>
            <!-- Cột tổng tiền -->
            <div class="card">
                <div class="card-header">
                    Tổng tiền
                </div>
                <div class="card-body">
                    <!-- Hiển thị tổng tiền -->
                    <p>Tổng tiền: $<?= number_format($data['total']['cart']['sub_total']) ?></p>
                    <!--                    <p id="tong_tien">Tổng tiền: 0Đ</p>-->

                    <!-- Nút Checkout -->
                    <a href="<?= BASE_URL ?>CartController/checkOut" type="button" class="btn btn-success">Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Bootstrap JS scripts here -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<!--<script>-->
<!--    $(document).ready(function () {-->
<!--        $('input[name="checkbox"]').change(function () {-->
<!--            var id_cart = [];-->
<!--            $('.checkbox:checked').each(function () {-->
<!--                id_cart.push($(this).data('id'));-->
<!--            });-->
<!--            var gia = $(this).closest('.card').find('input[name="gia"]').val();-->
<!--            var checked = $(this).is(':checked')-->
<!--            var data = {-->
<!--                id_cart: id_cart,-->
<!--                gia: gia,-->
<!--                checked: checked,-->
<!--            }-->
<!--            $.ajax({-->
<!--                url: "http://localhost/duan1/CartController/updateMoney",-->
<!--                type: "POST",-->
<!--                data: data,-->
<!--                success: function (response) {-->
<!--                    $(".ketqua").html(response);-->
<!--                },-->
<!--                error: function (xhr, status, error) {-->
<!--                    console.error("AJAX error: " + status, error);-->
<!--                }-->
<!--            });-->
<!--        });-->
<!--    });-->
<!---->
<!--</script>-->
</body>

</html>