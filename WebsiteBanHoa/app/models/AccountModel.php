<?php 
class AccountModel 
{ 
    private $conn; 
    private $table_name = "account"; 

    public function __construct($db) 
    { 
        $this->conn = $db; 
    }

    public function getAccountByUsername($username) 
    { 
        $query = "SELECT * FROM account WHERE username = :username"; 
        $stmt = $this->conn->prepare($query); 
        $stmt->bindParam(':username', $username, PDO::PARAM_STR); 
        $stmt->execute(); 
        $result = $stmt->fetch(PDO::FETCH_OBJ); 
        return $result; 
    } 
 
    public function save($username, $name, $password, $role="user")
    {
        $query = "INSERT INTO " . $this->table_name . "(username, name, password, role) VALUES (:username, :name, :password, :role)";
        $stmt = $this->conn->prepare($query);

        // Làm sạch dữ liệu
        $name = htmlspecialchars(strip_tags($name));
        $username = htmlspecialchars(strip_tags($username));
        $role = htmlspecialchars(strip_tags($role));

        // Gán dữ liệu vào câu lệnh
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':role', $role); // Thêm ràng buộc cho role

        // Thực thi câu lệnh
        if ($stmt->execute()) {
            return true;
        }
        return false;
    } 

    public function createAdmin($username, $name, $password) 
    { 
        try {
            // Kiểm tra xem tài khoản admin đã tồn tại chưa
            $existingAccount = $this->getAccountByUsername($username);
            if ($existingAccount) {
                return false; // Tài khoản đã tồn tại
            }

            // Mã hóa mật khẩu
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);

            // Gọi phương thức save với role là admin
            return $this->save($username, $name, $hashedPassword, 'admin');
        } catch (PDOException $e) {
            error_log("Lỗi khi tạo tài khoản admin: " . $e->getMessage());
            return false;
        }
    }
} 
