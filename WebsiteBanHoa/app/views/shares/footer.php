<footer class="bg-dark text-white py-5 mt-5">
        <div class="container">
            <div class="row g-4">
                <!-- About Section -->
                <div class="col-md-4 col-sm-6">
                    <h5 class="mb-3 text-primary fw-bold"><i class="fas fa-leaf me-2"></i>BLOOMIE</h5>
                    <p class="text-light">Cửa hàng hoa tươi chất lượng cao, mang vẻ đẹp thiên nhiên đến không gian của bạn.</p>
                    <div class="d-flex mt-4">
                        <a href="https://facebook.com" class="text-light me-3" target="_blank" rel="noopener"><i class="fab fa-facebook-f fa-lg"></i></a>
                        <a href="https://instagram.com" class="text-light me-3" target="_blank" rel="noopener"><i class="fab fa-instagram fa-lg"></i></a>
                        <a href="https://twitter.com" class="text-light me-3" target="_blank" rel="noopener"><i class="fab fa-twitter fa-lg"></i></a>
                    </div>
                </div>
                <!-- Contact Section -->
                <div class="col-md-4 col-sm-6">
                    <h5 class="mb-3 fw-bold text-light">Liên hệ</h5>
                    <ul class="list-unstyled text-light">
                        <li class="mb-2"><i class="fas fa-map-marker-alt me-2"></i> 123 Đường Hoa, Quận 1, TP.HCM</li>
                        <li class="mb-2"><i class="fas fa-phone me-2"></i> <a href="tel:02812345678" class="text-light text-decoration-none hover-text-primary">(028) 1234 5678</a></li>
                        <li class="mb-2"><i class="fas fa-envelope me-2"></i> <a href="mailto:info@bloomie.com" class="text-light text-decoration-none hover-text-primary">info@bloomie.com</a></li>
                    </ul>
                </div>
                <!-- Information Section -->
                <div class="col-md-4 col-sm-12">
                    <h5 class="mb-3 fw-bold text-light">Thông tin</h5>
                    <ul class="list-unstyled text-light">
                        <li class="mb-2"><a href="/WebsiteBanHoa/about" class="text-light text-decoration-none hover-text-primary">Về chúng tôi</a></li>
                        <li class="mb-2"><a href="/WebsiteBanHoa/delivery-policy" class="text-light text-decoration-none hover-text-primary">Chính sách giao hàng</a></li>
                        <li class="mb-2"><a href="/WebsiteBanHoa/terms" class="text-light text-decoration-none hover-text-primary">Điều khoản dịch vụ</a></li>
                        <li class="mb-2"><a href="/WebsiteBanHoa/privacy-policy" class="text-light text-decoration-none hover-text-primary">Chính sách bảo mật</a></li>
                    </ul>
                </div>
            </div>
            <hr class="my-4 bg-light">
            <div class="text-center text-light">
                <small>© 2025 BLOOMIE. Tất cả quyền được bảo lưu.</small>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Add smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</body>
</html>

<style>
.footer a.text-light:hover {
    color: #007bff !important; /* Màu xanh nước biển khi hover */
}
.footer .text-primary {
    color: #007bff !important; /* Màu xanh nước biển cho text-primary */
}
.footer .fa-lg {
    font-size: 1.5rem;
    transition: transform 0.3s;
}
.footer .fa-lg:hover {
    transform: scale(1.2);
}
@media (max-width: 576px) {
    .footer .d-flex {
        justify-content: center;
    }
}
</style>