<?php include 'app/views/shares/header.php'; ?>

<div class="container my-5">
    <!-- Tiêu đề -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold text-primary">Thêm danh mục mới</h1>
        <a href="/WebsiteBanHoa/Category/list" class="btn btn-outline-secondary px-4" data-toggle="tooltip" title="Quay lại danh sách danh mục">
            <i class="bi bi-arrow-left"></i> Quay lại
        </a>
    </div>

    <!-- Thông báo lỗi -->
    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
            <strong>Lỗi:</strong>
            <ul class="mb-0">
                <?php foreach ($errors as $error): ?>
                    <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
                <?php endforeach; ?>
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <!-- Form thêm danh mục -->
    <div class="card border-0 shadow-sm p-4">
        <form method="POST" action="/WebsiteBanHoa/Category/save" id="addCategoryForm">
            <div class="mb-3">
                <label for="name" class="form-label fw-semibold">Tên danh mục:</label>
                <input type="text" id="name" name="name" class="form-control" 
                       value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8') : ''; ?>" 
                       placeholder="Nhập tên danh mục..." required>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary px-4" data-toggle="tooltip" title="Thêm danh mục mới">
                    <i class="bi bi-plus-circle"></i> Thêm danh mục
                </button>
                <a href="/WebsiteBanHoa/Category/list" class="btn btn-outline-secondary px-4">Hủy</a>
            </div>
        </form>
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
.form-control {
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}
.form-control:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
}
.btn-primary {
    transition: background-color 0.3s ease, transform 0.2s ease;
}
.btn-primary:hover {
    transform: translateY(-2px);
}
.alert {
    border-radius: 0.5rem;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Kích hoạt tooltip
    const tooltipTriggerList = document.querySelectorAll('[data-toggle="tooltip"]');
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));

    // Xác nhận trước khi gửi form
    const form = document.getElementById('addCategoryForm');
    if (form) {
        form.addEventListener('submit', function(event) {
            const nameInput = document.getElementById('name').value.trim();
            if (!nameInput) {
                event.preventDefault();
                alert('Vui lòng nhập tên danh mục!');
            } else {
                if (!confirm('Bạn có chắc chắn muốn thêm danh mục này?')) {
                    event.preventDefault();
                }
            }
        });
    }

    // Hiệu ứng khi nhập input
    const nameInput = document.getElementById('name');
    if (nameInput) {
        nameInput.addEventListener('input', function() {
            if (this.value.length > 0) {
                this.classList.add('border-primary');
            } else {
                this.classList.remove('border-primary');
            }
        });
    }
});
</script>