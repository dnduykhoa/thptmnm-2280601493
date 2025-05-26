<?php include 'app/views/shares/header.php'; ?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white py-3">
                    <h3 class="mb-0 fw-semibold"><i class="bi bi-plus-circle me-2"></i>Thêm sản phẩm mới</h3>
                </div>
                <div class="card-body p-4">
                    <?php if (!empty($errors)): ?>
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                <?php foreach ($errors as $error): ?>
                                    <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="/WebsiteBanHoa/Product/save" enctype="multipart/form-data" class="needs-validation" novalidate onsubmit="return validateForm()">
                        <div class="mb-3">
                            <label for="name" class="form-label"><i class="bi bi-tag me-1"></i>Tên sản phẩm:</label>
                            <input type="text" id="name" name="name" class="form-control" required maxlength="255" data-bs-toggle="tooltip" title="Nhập tên sản phẩm (tối đa 255 ký tự)">
                            <div class="invalid-feedback">Vui lòng nhập tên sản phẩm.</div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label"><i class="bi bi-text-left me-1"></i>Mô tả:</label>
                            <textarea id="description" name="description" class="form-control" rows="5" required data-bs-toggle="tooltip" title="Nhập mô tả chi tiết cho sản phẩm"></textarea>
                            <div class="invalid-feedback">Vui lòng nhập mô tả sản phẩm.</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="price" class="form-label"><i class="bi bi-currency-dollar me-1"></i>Giá:</label>
                                <div class="input-group">
                                    <input type="number" id="price" name="price" class="form-control" step="0.01" min="0" required data-bs-toggle="tooltip" title="Nhập giá sản phẩm (số dương)">
                                    <span class="input-group-text">VNĐ</span>
                                </div>
                                <div class="invalid-feedback">Vui lòng nhập giá sản phẩm hợp lệ.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="category_id" class="form-label"><i class="bi bi-list me-1"></i>Danh mục:</label>
                                <select id="category_id" name="category_id" class="form-select" required data-bs-toggle="tooltip" title="Chọn danh mục cho sản phẩm">
                                    <option value="" disabled selected>Chọn danh mục</option>
                                    <?php foreach ($categories as $category): ?>
                                        <option value="<?php echo $category->id; ?>"><?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">Vui lòng chọn danh mục.</div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label"><i class="bi bi-image me-1"></i>Hình ảnh:</label>
                            <input type="file" id="image" name="image" class="form-control" accept="image/jpeg,image/png,image/gif,image/webp" data-bs-toggle="tooltip" title="Chọn hình ảnh (JPG, PNG, GIF, WEBP, tối đa 10MB)">
                            <div class="invalid-feedback">Vui lòng chọn hình ảnh hợp lệ.</div>
                            <div class="mt-2">
                                <img id="image-preview" src="#" alt="Image Preview" style="display: none; max-width: 300px; max-height: 300px; object-fit: contain;">
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary flex-grow-1"><i class="bi bi-check-circle me-1"></i>Thêm sản phẩm</button>
                            <a href="/WebsiteBanHoa/Product" class="btn btn-secondary"><i class="bi bi-arrow-left me-1"></i>Quay lại</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>

<style>
.form-control:focus, .form-select:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
}
.card-header {
    background: linear-gradient(135deg, #0d6efd, #0a58ca);
}
.btn-primary {
    transition: background-color 0.3s ease;
}
.btn-primary:hover {
    background-color: #0a58ca;
}
.form-label {
    font-weight: 500;
}
@media (max-width: 576px) {
    .card-body {
        padding: 1.5rem;
    }
    .btn {
        padding: 0.5rem 1rem;
    }
}
</style>

<script>
// Xác thực form và xử lý preview hình ảnh
document.addEventListener('DOMContentLoaded', function() {
    // Kích hoạt tooltip
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Xử lý preview hình ảnh
    document.getElementById('image').addEventListener('change', function(event) {
        const input = event.target;
        const preview = document.getElementById('image-preview');
        
        if (input.files && input.files[0]) {
            const file = input.files[0];
            const validTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
            if (!validTypes.includes(file.type)) {
                alert('Vui lòng chọn file hình ảnh hợp lệ (JPG, PNG, GIF, WEBP).');
                input.value = '';
                preview.src = '#';
                preview.style.display = 'none';
                return;
            }
            if (file.size > 10 * 1024 * 1024) {
                alert('Hình ảnh không được vượt quá 10MB.');
                input.value = '';
                preview.src = '#';
                preview.style.display = 'none';
                return;
            }
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            preview.src = '#';
            preview.style.display = 'none';
        }
    });

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
    const price = document.getElementById('price').value;
    if (price < 0) {
        alert('Giá sản phẩm không thể âm.');
        return false;
    }
    return true;
}
</script>