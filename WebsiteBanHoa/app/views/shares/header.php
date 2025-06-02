<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLOOMIE - Cửa hàng hoa tươi</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts for Roboto -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #f5f5f5;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .navbar-brand {
            font-weight: 700;
            color: #D0021B !important;
            font-size: 1.5rem;
        }
        .nav-link {
            color: #333 !important;
            font-weight: 500;
            transition: color 0.3s;
        }
        .nav-link:hover {
            color: #F5A623 !important;
        }
        .badge {
            font-size: 0.75rem;
            vertical-align: middle;
            background-color: #D0021B !important;
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
            background-color: #D0021B;
            border-color: #D0021B;
        }
        .btn-success:hover {
            background-color: #F5A623;
            border-color: #F5A623;
        }
        .text-success {
            color: #D0021B !important;
        }

        /* Footer Styles */
    .footer {
        background: #f5f5f5;
        color: #333;
        padding: 50px 0 0;
        margin-top: auto;
        width: 100%;
    }

    .footer .container {
        max-width: 1300px;
        padding-bottom: 0;
    }

    .footer .row {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 25px;
    }

    .footer h5 {
        font-family: 'Roboto', sans-serif;
        font-size: 1.3rem;
        font-weight: 700;
        color: #D0021B;
        margin-bottom: 20px;
    }

    .footer p, .footer a {
        font-size: 0.95rem;
        color: #333;
        transition: color 0.3s ease;
        font-family: 'Roboto', sans-serif;
    }

    .footer a:hover {
        color: #D0021B !important;
    }

    .footer .text-muted {
        color: #666 !important;
    }

    .footer .text-warning {
        color: #D0021B !important;
    }

    .footer .text-warning:hover {
        color: #F5A623 !important;
    }

    .footer-col {
        flex: 1;
        min-width: 200px;
    }

    .footer-links ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .footer-links ul li {
        margin-bottom: 10px;
    }

    .footer-links ul li a {
        display: flex;
        align-items: center;
        gap: 6px;
        text-decoration: none;
    }

    .social-links {
        display: flex;
        gap: 10px;
        margin-top: 20px;
    }

    .social-btn {
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 10px 15px;
        font-size: 0.9rem;
        font-family: 'Roboto', sans-serif;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        color: #333;
        transition: background-color 0.3s ease;
        text-decoration: none;
    }

    .social-btn img {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        object-fit: cover;
    }

    .social-btn:hover {
        background-color: #f5f5f5;
        color: #333;
    }

    .newsletter-form {
        display: flex;
        gap: 8px;
        margin-top: 12px;
        max-width: 320px;
    }

    .newsletter-form input {
        flex: 1;
        padding: 8px 12px;
        border: 1px solid #ddd;
        border-radius: 5px;
        background: #fff;
        font-size: 0.9rem;
        font-family: 'Roboto', sans-serif;
        color: #333;
        outline: none;
        transition: border-color 0.3s ease;
    }

    .newsletter-form input:focus {
        border-color: #D0021B;
    }

    .newsletter-form button {
        background: #D0021B;
        color: #fff;
        font-weight: 500;
        padding: 8px 15px;
        border: none;
        border-radius: 5px;
        font-size: 0.9rem;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .newsletter-form button:hover {
        background: #F5A623;
    }

    .footer-divider {
        border-top: 1px solid #ddd;
        margin: 30px 0;
    }

    .footer .text-center {
        margin-bottom: 0;
    }

    @media (max-width: 991px) {
        .navbar-nav {
            padding: 1rem 0;
        }
        .nav-link {
            padding: 0.5rem 1rem;
        }
        .footer .row {
            flex-direction: column;
            align-items: center;
        }
        .footer-col {
            text-align: center;
        }
        .footer-links ul li a {
            justify-content: center;
        }
        .social-links {
            justify-content: center;
        }
        .newsletter-form {
            max-width: 100%;
        }
    }
    </style>
</head>
<body>
<?php
// Khởi tạo phiên nếu chưa được bắt đầu
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

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
                <?php if (SessionHelper::isAdmin()): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/WebsiteBanHoa/Product/add"><i class="fas fa-plus me-1"></i> Thêm sản phẩm</a>
                    </li>
                <?php endif; ?>
                <li class="nav-item">
                    <?php if (SessionHelper::isLoggedIn()): ?>
                        <a class="nav-link" href="/WebsiteBanHoa/account/profile">
                            <i class="fas fa-user me-1"></i> <?php echo htmlspecialchars($_SESSION['username']) . " (" . SessionHelper::getRole() . ")"; ?>
                        </a>
                    <?php else: ?>
                        <a class="nav-link" href="/WebsiteBanHoa/account/login"><i class="fas fa-sign-in-alt me-1"></i> Đăng nhập</a>
                    <?php endif; ?>
                </li>
                <?php if (SessionHelper::isLoggedIn()): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/WebsiteBanHoa/account/logout"><i class="fas fa-sign-out-alt me-1"></i> Đăng xuất</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
</body>
</html>