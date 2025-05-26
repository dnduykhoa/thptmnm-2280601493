<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-4">
    <h1>Chỉnh sửa danh mục</h1>

    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="POST" action="/WebsiteBanHoa/Category/update">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($category->id, ENT_QUOTES, 'UTF-8'); ?>">
        <div class="form-group">
            <label for="name">Tên danh mục:</label>
            <input type="text" id="name" name="name" class="form-control" value="<?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="/WebsiteBanHoa/Category/list" class="btn btn-secondary">Quay lại</a>
    </form>
</div>

<?php include 'app/views/shares/footer.php'; ?>