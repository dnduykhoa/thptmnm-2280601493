<?php include 'app/views/shares/header.php'; ?>

<div class="container my-5">
    <h1 class="fw-bold text-primary mb-4">Thanh toán</h1>

    <div class="row">
        <!-- Form Thanh toán -->
        <div class="col-lg-6">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0 fw-semibold"><i class="bi bi-credit-card me-1"></i>Thông tin thanh toán</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="/WebsiteBanHoa/Product/processCheckout" class="needs-validation" novalidate onsubmit="return validateForm();">
                        <div class="mb-3">
                            <label for="name" class="form-label"><i class="bi bi-person me-1"></i>Họ tên:</label>
                            <input type="text" id="name" name="name" class="form-control" required maxlength="100" data-toggle="tooltip" title="Nhập họ và tên (tối đa 100 ký tự)">
                            <div class="invalid-feedback">Vui lòng nhập họ tên.</div>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label"><i class="bi bi-telephone me-1"></i>Số điện thoại:</label>
                            <input type="text" id="phone" name="phone" class="form-control" required pattern="\d{10}" data-toggle="tooltip" title="Nhập số điện thoại 10 chữ số">
                            <div class="invalid-feedback">Vui lòng nhập số điện thoại 10 chữ số.</div>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label"><i class="bi bi-geo-alt me-1"></i>Địa chỉ:</label>
                            <textarea id="address" name="address" class="form-control" rows="4" required data-toggle="tooltip" title="Nhập địa chỉ giao hàng"></textarea>
                            <div class="invalid-feedback">Vui lòng nhập địa chỉ.</div>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary flex-grow-1" data-toggle="tooltip" title="Xác nhận thanh toán"><i class="bi bi-check-circle me-1"></i>Thanh toán</button>
                            <a href="/WebsiteBanHoa/Product/cart" class="btn btn-secondary" data-toggle="tooltip" title="Quay lại giỏ hàng"><i class="bi bi-arrow-left me-1"></i>Quay lại</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Tóm tắt đơn hàng -->
        <div class="col-lg-6">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0 fw-semibold"><i class="bi bi-cart-check me-1"></i>Tóm tắt đơn hàng</h5>
                </div>
                <div class="card-body">
                    <?php 
                        $cart = $_SESSION['cart'] ?? [];
                        $subtotal = 0;
                        if (!empty($cart)):
                            foreach ($cart as $item):
                                $item_total = $item['price'] * $item['quantity'];
                                $subtotal += $item_total;
                    ?>
                                <div class="d-flex align-items-center mb-2">
                                    <div class="me-2">
                                        <?php if (!empty($item['image']) && file_exists($_SERVER['DOCUMENT_ROOT'] . '/WebsiteBanHoa/' . $item['image'])): ?>
                                            <img src="/WebsiteBanHoa/<?php echo htmlspecialchars($item['image'], ENT_QUOTES, 'UTF-8'); ?>" 
                                                 alt="<?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?>" 
                                                 style="width: 40px; height: 40px; object-fit: contain;">
                                        <?php else: ?>
                                            <img src="/WebsiteBanHoa/assets/placeholder.jpg" 
                                                 alt="No Image" 
                                                 style="width: 40px; height: 40px; object-fit: contain;">
                                        <?php endif; ?>
                                    </div>
                                    <div class="flex-grow-1">
                                        <span>
                                            <?php echo htmlspecialchars(substr($item['name'], 0, 20), ENT_QUOTES, 'UTF-8'); ?>
                                            <?php echo strlen($item['name']) > 20 ? '...' : ''; ?>
                                            <small>(x<?php echo $item['quantity']; ?>)</small>
                                        </span>
                                    </div>
                                    <span><?php echo number_format($item_total, 0, ',', '.'); ?> VNĐ</span>
                                </div>
                    <?php 
                            endforeach;
                        else:
                    ?>
                            <p class="text-muted">Giỏ hàng trống.</p>
                    <?php endif; ?>
                    <div class="border-top pt-2 mt-3">
                        <div class="d-flex justify-content-between">
                            <strong>Tạm tính:</strong>
                            <span><?php echo number_format($subtotal, 0, ',', '.'); ?> VNĐ</span>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <strong>Tổng cộng:</strong>
                            <span class="fs-5 text-primary"><?php echo number_format($subtotal, 0, ',', '.'); ?> VNĐ</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>

<style>
.card {
    transition: box-shadow 0.3s ease;
}
.card:hover {
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
}
.btn-primary {
    transition: background-color 0.3s ease;
}
.btn-primary:hover {
    background-color: #0a58ca;
}
.card-header {
    background: linear-gradient(135deg, #0d6efd, #0a58ca);
}
.form-control:focus, .form-select:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
}
.summary-item img {
    border: 1px solid #e9ecef;
    border-radius: 4px;
}
@media (max-width: 767px) {
    .card-body {
        padding: 1.5rem;
    }
    .btn {
        width: 100%;
        margin-bottom: 0.5rem;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Kích hoạt tooltip
    $('[data-toggle="tooltip"]').tooltip();

    // Xác thực form
    var forms = document.querySelectorAll('.needs-validation');
    Array.prototype.slice.call(forms).forEach(function (form) {
        form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });
});

function validateForm() {
    const name = document.getElementById('name').value.trim();
    const phone = document.getElementById('phone').value.trim();
    if (name.length < 2) {
        alert('Họ tên phải có ít nhất 2 ký tự.');
        return false;
    }
    if (!/^\d{10}$/.test(phone)) {
        alert('Số điện thoại phải có đúng 10 chữ số.');
        return false;
    }
    return true;
}
</script>