<?php
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: /WebsiteBanHoa/account/login');
    exit;
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản trị - BLOOMIE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #60a5fa;
            --background-light: #f8fafc;
            --sidebar-bg: #1e293b;
            --text-dark: #1e293b;
            --text-light: #ffffff;
            --accent-color: #93c5fd;
            --sidebar-hover: #3b82f6;
            --shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--background-light);
            color: var(--text-dark);
            margin: 0;
            overflow-x: hidden;
        }

        #sidebar-wrapper {
            width: 240px;
            height: 100vh;
            background: var(--sidebar-bg);
            color: var(--text-light);
            position: fixed;
            padding: 15px 10px;
            transition: var(--transition);
            z-index: 1000;
            overflow-y: auto;
            box-shadow: var(--shadow);
        }

        #sidebar-wrapper.collapsed {
            width: 60px;
            padding: 15px 5px;
        }

        .sidebar-heading {
            font-size: 1.4rem;
            font-weight: 600;
            text-align: center;
            margin-bottom: 1.5rem;
            color: var(--text-light);
        }

        #sidebar-wrapper.collapsed .sidebar-heading {
            font-size: 0;
            margin: 0;
        }

        .sidebar-section-title {
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--accent-color);
            padding: 5px 10px;
            text-transform: uppercase;
            margin-bottom: 0.5rem;
            border-bottom: 1px solid var(--secondary-color);
        }

        .list-group-item {
            background: transparent;
            border: none;
            padding: 10px 12px;
            margin: 3px 0;
            border-radius: 6px;
            color: var(--text-light);
            font-size: 0.9rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: var(--transition);
            text-decoration: none;
        }

        .list-group-item:hover {
            background: var(--sidebar-hover);
            color: var(--text-light);
            transform: translateX(3px);
        }

        .list-group-item i {
            font-size: 1.1rem;
            width: 18px;
            text-align: center;
        }

        #sidebar-wrapper.collapsed .list-group-item span {
            display: none;
        }

        #page-content-wrapper {
            margin-left: 240px;
            padding: 20px;
            width: calc(100% - 240px);
            min-height: 100vh;
            transition: var(--transition);
        }

        #page-content-wrapper.shifted {
            margin-left: 60px;
            width: calc(100% - 60px);
        }

        .navbar {
            background: #ffffff;
            padding: 12px 20px;
            box-shadow: var(--shadow);
            border-radius: 0 0 8px 8px;
            z-index: 1000;
        }

        .navbar-toggle {
            background: none;
            border: none;
            color: var(--primary-color);
            font-size: 1.3rem;
            cursor: pointer;
            padding: 8px;
            transition: var(--transition);
        }

        .navbar-toggle:hover {
            color: var(--secondary-color);
        }

        .admin-info {
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.9rem;
            color: var(--primary-color);
            cursor: pointer;
            padding: 6px 10px;
            border-radius: 6px;
            transition: var(--transition);
        }

        .user-info:hover {
            background: var(--background-light);
            color: var(--secondary-color);
        }

        .user-info i {
            font-size: 1.1rem;
        }

        .user-info .role-name {
            font-weight: 500;
        }

        .dropdown-menu {
            border-radius: 8px;
            box-shadow: var(--shadow);
            border: none;
            min-width: 200px;
        }

        .dropdown-item:hover {
            background: var(--primary-color);
            color: var(--text-light);
        }

        .container-fluid {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <div class="sidebar-heading">Bloomie</div>
            <div class="sidebar-section">
                <div class="sidebar-section-title">Điều hướng</div>
                <a href="/WebsiteBanHoa" class="list-group-item">
                    <i class="fas fa-home"></i><span>Trang chủ</span>
                </a>
                <a href="/WebsiteBanHoa/admin/product/list" class="list-group-item">
                    <i class="fas fa-box"></i><span>Sản phẩm</span>
                </a>
                <a href="/WebsiteBanHoa/admin/categories" class="list-group-item">
                    <i class="fas fa-layer-group"></i><span>Danh mục</span>
                </a>
                <a href="/WebsiteBanHoa/admin/orders" class="list-group-item">
                    <i class="fas fa-shopping-cart"></i><span>Đơn hàng</span>
                </a>
            </div>
        </div>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <button class="navbar-toggle" id="sidebarToggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <span class="navbar-brand">Bảng điều khiển Quản trị</span>
                    <div class="admin-info">
                        <div class="dropdown">
                            <a class="user-info dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user"></i>
                                <span class="role-name"><?php echo htmlspecialchars($_SESSION['username']); ?></span>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="/WebsiteBanHoa/account/profile">Cập nhật tài khoản</a></li>
                                <li><a class="dropdown-item" href="/WebsiteBanHoa/account/logout">Đăng xuất</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <div class="container-fluid mt-1">
                <h2>Trang Quản trị</h2>
                <p>Chào mừng, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sidebar = document.getElementById('sidebar-wrapper');
            const content = document.getElementById('page-content-wrapper');
            const toggleButton = document.getElementById('sidebarToggle');

            // Khôi phục trạng thái sidebar từ localStorage
            const isCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';
            if (isCollapsed) {
                sidebar.classList.add('collapsed');
                content.classList.add('shifted');
            }

            // Xử lý thu gọn/mở rộng sidebar
            toggleButton.addEventListener('click', function () {
                sidebar.classList.toggle('collapsed');
                content.classList.toggle('shifted');
                localStorage.setItem('sidebarCollapsed', sidebar.classList.contains('collapsed'));
            });

            // Xử lý responsive
            function handleResize() {
                if (window.innerWidth <= 992) {
                    sidebar.classList.add('collapsed');
                    content.classList.add('shifted');
                    localStorage.setItem('sidebarCollapsed', true);
                } else if (!localStorage.getItem('sidebarCollapsed')) {
                    sidebar.classList.remove('collapsed');
                    content.classList.remove('shifted');
                }
            }

            window.addEventListener('resize', handleResize);
            handleResize();
        });
    </script>
</body>
</html>