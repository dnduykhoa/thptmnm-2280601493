<?php 
require_once('app/config/database.php'); 
require_once('app/models/AccountModel.php'); 

class AccountController { 
    private $accountModel; 
    private $db; 
    
    public function __construct() { 
        $this->db = (new Database())->getConnection(); 
        $this->accountModel = new AccountModel($this->db); 
    } 
 
    function register(){ 
        include_once 'app/views/account/register.php'; 
    } 

    public function login() { 
        include_once 'app/views/account/login.php'; 
    } 
 
    function save(){ 
         
        if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
            $username = $_POST['username'] ?? ''; 
            $fullName = $_POST['fullname'] ?? ''; 
            $password = $_POST['password'] ?? ''; 
            $confirmPassword = $_POST['confirmpassword'] ?? ''; 
 
            $errors =[]; 
            if(empty($username)){ 
                $errors['username'] = "Vui lòng nhập tên đăng nhập"; 
            } 
            if(empty($fullName)){ 
                $errors['fullname'] = "Vui lòng nhập họ tên"; 
            } 
            if(empty($password)){ 
                $errors['password'] = "Vui lòng nhập password"; 
            } 
            if($password != $confirmPassword){ 
                $errors['confirmPass'] = "Mật khẩu và xác nhận chưa đúng"; 
            } 
            //kiểm tra username đã được đăng ký chưa? 
            $account = $this->accountModel->getAccountByUsername($username); 
 
            if($account){ 
                $errors['account'] = "Tài khoản này đã có người đăng ký"; 
            } 
             
            if(count($errors) > 0){ 
                include_once 'app/views/account/register.php'; 
            }else{ 
                $password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
                $result = $this->accountModel->save($username, $fullName, $password); 
                 
                if($result){ 
                    header('Location: /WebsiteBanHoa/account/login'); 
                } 
            } 
        }        
        
    } 

    function logout(){ 
        
        unset($_SESSION['id']);
        unset($_SESSION['username']); 
        unset($_SESSION['role']);
 
        header('Location: /WebsiteBanHoa/product'); 
    } 

    public function checkLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
        
            $account = $this->accountModel->getAccountByUsername($username);
        
        if ($account && !empty($account->username)) {
            $pwd_hashed = $account->password;
            if (password_verify($password, $pwd_hashed)) {
                session_start();
                
                if (!isset($_SESSION['username'])) { 
                    $_SESSION['username'] = $account->username; 
                    $_SESSION['role'] = $account->role; 
                } 
                header('Location: /WebsiteBanHoa/product'); 
                exit; 
            } else {
                $errors[] = "Mật khẩu không đúng.";
                include_once 'app/views/account/login.php';
            }
        } else {
            $errors[] = "Không tìm thấy tài khoản.";
            include_once 'app/views/account/login.php';
        }
        }
    }
    
    public function createAdmin() {
        $username = 'admin';
        $name = 'Admin';
        $password = 'admin123';

        $result = $this->accountModel->createAdmin($username, $name, $password);

        if ($result) {
            echo "Tài khoản admin đã được tạo thành công!";
        } else {
            echo "Không thể tạo tài khoản admin. Tài khoản có thể đã tồn tại hoặc có lỗi xảy ra.";
        }
    }
}