<?php?>

<link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    body {
        font-family: 'Lora', serif;
        margin: 0;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(rgba(255, 250, 250, 0.8), rgba(255, 182, 193, 0.3)), url('https://images.unsplash.com/photo-1519378058457-4c29a0a2efac?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80') no-repeat center center fixed;
        background-size: cover;
    }

    .register-container {
        max-width: 900px;
        width: 100%;
        margin: 20px;
        background: rgba(255, 255, 255, 0.9);
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: row;
    }

    .intro-section {
        flex: 1;
        background: linear-gradient(135deg, rgba(0, 0, 0, 0.4), rgba(255, 182, 193, 0.3)), url('https://images.unsplash.com/photo-1519378058457-4c29a0a2efac?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80') no-repeat center center;
        background-size: cover;
        padding: 40px;
        color: #ffe6e6;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center; /* Căn giữa nội dung theo chiều ngang */
        text-align: center; /* Căn giữa chữ */
        min-height: 400px;
    }

    .intro-section h2 {
        font-size: 2rem;
        font-weight: 600;
        margin-bottom: 15px;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
    }

    .intro-section p {
        font-size: 1rem;
        opacity: 0.9;
        line-height: 1.5;
        max-width: 80%; /* Giới hạn chiều rộng đoạn văn để dễ đọc */
    }

    .register-section {
        flex: 1;
        padding: 40px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        min-height: 400px;
    }

    .register-section h2 {
        font-size: 1.8rem;
        font-weight: 600;
        color: #ff6666;
        margin-bottom: 20px;
        text-align: center;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        margin-bottom: 15px;
    }

    .input-wrapper {
        position: relative;
        width: 100%;
    }

    .form-control {
        border-radius: 10px;
        border: 1px solid #e0e0e0;
        padding: 10px 40px 10px 10px; /* Thêm padding bên phải để chừa chỗ cho con mắt */
        font-size: 0.9rem;
        background: #fffafa;
        transition: border-color 0.3s ease;
        font-family: 'Lora', serif;
        width: 100%;
    }

    .form-control:focus {
        border-color: #ffb6c1;
        box-shadow: none;
        background: white;
    }

    .form-label {
        color: #cc7a7a;
        font-size: 0.9rem;
        font-family: 'Lora', serif;
        margin-bottom: 5px;
    }

    .toggle-password {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #000000;
        font-size: 1.2rem;
        z-index: 1;
    }

    .btn-primary {
        background-color: #ff6666;
        border: none;
        border-radius: 25px;
        padding: 10px;
        font-size: 0.95rem;
        font-weight: 600;
        font-family: 'Lora', serif;
        color: #fff0f0;
        transition: background-color 0.3s ease;
        width: 100%;
    }

    .btn-primary:hover {
        background-color: #ff4d4d;
        color: #fff0f0;
    }

    .social-login-buttons {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-top: 10px;
    }

    .btn-google, .btn-facebook, .btn-twitter {
        background-color: white;
        border: 1px solid #e0e0e0;
        border-radius: 25px;
        padding: 10px 20px;
        font-size: 0.9rem;
        font-family: 'Lora', serif;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        color: #b85454;
        transition: background-color 0.3s ease;
        text-decoration: none;
    }

    .btn-google img, .btn-facebook img, .btn-twitter img {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        object-fit: cover;
    }

    .btn-google:hover, .btn-facebook:hover, .btn-twitter:hover {
        background-color: #f1f1f1;
        color: #b85454;
    }

    .text-links {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 20px;
        margin-top: 15px;
    }

    .text-links a {
        color: #ffb6c1;
        font-size: 0.85rem;
        text-decoration: none;
        font-family: 'Lora', serif;
    }

    .text-links a:hover {
        color: #ff4d4d;
    }

    .text-danger {
        font-size: 0.85rem;
        font-family: 'Lora', serif;
        margin-top: 5px;
    }

    @media (max-width: 768px) {
        .register-container {
            flex-direction: column;
            max-width: 500px;
        }
        .intro-section, .register-section {
            flex: none;
            width: 100%;
        }
    }
</style>

<?php

if (isset($errors)) {
    echo "<ul>";
    foreach ($errors as $err) {
        echo "<li class='text-danger'>$err</li>";
    }
    echo "</ul>";
}

?>

<div class="register-container">
    <!-- Introduction Section -->
    <div class="intro-section">
        <h2>Tham gia Bloomie ngay hôm nay</h2>
        <p>Tạo tài khoản để khám phá những bó hoa tuyệt đẹp và những món quà ý nghĩa từ Bloomie - nơi lan tỏa sắc màu thiên nhiên.</p>
    </div>

    <!-- Registration Form Section -->
    <div class="register-section">
        <h2>Đăng ký</h2>
        <form class="user" action="/WebsiteBanHoa/account/save" method="post">
            <div class="form-group">
                <label class="form-label" for="username">Tên đăng nhập</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Tên đăng nhập" required>
            </div>
            <div class="form-group">
                <label class="form-label" for="fullname">Họ tên</label>
                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Họ tên">
            </div>
            <div class="form-group">
                <label class="form-label" for="password">Mật khẩu</label>
                <div class="input-wrapper">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu">
                    <i class="fas fa-eye toggle-password" onclick="togglePassword('password')"></i>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label" for="confirmpassword">Xác nhận mật khẩu</label>
                <div class="input-wrapper">
                    <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Nhập lại mật khẩu">
                    <i class="fas fa-eye toggle-password" onclick="togglePassword('confirmpassword')"></i>
                </div>
            </div>
            <div class="form-group text-center">
                <button class="btn btn-primary">Register</button>
            </div>
        </form>
        <div class="text-links text-center">
            <a href="/WebsiteBanHoa/account/login">Đã có tài khoản? Đăng nhập</a>
        </div>
        <div class="text-center mt-3">
            <p>Hoặc đăng ký bằng</p>
            <div class="social-login-buttons">
                <a href="#!" class="btn-google">
                    <img src="https://www.google.com/favicon.ico" alt="Google Logo">
                </a>
                <a href="#!" class="btn-facebook">
                    <img src="https://www.facebook.com/favicon.ico" alt="Facebook Logo">
                </a>
                <a href="#!" class="btn-twitter">
                    <img src="https://www.twitter.com/favicon.ico" alt="Twitter Logo">
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    function togglePassword(inputId) {
        const input = document.getElementById(inputId);
        const icon = input.nextElementSibling;
        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            input.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }
</script>

<?php?>