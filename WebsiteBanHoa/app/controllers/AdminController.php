<?php
require_once 'app/config/database.php';

class AdminController
{
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
    }

    public function dashboard()
    {
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            header('Location: /WebsiteBanHoa/account/login');
            exit;
        }
        include_once 'app/views/admin/dashboard.php';
    }
}
?>