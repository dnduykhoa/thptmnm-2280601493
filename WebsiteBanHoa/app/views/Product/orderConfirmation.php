<?php include 'app/views/shares/header.php'; ?>

<div class="container my-5">
    <!-- Tiêu đề -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold text-primary">Xác nhận đơn hàng</h1>
        <a href="/WebsiteBanHoa/Product/list" class="btn btn-outline-secondary px-4" data-bs-toggle="tooltip" title="Quay lại danh sách sản phẩm">
            <i class="bi bi-arrow-left"></i> Tiếp tục mua sắm
        </a>
    </div>

    <!-- Thông báo thành công -->
    <div class="alert alert-success alert-dismissible fade show shadow-sm rounded" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>
        <strong>Thành công!</strong> Cảm ơn bạn đã đặt hàng. Đơn hàng của bạn đã được xử lý thành công.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <!-- Thông tin đơn hàng (tùy chọn, nếu controller cung cấp) -->
    <?php if (isset($order) && !empty($order)): ?>
        <div class="card border-0 shadow-sm p-4">
            <h3 class="fw-semibold mb-3">Thông tin đơn hàng</h3>
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Mã đơn hàng:</strong> <?php echo htmlspecialchars($order->id ?? 'N/A', ENT_QUOTES, 'UTF-8'); ?></p>
                    <p><strong>Họ tên:</strong> <?php echo htmlspecialchars($order->name ?? 'N/A', ENT_QUOTES, 'UTF-8'); ?></p>
                    <p><strong>Số điện thoại:</strong> <?php echo htmlspecialchars($order->phone ?? 'N/A', ENT_QUOTES, 'UTF-8'); ?></p>
                    <p><strong>Địa chỉ:</strong> <?php echo htmlspecialchars($order->address ?? 'N/A', ENT_QUOTES, 'UTF-8'); ?></p>
                </div>
                <div class="col-md-6">
                    <?php if (isset($order_details) && !empty($order_details)): ?>
                        <h5 class="fw-semibold">Sản phẩm đã đặt</h5>
                        <ul class="list-group list-group-flush">
                            <?php foreach ($order_details as $item): ?>
                                <li class="list-group-item">
                                    <div class="d-flex justify-content-between">
                                        <span><?php echo htmlspecialchars($item->product_name ?? 'N/A', ENT_QUOTES, 'UTF-8'); ?></span>
                                        <span>
                                            <?php echo htmlspecialchars($item->quantity ?? 0, ENT_QUOTES, 'UTF-8'); ?> x 
                                            <?php echo number_format($item->price ?? 0, 0, ',', '.'); ?> VNĐ
                                        </span>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- Nút hành động -->
    <div class="mt-4 text-center">
        <a href="/WebsiteBanHoa/Product/list" class="btn btn-primary px-5" data-bs-toggle="tooltip" title="Tiếp tục mua sắm">
            <i class="bi bi-cart3 me-2"></i> Tiếp tục mua sắm
        </a>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>

<style>
.card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
}
.alert {
    border-radius: 0.5rem;
}
.alert-success {
    background-color: #d4edda;
    color: #155724;
}
.btn-primary, .btn-outline-secondary {
    transition: transform 0.2s ease;
}
.btn-primary:hover, .btn-outline-secondary:hover {
    transform: translateY(-2px);
}
.list-group-item {
    border: none;
    padding: 0.5rem 0;
}
.list-group-item span {
    font-size: 0.95rem;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Kích hoạt tooltip
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
});
</script>