<?php include 'app/views/shares/header.php'; ?>

<div class="container my-5">
    <h1 class="fw-bold text-primary mb-4">Giỏ hàng</h1>

    <?php if (!empty($cart)): ?>
        <div class="row">
            <div class="col-lg-8">
                <?php foreach ($cart as $id => $item): ?>
                    <div class="card shadow-sm mb-3 border-0">
                        <div class="card-body d-flex align-items-center flex-wrap">
                            <!-- Hình ảnh -->
                            <div class="me-3">
                                <?php if (!empty($item['image']) && file_exists($_SERVER['DOCUMENT_ROOT'] . '/WebsiteBanHoa/' . $item['image'])): ?>
                                    <img src="/WebsiteBanHoa/<?php echo htmlspecialchars($item['image'], ENT_QUOTES, 'UTF-8'); ?>" 
                                         alt="<?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?>" 
                                         class="img-fluid" style="max-width: 100px; max-height: 100px; object-fit: contain;">
                                <?php else: ?>
                                    <img src="/WebsiteBanHoa/assets/placeholder.jpg" 
                                         alt="No Image" 
                                         class="img-fluid" style="max-width: 100px; max-height: 100px; object-fit: contain;">
                                <?php endif; ?>
                            </div>
                            <!-- Thông tin sản phẩm -->
                            <div class="flex-grow-1">
                                <h5 class="fw-semibold"><?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?></h5>
                                <p class="mb-1">Giá: <?php echo number_format($item['price'], 0, ',', '.'); ?> VNĐ</p>
                                <div class="d-flex align-items-center mb-2">
                                    <span class="me-2">Số lượng:</span>
                                    <a href="/WebsiteBanHoa/Product/decreaseQuantity/<?php echo $id; ?>" 
                                       class="btn btn-sm btn-outline-primary" 
                                       data-toggle="tooltip" 
                                       title="Giảm số lượng"><i class="bi bi-dash"></i></a>
                                    <span class="mx-3"><?php echo htmlspecialchars($item['quantity'], ENT_QUOTES, 'UTF-8'); ?></span>
                                    <a href="/WebsiteBanHoa/Product/increaseQuantity/<?php echo $id; ?>" 
                                       class="btn btn-sm btn-outline-primary" 
                                       data-toggle="tooltip" 
                                       title="Tăng số lượng"><i class="bi bi-plus"></i></a>
                                </div>
                                <a href="/WebsiteBanHoa/Product/removeFromCart/<?php echo $id; ?>" 
                                   class="btn btn-sm btn-outline-danger" 
                                   onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng?');" 
                                   data-toggle="tooltip" 
                                   title="Xóa khỏi giỏ hàng"><i class="bi bi-trash"></i> Xóa</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <!-- Tóm tắt đơn hàng -->
            <div class="col-lg-4">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0 fw-semibold"><i class="bi bi-cart-check me-1"></i>Tóm tắt đơn hàng</h5>
                    </div>
                    <div class="card-body">
                        <!-- Thông tin sản phẩm -->
                        <div class="mb-3">
                            <?php 
                                $subtotal = 0;
                                foreach ($cart as $item) {
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
                            <?php } ?>
                        </div>
                        <!-- Tạm tính và Tổng cộng -->
                        <div class="border-top pt-2 mb-3">
                            <div class="d-flex justify-content-between">
                                <strong>Tạm tính:</strong>
                                <span><?php echo number_format($subtotal, 0, ',', '.'); ?> VNĐ</span>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <strong>Tổng cộng:</strong>
                                <span class="fs-5 text-primary"><?php echo number_format($subtotal, 0, ',', '.'); ?> VNĐ</span>
                            </div>
                        </div>
                        <!-- Nút hành động -->
                        <div class="d-flex flex-column gap-2">
                            <a href="/WebsiteBanHoa/Product/checkout" 
                               class="btn btn-primary" 
                               data-toggle="tooltip" 
                               title="Tiến hành thanh toán"><i class="bi bi-credit-card me-1"></i>Thanh toán</a>
                            <a href="/WebsiteBanHoa/Product" 
                               class="btn btn-secondary" 
                               data-toggle="tooltip" 
                               title="Quay lại cửa hàng"><i class="bi bi-arrow-left me-1"></i>Tiếp tục mua sắm</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="alert alert-info text-center">
            <p class="mb-0">Giỏ hàng của bạn đang trống.</p>
        </div>
        <div class="text-center">
            <a href="/WebsiteBanHoa/Product" 
               class="btn btn-secondary" 
               data-toggle="tooltip" 
               title="Quay lại cửa hàng"><i class="bi bi-arrow-left me-1"></i>Tiếp tục mua sắm</a>
        </div>
    <?php endif; ?>
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
.btn-outline-primary {
    transition: background-color 0.3s ease, color 0.3s ease;
}
.btn-outline-primary:hover {
    background-color: #0d6efd;
    color: #fff;
}
.card-header {
    background: linear-gradient(135deg, #0d6efd, #0a58ca);
}
.fs-5 {
    font-size: 1.25rem;
}
.summary-item img {
    border: 1px solid #e9ecef;
    border-radius: 4px;
}
@media (max-width: 767px) {
    .card-body {
        flex-direction: column;
        align-items: flex-start;
    }
    .card-body .me-3 {
        margin-bottom: 1rem;
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
});
</script>