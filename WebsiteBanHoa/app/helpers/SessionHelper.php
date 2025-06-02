<?php

// SessionHelper quản lý trạng thái đăng nhập và quyền của người dùng
class SessionHelper {
    // Khởi động phiên nếu chưa được bắt đầu
    private static function start() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    // Kiểm tra người dùng đã đăng nhập chưa
    public static function isLoggedIn() {
        self::start();
        return isset($_SESSION['username']);
    }

    // Kiểm tra người dùng có phải admin không
    public static function isAdmin() {
        self::start();
        return isset($_SESSION['username']) && isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
    }

    // Lấy vai trò người dùng, mặc định là 'guest' nếu không có
    public static function getRole() {
        self::start();
        return isset($_SESSION['role']) ? $_SESSION['role'] : 'guest';
    }

    // Kiểm tra người dùng có vai trò cụ thể không
    public static function hasRole($role) {
        self::start();
        return isset($_SESSION['role']) && $_SESSION['role'] === $role;
    }
}
?>