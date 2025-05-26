<?php include 'app/views/shares/header.php'; ?>

<div class="container my-5">
    <h1 class="fw-semibold text-primary mb-4">Chi tiết sản phẩm</h1>

    <?php if ($product): ?>
        <div class="card shadow-sm border-0">
            <div class="row g-0">
                <!-- Hình ảnh sản phẩm -->
                <div class="col-md-5 d-flex align-items-center justify-content-center p-4">
                    <?php if ($product->image): ?>
                        <img src="/WebsiteBanHoa/<?php echo htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8'); ?>" class="img-fluid product-img" alt="Product Image" style="max-height: 400px; object-fit: contain;">
                    <?php else: ?>
                        <img src="/WebsiteBanHoa/assets/placeholder.jpg" class="img-fluid product-img" alt="No Image" style="max-height: 400px; object-fit: contain;">
                    <?php endif; ?>
                </div>
                <!-- Thông tin sản phẩm -->
                <div class="col-md-7">
                    <div class="card-body p-4">
                        <h2 class="card-title fw-bold"><?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?></h2>
                        <p class="card-text text-muted mb-3"><strong>Mô tả:</strong> <?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></p>
                        <p class="card-text fs-5"><strong>Giá:</strong> <?php echo number_format($product->price, 0, ',', '.'); ?> VND</p>
                        <p class="card-text"><strong>Danh mục:</strong> 
                    <?php 
                        // Lấy tên danh mục từ CategoryModel
                        $categoryModel = new CategoryModel($this->db);
                        $category = $categoryModel->getCategoryById($product->category_id);
                        echo $category ? htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8') : 'Không có danh mục';
                    ?></p>
                        <div class="d-flex gap-2 mt-4 flex-wrap">
                            <a href="/WebsiteBanHoa/Product/addToCart/<?php echo $product->id; ?>" class="btn btn-primary" data-toggle="tooltip" title="Thêm sản phẩm vào giỏ hàng"><i class="bi bi-cart-plus me-1"></i> Thêm vào giỏ hàng</a>
                            <a href="/WebsiteBanHoa/Product" class="btn btn-secondary" data-toggle="tooltip" title="Quay lại danh sách sản phẩm"><i class="bi bi-arrow-left me-1"></i> Quay lại</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="alert alert-danger text-center">
            <p class="mb-0">Không tìm thấy sản phẩm.</p>
        </div>
    <?php endif; ?>
</div>

<?php include 'app/views/shares/footer.php'; ?>

<style>
.product-img {
    transition: transform 0.3s ease;
}
.card:hover .product-img {
    transform: scale(1.05);
}
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
.card-title {
    font-size: 1.75rem;
}
.card-text {
    font-size: 1rem;
}
.fs-5 {
    font-size: 1.25rem;
}
@media (max-width: 767px) {
    .card-body {
        padding: 1.5rem;
    }
    .product-img {
        max-height: 300px;
    }
    .btn {
        flex: 1;
        text-align: center;
    }
}
</style>

<script>
// Kích hoạt tooltip
document.addEventListener('DOMContentLoaded', function() {
    $('[data-toggle="tooltip"]').tooltip();
});
</script>