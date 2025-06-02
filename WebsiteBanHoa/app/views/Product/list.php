<?php include 'app/views/shares/header.php'; ?>

<div class="container my-5">
    <!-- Tiêu đề và tìm kiếm -->
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
        <h1 class="fw-bold text-primary">Danh sách sản phẩm</h1>
        <div class="d-flex gap-2 align-items-center">
            <!-- Tìm kiếm -->
            <form class="d-flex" action="/WebsiteBanHoa/Product/" method="GET">
                <input type="text" name="search" class="form-control me-2" placeholder="Tìm kiếm sản phẩm..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                <button class="btn btn-outline-primary" type="submit" data-toggle="tooltip" title="Tìm kiếm sản phẩm"><i class="bi bi-search"></i></button>
            </form>
            <?php if (SessionHelper::isAdmin()): ?>
                <!-- Nút thêm sản phẩm (chỉ hiển thị cho admin) -->
                <a href="/WebsiteBanHoa/Product/add" class="btn btn-primary px-4" data-toggle="tooltip" title="Thêm sản phẩm mới"><i class="bi bi-plus-circle"></i> Thêm sản phẩm</a>
            <?php endif; ?>
        </div>
    </div>

    <!-- Danh sách sản phẩm -->
    <div class="row g-4">
        <?php if (!empty($products)): ?>
            <?php foreach ($products as $product): ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card h-100 border-0 shadow-sm overflow-hidden">
                        <!-- Badge giảm giá (nếu có) -->
                        <?php if (property_exists($product, 'discount') && $product->discount > 0): ?>
                            <span class="badge bg-danger position-absolute top-0 start-0 m-2"><?php echo $product->discount; ?>% OFF</span>
                        <?php endif; ?>
                        <!-- Hình ảnh -->
                        <div class="card-img-top text-center p-3 bg-light">
                            <?php if ($product->image): ?>
                                <a href="/WebsiteBanHoa/Product/show/<?php echo $product->id; ?>">
                                    <img src="/WebsiteBanHoa/<?php echo htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>" class="img-fluid product-img">
                                </a>
                            <?php else: ?>
                                <a href="/WebsiteBanHoa/Product/show/<?php echo $product->id; ?>">
                                    <img src="/WebsiteBanHoa/assets/placeholder.jpg" alt="Placeholder" class="img-fluid product-img">
                                </a>
                            <?php endif; ?>
                        </div>
                        <!-- Nội dung thẻ -->
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-semibold">
                                <a href="/WebsiteBanHoa/Product/show/<?php echo $product->id; ?>" class="text-decoration-none text-dark"><?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?></a>
                            </h5>
                            <p class="card-text text-danger fw-bold"><?php echo number_format($product->price, 0, ',', '.'); ?> VNĐ</p>
                            <p class="card-text"><small class="text-muted">Danh mục: <?php echo htmlspecialchars($product->category_name, ENT_QUOTES, 'UTF-8'); ?></small></p>
                        </div>
                        <!-- Nút hành động -->
                        <div class="card-footer bg-transparent border-top-0 d-flex flex-wrap gap-2">
                            <a href="/WebsiteBanHoa/Product/show/<?php echo $product->id; ?>" class="btn btn-sm btn-outline-primary" data-toggle="tooltip" title="Chi tiết"><i class="bi bi-eye"></i></a>
                            <?php if (SessionHelper::isAdmin()): ?>
                                <a href="/WebsiteBanHoa/Product/edit/<?php echo $product->id; ?>" class="btn btn-sm btn-outline-warning" data-toggle="tooltip" title="Sửa"><i class="bi bi-pencil"></i></a>
                                <a href="/WebsiteBanHoa/Product/delete/<?php echo $product->id; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');" data-toggle="tooltip" title="Xóa"><i class="bi bi-trash"></i></a>
                            <?php endif; ?>
                            <a href="/WebsiteBanHoa/Product/addToCart/<?php echo $product->id; ?>" class="btn btn-sm btn-outline-primary ms-auto" data-toggle="tooltip" title="Thêm vào giỏ hàng"><i class="bi bi-cart-plus"></i></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12 text-center">
                <p class="text-muted">Không tìm thấy sản phẩm nào.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>

<style>
.product-img {
    max-height: 200px;
    object-fit: cover;
    transition: transform 0.3s ease;
}
.card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
}
.card:hover .product-img {
    transform: scale(1.05);
}
.btn-sm {
    padding: 0.3rem 0.6rem;
    font-size: 0.875rem;
}
.card-footer .btn {
    width: 38px;
    height: 38px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.badge {
    font-size: 0.75rem;
}
.card-title {
    font-size: 1.1rem;
}
.card-text.text-muted {
    font-size: 0.9rem;
}
.text-danger {
    color: #dc3545 !important;
}
@media (max-width: 576px) {
    .card-footer .btn {
        width: 100%;
        margin-bottom: 0.5rem;
    }
    .card-footer {
        flex-direction: column;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Kích hoạt tooltip
    $('[data-toggle="tooltip"]').tooltip();

    // Xử lý tìm kiếm
    const searchInput = document.querySelector('input[name="search"]');
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            if (this.value.length > 0) {
                this.classList.add('border-primary');
            } else {
                this.classList.remove('border-primary');
            }
        });
    }
});
</script>