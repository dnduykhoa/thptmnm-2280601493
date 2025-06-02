<?php include 'app/views/shares/header.php'; ?>

<div class="container my-5">
    <!-- Tiêu đề và tìm kiếm -->
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
        <h1 class="fw-bold text-primary">Danh sách danh mục</h1>
        <div class="d-flex gap-2 align-items-center">
            <!-- Tìm kiếm -->
            <form class="d-flex" action="/WebsiteBanHoa/Category/list" method="GET">
                <input type="text" name="search" class="form-control me-2" placeholder="Tìm kiếm danh mục..." 
                       value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                <button class="btn btn-outline-primary rounded-circle" type="submit" data-bs-toggle="tooltip" title="Tìm kiếm danh mục">
                    <i class="bi bi-search"></i>
                </button>
            </form>
            <?php if (SessionHelper::isAdmin()): ?>
                <!-- Nút thêm danh mục -->
                <a href="/WebsiteBanHoa/Category/add" class="btn btn-primary px-4" data-bs-toggle="tooltip" title="Thêm danh mục mới">
                    <i class="bi bi-plus-circle-fill"></i> Thêm danh mục
                </a>
            <?php endif; ?>
        </div>
    </div>

    <!-- Thông báo khi không có danh mục -->
    <?php if (empty($categories)): ?>
        <div class="alert alert-info alert-dismissible fade show shadow-sm rounded" role="alert">
            <p class="mb-0">Chưa có danh mục nào. <a href="/WebsiteBanHoa/Category/add" class="alert-link">Thêm danh mục mới ngay!</a></p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php else: ?>
        <!-- Bảng danh mục -->
        <div class="card border-0 shadow-sm rounded">
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th scope="col" class="fw-semibold">ID</th>
                            <th scope="col" class="fw-semibold">Tên danh mục</th>
                            <th scope="col" class="fw-semibold text-center">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($categories as $category): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($category->id, ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?></td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <?php if (SessionHelper::isAdmin()): ?>
                                            <a href="/WebsiteBanHoa/Category/edit/<?php echo $category->id; ?>" 
                                            class="btn btn-outline-warning btn-action rounded-circle" 
                                            data-bs-toggle="tooltip" title="Sửa danh mục">
                                                <i class="bi bi-pencil-fill"></i>
                                            </a>
                                            <a href="/WebsiteBanHoa/Category/delete/<?php echo $category->id; ?>" 
                                            class="btn btn-outline-danger btn-action rounded-circle" 
                                            onclick="return confirm('Bạn có chắc muốn xóa danh mục này?');" 
                                            data-bs-toggle="tooltip" title="Xóa danh mục">
                                            <i class="bi bi-trash-fill"></i>
                                        </a>
                                        <?php endif; ?>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?>
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
.table {
    border-radius: 0.5rem;
    overflow: hidden;
}
.table-hover tbody tr:hover {
    background-color: rgba(0, 0, 0, 0.05);
}
.btn-action {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1rem;
    transition: transform 0.2s ease, background-color 0.3s ease;
}
.btn-action:hover {
    transform: scale(1.1);
}
.btn-outline-warning {
    border-color: #ffc107;
    color: #ffc107;
}
.btn-outline-warning:hover {
    background-color: #ffc107;
    color: #fff;
}
.btn-outline-danger {
    border-color: #dc3545;
    color: #dc3545;
}
.btn-outline-danger:hover {
    background-color: #dc3545;
    color: #fff;
}
.btn-outline-primary.rounded-circle {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.btn-primary {
    transition: transform 0.2s ease;
}
.btn-primary:hover {
    transform: translateY(-2px);
}
.form-control {
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}
.form-control:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
}
.alert {
    border-radius: 0.5rem;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Kích hoạt tooltip
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));

    // Hiệu ứng khi nhập input tìm kiếm
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