<?php include 'app/views/shares/header.php'; ?>

<!-- Hero Section -->
<div class="hero-section my-4 shadow-sm">
    <div class="container text-center">
        <h1 class="display-4 fw-bold text-success">BLOOMIE</h1>
        <p class="lead">Mang vẻ đẹp thiên nhiên đến không gian của bạn</p>
        <hr class="my-4 w-50 mx-auto">
        <p class="mb-4">Khám phá bộ sưu tập hoa tươi đa dạng và độc đáo của chúng tôi</p>
        <a class="btn btn-success btn-lg px-4" href="/WebsiteBanHoa/Product" role="button">Mua ngay</a>
    </div>
</div>

<div class="container">
    <!-- Sản phẩm nổi bật -->
    <div class="row mb-5">
        <div class="col-12 text-center mb-4">
            <h2 class="fw-bold">Sản phẩm nổi bật</h2>
            <p class="text-muted">Những bó hoa tươi đẹp nhất của chúng tôi</p>
        </div>
        
        <?php foreach ($products as $product): ?>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <?php
                        // Debug: Hiển thị đường dẫn hình ảnh để kiểm tra
                        $imagePath = $product->image ? $product->image : '';
                        $fullImagePath = $_SERVER['DOCUMENT_ROOT'] . '/WebsiteBanHoa/' . $imagePath;
                        $imageExists = file_exists($fullImagePath);
                    ?>
                    
                    <?php if (!empty($imagePath) && $imageExists): ?>
                        <img src="/WebsiteBanHoa/<?php echo htmlspecialchars($imagePath, ENT_QUOTES, 'UTF-8'); ?>" 
                             class="card-img-top" alt="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>" 
                             style="height: 250px; object-fit: cover;">
                    <?php else: ?>
                        <img src="/WebsiteBanHoa/assets/placeholder.jpg" 
                             class="card-img-top" alt="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>" 
                             style="height: 250px; object-fit: cover;">
                    <?php endif; ?>
                    
                    <div class="card-body p-4">
                        <h5 class="card-title fw-bold"><?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?></h5>
                        <p class="card-text text-muted"><?php echo htmlspecialchars(substr($product->description, 0, 100), ENT_QUOTES, 'UTF-8'); ?>...</p>
                        <p class="card-text fw-bold text-success fs-5"><?php echo number_format($product->price, 0, ',', '.'); ?> VNĐ</p>
                    </div>
                    <div class="card-footer bg-white border-top-0 p-4">
                        <div class="d-flex justify-content-between">
                            <a href="/WebsiteBanHoa/Product/show/<?php echo $product->id; ?>" class="btn btn-sm btn-outline-secondary">Chi tiết</a>
                            <a href="/WebsiteBanHoa/Product/addToCart/<?php echo $product->id; ?>" class="btn btn-sm btn-success">
                                <i class="fas fa-cart-plus me-1"></i>Thêm vào giỏ
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    
    <!-- Lợi ích khi mua hàng -->
    <div class="row mb-5">
        <div class="col-12 text-center mb-4">
            <h2 class="fw-bold">Tại sao chọn BLOOMIE?</h2>
            <p class="text-muted">Chúng tôi cam kết mang đến trải nghiệm mua sắm tốt nhất</p>
        </div>
        
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-sm text-center p-4">
                <div class="card-body">
                    <i class="fas fa-truck text-success fa-3x mb-3"></i>
                    <h5 class="card-title fw-bold">Giao hàng nhanh chóng</h5>
                    <p class="card-text text-muted">Giao hàng trong ngày đối với các đơn hàng trong nội thành</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-sm text-center p-4">
                <div class="card-body">
                    <i class="fas fa-leaf text-success fa-3x mb-3"></i>
                    <h5 class="card-title fw-bold">Hoa tươi mỗi ngày</h5>
                    <p class="card-text text-muted">Chúng tôi cam kết chỉ sử dụng hoa tươi mới mỗi ngày</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-sm text-center p-4">
                <div class="card-body">
                    <i class="fas fa-gift text-success fa-3x mb-3"></i>
                    <h5 class="card-title fw-bold">Thiết kế độc đáo</h5>
                    <p class="card-text text-muted">Mỗi bó hoa đều được thiết kế tỉ mỉ bởi các nghệ nhân hàng đầu</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>

<style>
.card {
    transition: transform 0.3s, box-shadow 0.3s;
}
.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
}
.card-hover-effect:hover {
    opacity: 1;
}
.jumbotron {
    background: linear-gradient(135deg, #007bff, #00c4b4);
}
.btn-primary:hover {
    background-color: #0056b3;
    border-color: #0056b3;
}
</style>
