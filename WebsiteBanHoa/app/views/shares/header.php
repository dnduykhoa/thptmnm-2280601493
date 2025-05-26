<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLOOMIE - Cửa hàng hoa tươi</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- Thêm CDN Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .navbar-brand {
            font-weight: 700;
            color: #007bff !important; /* Màu xanh nước biển */
            font-size: 1.5rem;
        }
        .nav-link {
            color: #333 !important;
            font-weight: 500;
            transition: color 0.3s;
        }
        .nav-link:hover {
            color: #007bff !important; /* Màu xanh nước biển khi hover */
        }
        .badge {
            font-size: 0.75rem;
            vertical-align: middle;
            background-color: #007bff !important; /* Màu badge giỏ hàng */
        }
        .navbar-toggler {
            border: none;
        }
        .navbar-toggler:focus {
            box-shadow: none;
        }
        .hero-section {
            background-image: linear-gradient(rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0.8)), url('/WebsiteBanHoa/assets/flowers-banner.jpg');
            background-size: cover;
            background-position: center;
            padding: 5rem 0;
            border-radius: 0.5rem;
        }
        .btn-success {
            background-color: #007bff; /* Màu nút xanh nước biển */
            border-color: #007bff;
        }
        .btn-success:hover {
            background-color: #0056b3; /* Màu hover đậm hơn */
            border-color: #0056b3;
        }
        .text-success {
            color: #007bff !important; /* Màu text-success xanh nước biển */
        }
        @media (max-width: 991px) {
            .navbar-nav {
                padding: 1rem 0;
            }
            .nav-link {
                padding: 0.5rem 1rem;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container">
            <a class="navbar-brand" href="/WebsiteBanHoa/"><i class="fas fa-leaf me-2"></i>BLOOMIE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="/WebsiteBanHoa/"><i class="fas fa-home me-1"></i> Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/WebsiteBanHoa/Product/"><i class="fas fa-list me-1"></i> Sản phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/WebsiteBanHoa/Category/"><i class="fas fa-tags me-1"></i> Danh mục</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/WebsiteBanHoa/Product/cart">
                            <i class="fas fa-shopping-cart me-1"></i> Giỏ hàng
                            <?php
                            $cartCount = isset($_SESSION['cart']) ? array_sum(array_column($_SESSION['cart'], 'quantity')) : 0;
                            if ($cartCount > 0) {
                                echo "<span class='badge rounded-pill bg-success ms-1'>$cartCount</span>";
                            }
                            ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <?php
                        if (isset($_SESSION['user_id'])) {
                            echo "<a class='nav-link' href='/WebsiteBanHoa/account/profile'><i class='fas fa-user me-1'></i> " . htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8') . "</a>";
                        } else {
                            echo "<a class='nav-link' href='/WebsiteBanHoa/account/login'><i class='fas fa-sign-in-alt me-1'></i> Đăng nhập</a>";
                        }
                        ?>
                    </li>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/WebsiteBanHoa/account/logout"><i class="fas fa-sign-out-alt me-1"></i> Đăng xuất</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>