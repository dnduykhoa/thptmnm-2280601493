<?php?>

<link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;600&display=swap" rel="stylesheet">

<style>
    html, body {
        margin: 0;
        padding: 0;
        height: 100vh;
        width: 100%;
        overflow-x: hidden;
        font-family: 'Lora', serif;
        display: flex;
        flex-direction: column;
    }

    body {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(rgba(255, 250, 250, 0.8), rgba(255, 182, 193, 0.3)), url('https://images.unsplash.com/photo-1519378058457-4c29a0a2efac?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80') no-repeat center center fixed;
        background-size: cover;
    }

    #form {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        padding: 20px 0;
    }

    .login-container {
        max-width: 900px;
        width: 100%;
        margin: 0 20px;
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
        padding: 30px;
        color: #ffe6e6;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-start;
        min-height: 300px;
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
    }

    .login-section {
        flex: 1;
        padding: 30px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: stretch;
        min-height: 300px;
    }

    .login-section h2 {
        font-size: 1.8rem;
        font-weight: 600;
        color: #ff6666;
        margin-bottom: 20px; /* Reduced margin for less space below the heading */
        text-align: center;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        align-items: stretch;
        margin-bottom: 15px; /* Reduced margin-bottom to decrease spacing between form groups */
    }

    .form-control {
        border-radius: 10px;
        border: 1px solid #e0e0e0;
        padding: 10px; /* Adjusted padding for a more compact input */
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
        margin-bottom: 5px; /* Reduced margin-bottom for less space between label and input */
    }

    .btn-primary {
        background-color: #ff6666;
        border: none;
        border-radius: 25px;
        padding: 10px; /* Adjusted padding for the button */
        font-size: 0.95rem;
        font-weight: 600;
        font-family: 'Lora', serif;
        color: #fff0f0;
        transition: background-color 0.3s ease;
        width: 100%;
        margin-top: 5px; /* Reduced margin-top for less space above the button */
    }

    .btn-primary:hover {
        background-color: #ff4d4d;
        color: #fff0f0;
    }

    .social-login-buttons {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-top: 10px; /* Reduced margin-top for better spacing */
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
        margin-top: 15px; /* Adjusted margin-top for better spacing */
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

    .social-login-section {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-top: 20px; /* Adjusted margin-top to better center the section */
    }

    .social-login-section p {
        margin-bottom: 10px; /* Reduced margin-bottom for better spacing */
    }

    @media (max-width: 768px) {
        .login-container {
            flex-direction: column;
            max-width: 500px;
        }
        .intro-section, .login-section {
            flex: none;
            width: 100%;
        }
        .intro-section {
            align-items: center;
            text-align: center;
        }
    }

    @media (max-width: 576px) {
        .intro-section h2 {
            font-size: 1.5rem;
        }
        .intro-section p {
            font-size: 0.9rem;
        }
        .login-section h2 {
            font-size: 1.5rem;
        }
    }
</style>

<section id="form">
    <div class="login-container">
        <!-- Introduction Section -->
        <div class="intro-section">
            <h2>Chào mừng đến với Bloomie</h2>
            <p>Đăng nhập để khám phá những bó hoa tuyệt đẹp và những món quà ý nghĩa từ Bloomie - nơi lan tỏa sắc màu thiên nhiên.</p>
        </div>

        <!-- Login Form Section -->
        <div class="login-section">
            <h2>Đăng nhập</h2>
            <form action="/WebsiteBanHoa/account/checklogin" method="post">
                <div class="form-group">
                    <label class="form-label" for="username">Tên đăng nhập</label>
                    <input type="text" name="username" class="form-control" id="username" placeholder="Nhập tên đăng nhập" />
                </div>
                <div class="form-group">
                    <label class="form-label" for="password">Mật khẩu</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Nhập mật khẩu" />
                </div>
                <button class="btn btn-primary" type="submit">Đăng nhập</button>
            </form>
            <div class="text-links text-center">
                <a href="/WebsiteBanHoa/account/register">Tạo tài khoản mới</a>
                <span>|</span>
                <a href="#!">Quên mật khẩu?</a>
            </div>
            <div class="social-login-section text-center">
                <p>Hoặc đăng nhập bằng</p>
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
</section>

<?php?>